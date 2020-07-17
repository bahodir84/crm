<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList([ 'male' => 'Male', 'female' => 'Female', ], ['prompt' => 'Select the gender']) ?>

    <?= $form->field($model, 'birth_year')->textInput(['maxlength' => true,'value'=>'1970']) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true,'value'=>'+998']) ?>

    <?= $form->field($model, 'phone2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?php //echo $form->field($model, 'created_by')->textInput(['maxlength' => true, 'readonly'=>true ]) ?>

    <?php //echo $form->field($model, 'created_at')->textInput(['readonly'=>true ]) ?>

    <?php //echo $form->field($model, 'updated_by')->textInput(['maxlength' => true,'readonly'=>true ]) ?>

    <?php //echo $form->field($model, 'updated_at')->textInput(['readonly'=>true ]) ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
