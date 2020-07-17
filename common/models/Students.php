<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string $name
 * @property string $passport
 * @property string $gender
 * @property string $birth_year
 * @property string $phone
 * @property string $phone2
 * @property string $address
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 * @property string $notes
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'gender'], 'required'],
            [['gender', 'address', 'notes'], 'string'],
            [['birth_year', 'created_at', 'updated_at'], 'safe'],
            [['name', 'created_by', 'updated_by'], 'string', 'max' => 30],
            [['passport'], 'string', 'max' => 9],
            [['phone', 'phone2'], 'string', 'max' => 15],
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
            'phone2' => 'Phone2',
            'address' => 'Address',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'notes' => 'Notes',
        ];
    }
}
