<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property int $id
 * @property int $teacher
 * @property int $subject
 * @property int $level
 * @property int $day
 * @property int $time
 * @property int $branch
 * @property string $starting_date
 * @property int $duration_months
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 * @property string $notes
 *
 * @property Teachers $teacher0
 * @property Subjects $subject0
 * @property Levels $level0
 * @property Days $day0
 * @property Times $time0
 * @property Branches $branch0
 * @property Payment[] $payments
 * @property WaitingList[] $waitingLists
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher', 'subject'], 'integer'],
            [['starting_date', 'duration_months', 'created_by'], 'required'],
            [['starting_date', 'created_at', 'updated_at'], 'safe'],
            [['notes'], 'string'],
            [['level', 'day', 'time', 'branch', 'duration_months'], 'string', 'max' => 4],
            [['created_by', 'updated_by'], 'string', 'max' => 30],
            [['teacher'], 'exist', 'skipOnError' => true, 'targetClass' => Teachers::className(), 'targetAttribute' => ['teacher' => 'id']],
            [['subject'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['subject' => 'id']],
            [['level'], 'exist', 'skipOnError' => true, 'targetClass' => Levels::className(), 'targetAttribute' => ['level' => 'id']],
            [['day'], 'exist', 'skipOnError' => true, 'targetClass' => Days::className(), 'targetAttribute' => ['day' => 'id']],
            [['time'], 'exist', 'skipOnError' => true, 'targetClass' => Times::className(), 'targetAttribute' => ['time' => 'id']],
            [['branch'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['branch' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'teacher0.name' => 'Teacher',
            'subject0.name' => 'Subject',
            'level0.name' => 'Level',
            'day0.name' => 'Day',
            'time0.name' => 'Time',
            'branch0.name' => 'Branch',
            'starting_date' => 'Starting Date',
            'duration_months' => 'Duration Months',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'notes' => 'Notes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher0()
    {
        return $this->hasOne(Teachers::className(), ['id' => 'teacher']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject0()
    {
        return $this->hasOne(Subjects::className(), ['id' => 'subject']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel0()
    {
        return $this->hasOne(Levels::className(), ['id' => 'level']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDay0()
    {
        return $this->hasOne(Days::className(), ['id' => 'day']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTime0()
    {
        return $this->hasOne(Times::className(), ['id' => 'time']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranch0()
    {
        return $this->hasOne(Branches::className(), ['id' => 'branch']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaitingLists()
    {
        return $this->hasMany(WaitingList::className(), ['group_id' => 'id']);
    }
}
