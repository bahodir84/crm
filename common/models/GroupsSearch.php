<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Groups;

/**
 * GroupsSearch represents the model behind the search form of `common\models\Groups`.
 */
class GroupsSearch extends Groups
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['teacher', 'subject','level', 'day', 'time', 'branch', 'starting_date', 'duration_months', 'created_by', 'created_at', 'updated_by', 'updated_at', 'notes'], 'safe'],
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
        $query = Groups::find();

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

        // grid filtering conditions
        $query->joinWith('teacher0');
        $query->joinWith('subject0');
        $query->joinWith('level0');
        $query->joinWith('day0');
        $query->joinWith('time0');
        $query->joinWith('branch0');        


        $query->andFilterWhere([
            'groups.id' => $this->id,
            //'teacher' => $this->teacher,
            //'subject' => $this->subject,
            'starting_date' => $this->starting_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query
            ->andFilterWhere(['like', 'teachers.name', $this->teacher])
            ->andFilterWhere(['like', 'subjects.name', $this->subject])
            ->andFilterWhere(['like', 'levels.name', $this->level])
            ->andFilterWhere(['like', 'days.name', $this->day])
            ->andFilterWhere(['like', 'times.name', $this->time])
            ->andFilterWhere(['like', 'branches.name', $this->branch])

            ->andFilterWhere(['like', 'duration_months', $this->duration_months])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
