<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Students;
use common\models\Groups;
use common\models\Teachers;

/* @var $this yii\web\View */
/* @var $model common\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student')->dropDownList(ArrayHelper::map(Students::find()->all(),'id','name','id'),['prompt'=>'Select the student'])     ?>

    <?= $form->field($model, 'group_id')->dropDownList(ArrayHelper::map(Groups::find()->all(),'id','id'),['prompt'=>'Select the group ID'])     ?>

    <?= $form->field($model, 'teacher')->dropDownList(ArrayHelper::map(Teachers::find()->all(),'id','name','id'),['prompt'=>'Select the teacher'])     ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'month')->dropDownList([ 'first month' => 'First month', 'second month' => 'Second month', 'third month' => 'Third month', 'fourth month' => 'Fourth month', 'fifth month' => 'Fifth month', 'sixth month' => 'Sixth month', ], ['prompt' => 'Select the month']) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'cash' => 'Cash', 'plastic' => 'Plastic', 'bank' => 'Bank', ], ['prompt' => 'Select payment type']) ?>

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
