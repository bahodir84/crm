<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Subjects;
/* @var $this yii\web\View */
/* @var $model common\models\Teachers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teachers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList([ 'male' => 'Male', 'female' => 'Female', ], ['prompt' => 'Select gender']) ?>

    <?= $form->field($model, 'birth_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'marital')->dropDownList([ 'single' => 'Single', 'married' => 'Married', 'divorced' => 'Divorced', ], ['prompt' => 'Select marital status']) ?>

    <?= $form->field($model, 'spouse_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spouse_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_of_children')->textInput() ?>

    <?= $form->field($model, 'ielts')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cefr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'previous_work')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'subject1')->dropDownList(ArrayHelper::map(Subjects::find()->all(),'id','name'),['prompt'=>'Select first subject'])     ?>

    <?= $form->field($model, 'subject2')->dropDownList(ArrayHelper::map(Subjects::find()->all(),'id','name'),['prompt'=>'Select second subject'])     ?>


    <?= $form->field($model, 'purpose_of_working')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'special_abilities')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'salary_percentage')->textInput() ?>

    <?= $form->field($model, 'paper_percentage')->textInput() ?>

    <?= $form->field($model, 'nalog')->textInput() ?>

    <?= $form->field($model, 'kommunal')->textInput() ?>

    <?= $form->field($model, 'bonus_percentage')->textInput() ?>

    <?= $form->field($model, 'fine_percentage')->textInput() ?>

    <?= $form->field($model, 'visible')->dropDownList([ 'yes' => 'yes', 'no' => 'no', ], ['prompt' => 'If fired or wanna hide, please select No']) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
