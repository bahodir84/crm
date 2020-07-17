<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Expenditures;

/**
 * ExpendituresSearch represents the model behind the search form of `common\models\Expenditures`.
 */
class ExpendituresSearch extends Expenditures
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id',  'amount'], 'integer'],
            [['staff', 'branch','for_what', 'created_by', 'created_at', 'updated_by', 'updated_at', 'notes'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Expenditures::find();

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

        $query->joinWith('staff0');
        $query->joinWith('branch0');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            // 'staff' => $this->staff,
            // 'branch' => $this->branch,
            'amount' => $this->amount,
            //'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'for_what', $this->for_what])



            ->andFilterWhere(['like', 'branches.name', $this->branch])
            ->andFilterWhere(['like', 'staffs.name', $this->staff])



            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'notes', $this->notes]);


            if ( !empty($this->created_at)  )
            {
               $pieces = explode(" - ", $this->created_at);
              
              $query->andFilterWhere(['between', 'date(expenditures.created_at)', $pieces[0], $pieces[1]   ]);


            }




        return $dataProvider;
    }
}
