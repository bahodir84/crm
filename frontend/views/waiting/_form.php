<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Students;
use common\models\Subjects;
use common\models\Levels;
use common\models\Days;
use common\models\Times;
use common\models\Teachers;
use common\models\Groups;
use common\models\Branches;

/* @var $this yii\web\View */
/* @var $model common\models\Waiting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="waiting-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'student')->dropDownList(ArrayHelper::map(Students::find()->all(),'id',

    function($model) {
        return $model['id'].' - '.$model['name'].' - '.$model['phone'];
    }


) ,['prompt'=>'Select the student'])     ?>

    <?= $form->field($model, 'subject')->dropDownList(ArrayHelper::map(Subjects::find()->all(),'id','name'),['prompt'=>'Select the subject'])     ?>

    <?= $form->field($model, 'level')->dropDownList(ArrayHelper::map(Levels::find()->all(),'id','name'),['prompt'=>'Select the level'])     ?>

    <?= $form->field($model, 'day')->dropDownList(ArrayHelper::map(Days::find()->all(),'id','name'),['prompt'=>'Select the day'])     ?>

    <?= $form->field($model, 'time')->dropDownList(ArrayHelper::map(Times::find()->all(),'id','name'),['prompt'=>'Select the time'])     ?>

    <?= $form->field($model, 'status')->dropDownList([ 'waiting' => 'Waiting', 'given' => 'Given', ], ['prompt' => 'Select status']) ?>

    <?php // echo $form->field($model, 'given_to')->dropDownList(ArrayHelper::map(Teachers::find()->all(),'id','name'),['prompt'=>'Select the teacher','disabled' => $model->isNewRecord ? true : false])     ?>

    <?= $form->field($model, 'group_id')->dropDownList(ArrayHelper::map(Groups::find()->all(),'id','id'),['prompt'=>'Select the group ID','disabled' => $model->isNewRecord ? true : false])     ?>

    <?php // echo $form->field($model, 'branch')->dropDownList(ArrayHelper::map(Branches::find()->all(),'id','name'),['prompt'=>'Select the branch'])     ?>

    <?php //echo $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'created_at')->textInput() ?>

    <?php //echo $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
