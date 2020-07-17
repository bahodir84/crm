<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "staffs".
 *
 * @property int $id
 * @property string $name
 *
 * @property Expenditures[] $expenditures
 */
class Staffs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staffs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
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
    public function getExpenditures()
    {
        return $this->hasMany(Expenditures::className(), ['staff' => 'id']);
    }
}
