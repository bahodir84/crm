<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "times".
 *
 * @property int $id
 * @property string $name
 *
 * @property Groups[] $groups
 * @property WaitingList[] $waitingLists
 */
class Times extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'times';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 15],
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
        return $this->hasMany(Groups::className(), ['time' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaitingLists()
    {
        return $this->hasMany(WaitingList::className(), ['time' => 'id']);
    }
}
