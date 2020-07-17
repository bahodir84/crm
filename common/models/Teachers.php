<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property int $id
 * @property string $name
 * @property string $passport
 * @property string $gender
 * @property string $birth_year
 * @property string $phone
 * @property string $home_phone
 * @property string $address
 * @property string $marital
 * @property string $spouse_name
 * @property string $spouse_phone
 * @property int $number_of_children
 * @property string $ielts
 * @property string $cefr
 * @property string $previous_work
 * @property int $subject1
 * @property int $subject2
 * @property string $purpose_of_working
 * @property string $special_abilities
 * @property string $notes
 * @property int $salary_percentage
 * @property int $paper_percentage
 * @property int $nalog
 * @property int $kommunal
 * @property int $fine_percentage
 * @property int $bonus_percentage
 *
 * @property Groups[] $groups
 * @property Payment[] $payments
 * @property Subjects $subject20
 * @property Subjects $subject10
 * @property WaitingList[] $waitingLists
 */
class Teachers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'passport', 'gender', 'birth_year', 'phone', 'marital', 'salary_percentage','visible'], 'required'],
            [['gender', 'address', 'marital', 'previous_work', 'purpose_of_working', 'notes'], 'string'],
            [['birth_year'], 'safe'],
            [['subject1', 'subject2', 'nalog', 'kommunal', 'fine_percentage'], 'integer'],
            [['name', 'spouse_name', 'special_abilities'], 'string', 'max' => 30],
            [['passport'], 'string', 'max' => 9],
            [['phone', 'home_phone', 'spouse_phone'], 'string', 'max' => 15],
            [['number_of_children', 'salary_percentage', 'paper_percentage', 'bonus_percentage'], 'string', 'max' => 4],
            [['ielts'], 'string', 'max' => 3],
            [['cefr'], 'string', 'max' => 2],
            [['subject2'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['subject2' => 'id']],
            [['subject1'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['subject1' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'passport' => 'Passport',
            'gender' => 'Gender',
            'birth_year' => 'Birth Year',
            'phone' => 'Phone',
            'home_phone' => 'Home Phone',
            'address' => 'Address',
            'marital' => 'Marital',
            'spouse_name' => 'Spouse Name',
            'spouse_phone' => 'Spouse Phone',
            'number_of_children' => 'Number Of Children',
            'ielts' => 'Ielts',
            'cefr' => 'Cefr',
            'previous_work' => 'Previous Work',
            'subject10.name' => 'Subject',
            'subject20.name' => 'Second subject',
            'purpose_of_working' => 'Purpose Of Working',
            'special_abilities' => 'Special Abilities',
            'notes' => 'Notes',
            'salary_percentage' => 'Salary Percentage',
            'paper_percentage' => 'Paper Percentage',
            'nalog' => 'Nalog',
            'kommunal' => 'Kommunal',
            'fine_percentage' => 'Plastik for teacher',
            'bonus_percentage' => 'Bonus Percentage',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['teacher' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['teacher' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject20()
    {
        return $this->hasOne(Subjects::className(), ['id' => 'subject2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject10()
    {
        return $this->hasOne(Subjects::className(), ['id' => 'subject1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaitingLists()
    {
        return $this->hasMany(WaitingList::className(), ['given_to' => 'id']);
    }
}
