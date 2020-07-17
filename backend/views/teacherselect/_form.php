<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Teacherselect */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacherselect-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'branchname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teacherids')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
