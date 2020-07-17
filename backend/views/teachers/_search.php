<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TeachersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teachers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'passport') ?>

    <?= $form->field($model, 'gender') ?>

    <?= $form->field($model, 'birth_year') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'home_phone') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'marital') ?>

    <?php // echo $form->field($model, 'spouse_name') ?>

    <?php // echo $form->field($model, 'spouse_phone') ?>

    <?php // echo $form->field($model, 'number_of_children') ?>

    <?php // echo $form->field($model, 'ielts') ?>

    <?php // echo $form->field($model, 'cefr') ?>

    <?php // echo $form->field($model, 'previous_work') ?>

    <?php // echo $form->field($model, 'subject1') ?>

    <?php // echo $form->field($model, 'subject2') ?>

    <?php // echo $form->field($model, 'purpose_of_working') ?>

    <?php // echo $form->field($model, 'special_abilities') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'salary_percentage') ?>

    <?php // echo $form->field($model, 'paper_percentage') ?>

    <?php // echo $form->field($model, 'nalog') ?>

    <?php // echo $form->field($model, 'kommunal') ?>

    <?php // echo $form->field($model, 'fine_percentage') ?>

    <?php // echo $form->field($model, 'bonus_percentage') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
