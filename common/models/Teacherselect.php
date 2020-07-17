<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teacherselect".
 *
 * @property int $id
 * @property string $branchname
 * @property string $teacherids
 */
class Teacherselect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacherselect';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['branchname', 'teacherids'], 'required'],
            [['branchname'], 'string', 'max' => 20],
            [['teacherids'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'branchname' => 'Branchname',
            'teacherids' => 'Teacherids',
        ];
    }
}
