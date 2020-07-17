<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Payment;

/**
 * PaymentSearch represents the model behind the search form of `common\models\Payment`.
 */
class PaymentSearch extends Payment
{



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',  'amount'], 'integer'],
            [['student', 'group_id', 'teacher','month', 'type', 'created_by', 'created_at', 'updated_by', 'updated_at', 'notes'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Payment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['created_at' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('student0');
        $query->joinWith('group');
        $query->joinWith('teacher0');

        // grid filtering conditions
        $query->andFilterWhere([
            'payment.id' => $this->id,
            //'student' => $this->student,
            'group_id' => $this->group_id,
            //'payment.teacher' => $this->teacher,
            'amount' => $this->amount,
            'payment.created_by' => $this->created_by,
            //'payment.created_at' => $this->created_at,
            'payment.updated_at' => $this->updated_at,
        ]);

        
        //$username=\Yii::$app->user->identity->username;


        $query
            ->andFilterWhere(['like', 'students.name', $this->student])
            ->andFilterWhere(['like', 'teachers.name', $this->teacher])

            ->andFilterWhere(['like', 'month', $this->month])
            ->andFilterWhere(['like', 'type', $this->type])

            ->andFilterWhere(['like', 'notes', $this->notes]);



            if ( !empty($this->created_at)  )
            {
               $pieces = explode(" - ", $this->created_at);
              
              $query->andFilterWhere(['between', 'date(payment.created_at)', $pieces[0], $pieces[1]   ]);


            }

        return $dataProvider;
    }
}
