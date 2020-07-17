<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Waiting;

/**
 * WaitingSearch represents the model behind the search form of `common\models\Waiting`.
 */
class WaitingSearch extends Waiting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['student','waitingbirth', 'subject', 'given_to', 'group_id','level', 'day', 'time', 'status', 'branch', 'created_by', 'created_at', 'updated_by', 'updated_at', 'notes'], 'safe'],
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
        $query = Waiting::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('student0');
        $query->joinWith('subject0');
        $query->joinWith('level0');
        $query->joinWith('day0');
        $query->joinWith('time0');
        $query->joinWith('givenTo');
        $query->joinWith('group');
        $query->joinWith('branch0');        



        // grid filtering conditions
        $query->andFilterWhere([
            'waiting.id' => $this->id,
            //'student' => $this->student,
            'waitingbirth'=>$this->waitingbirth,
            //'subject' => $this->subject,
            //'given_to' => $this->given_to,
            'group_id' => $this->group_id,
            'times.id'=>$this->time,
            //'waiting.created_at' => $this->created_at,
            //'waiting.updated_at' => $this->updated_at,
        ]);

        $query
            ->andFilterWhere(['like', 'students.name', $this->student])


                        
            ->andFilterWhere(['like', 'subjects.name', $this->subject])
            ->andFilterWhere(['like', 'levels.name', $this->level])
            ->andFilterWhere(['like', 'days.name', $this->day])
            //->andFilterWhere(['like', 'times.name', $this->time])

            ->andFilterWhere(['like', 'status', $this->status])

            ->andFilterWhere(['like', 'teachers.name', $this->given_to])
            ->andFilterWhere(['like', 'branches.name', $this->branch])

            ->andFilterWhere(['like', 'waiting.created_by', $this->created_by])

            ->andFilterWhere(['like', 'waiting.created_at', $this->created_at])

            ->andFilterWhere(['like', 'waiting.updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
