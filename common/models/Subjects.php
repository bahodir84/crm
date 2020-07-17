<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subjects".
 *
 * @property int $id
 * @property string $name
 *
 * @property Groups[] $groups
 * @property Teachers[] $teachers
 * @property Teachers[] $teachers0
 * @property WaitingList[] $waitingLists
 */
class Subjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subjects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 30],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['subject' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teachers::className(), ['subject2' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers0()
    {
        return $this->hasMany(Teachers::className(), ['subject1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaitingLists()
    {
        return $this->hasMany(WaitingList::className(), ['subject' => 'id']);
    }
}
