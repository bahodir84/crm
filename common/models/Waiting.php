<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "waiting".
 *
 * @property int $id
 * @property int $student
 * @property int $subject
 * @property int $level
 * @property int $day
 * @property int $time
 * @property string $status
 * @property int $given_to
 * @property int $group_id
 * @property int $branch
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 * @property string $notes
 *
 * @property Students $student0
 * @property Subjects $subject0
 * @property Levels $level0
 * @property Days $day0
 * @property Times $time0
 * @property Teachers $givenTo
 * @property Groups $group
 * @property Branches $branch0
 */
class Waiting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'waiting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student', 'subject', 'given_to', 'group_id'], 'integer'],
            [['status'], 'required'],
            [['status', 'notes'], 'string'],
            [['created_at', 'updated_at','waitingbirth'], 'safe'],
            [['level', 'day', 'time', 'branch'], 'string', 'max' => 4],
            [['created_by', 'updated_by'], 'string', 'max' => 30],
            [['student'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['student' => 'id']],
            [['subject'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['subject' => 'id']],
            [['level'], 'exist', 'skipOnError' => true, 'targetClass' => Levels::className(), 'targetAttribute' => ['level' => 'id']],
            [['day'], 'exist', 'skipOnError' => true, 'targetClass' => Days::className(), 'targetAttribute' => ['day' => 'id']],
            [['time'], 'exist', 'skipOnError' => true, 'targetClass' => Times::className(), 'targetAttribute' => ['time' => 'id']],
            [['given_to'], 'exist', 'skipOnError' => true, 'targetClass' => Teachers::className(), 'targetAttribute' => ['given_to' => 'id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Groups::className(), 'targetAttribute' => ['group_id' => 'id']],
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
            'student0.name' => 'Student',
            'waitingbirth'=>'Birth year',
            'subject0.name' => 'Subject',
            'level0.name' => 'Level',
            'day0.name' => 'Day',
            'time0.name' => 'Time',
            'status' => 'Status',
            'given_to.name' => 'Given To',
            'group_id.id' => 'Group ID',
            'branch0.name' => 'Branch',
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
    public function getStudent0()
    {
        return $this->hasOne(Students::className(), ['id' => 'student']);
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
    public function getGivenTo()
    {
        return $this->hasOne(Teachers::className(), ['id' => 'given_to']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranch0()
    {
        return $this->hasOne(Branches::className(), ['id' => 'branch']);
    }
}
