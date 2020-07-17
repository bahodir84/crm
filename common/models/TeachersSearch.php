<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Teachers;

/**
 * TeachersSearch represents the model behind the search form of `common\models\Teachers`.
 */
class TeachersSearch extends Teachers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nalog', 'kommunal', 'subject2'], 'integer'],
            [['name', 'passport', 'gender', 'birth_year', 'phone', 'home_phone', 'address', 'marital', 'spouse_name', 'spouse_phone', 'number_of_children', 'ielts', 'cefr', 'previous_work', 'subject1', 'purpose_of_working', 'special_abilities', 'notes', 'salary_percentage', 'paper_percentage', 'fine_percentage', 'bonus_percentage','visible'], 'safe'],
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
        $query = Teachers::find();

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

        $query->joinWith('subject10');
       


        // grid filtering conditions
        $query->andFilterWhere([
            'teachers.id' => $this->id,
            'gender' => $this->gender,
            'birth_year' => $this->birth_year,
            'nalog' => $this->nalog,
            'kommunal' => $this->kommunal,
            'visible' => $this->visible,        
        ]);

        $query->andFilterWhere(['like', 'teachers.name', $this->name])
            ->andFilterWhere(['like', 'passport', $this->passport])
            //->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'home_phone', $this->home_phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'marital', $this->marital])
            ->andFilterWhere(['like', 'spouse_name', $this->spouse_name])
            ->andFilterWhere(['like', 'spouse_phone', $this->spouse_phone])
            ->andFilterWhere(['like', 'number_of_children', $this->number_of_children])
            ->andFilterWhere(['like', 'ielts', $this->ielts])
            ->andFilterWhere(['like', 'cefr', $this->cefr])



            ->andFilterWhere(['like', 'subjects.name', $this->subject1])



            ->andFilterWhere(['like', 'previous_work', $this->previous_work])
            ->andFilterWhere(['like', 'purpose_of_working', $this->purpose_of_working])
            ->andFilterWhere(['like', 'special_abilities', $this->special_abilities])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'salary_percentage', $this->salary_percentage])
            ->andFilterWhere(['like', 'paper_percentage', $this->paper_percentage])
            ->andFilterWhere(['like', 'fine_percentage', $this->fine_percentage])
            ->andFilterWhere(['like', 'bonus_percentage', $this->bonus_percentage]);

        return $dataProvider;
    }
}
