<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "expenditures".
 *
 * @property int $id
 * @property int $staff
 * @property int $branch
 * @property int $amount
 * @property string $for_what
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 * @property string $notes
 *
 * @property Branches $branch0
 * @property Staffs $staff0
 */
class Expenditures extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expenditures';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staff', 'branch', 'amount', 'for_what', 'created_by', 'created_at'], 'required'],
            [['staff', 'branch', 'amount'], 'integer'],
            [['for_what', 'notes'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'string', 'max' => 30],
            [['branch'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['branch' => 'id']],
            [['staff'], 'exist', 'skipOnError' => true, 'targetClass' => Staffs::className(), 'targetAttribute' => ['staff' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'staff0.name' => 'Staff name',
            'branch0.name' => 'Branch',
            'amount' => 'Amount',
            'for_what' => 'For What',
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
    public function getBranch0()
    {
        return $this->hasOne(Branches::className(), ['id' => 'branch']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff0()
    {
        return $this->hasOne(Staffs::className(), ['id' => 'staff']);
    }
}
