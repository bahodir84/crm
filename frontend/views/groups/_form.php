<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Teachers;
use common\models\Subjects;
use common\models\Levels;
use common\models\Days;
use common\models\Times;
use common\models\Branches;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Groups */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="groups-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'teacher')->dropDownList(ArrayHelper::map(Teachers::find()->all(),'id','name','id'),['prompt'=>'Select the teacher'])     ?>

    <?= $form->field($model, 'subject')->dropDownList(ArrayHelper::map(Subjects::find()->all(),'id','name'),['prompt'=>'Select the subject'])     ?>

    <?= $form->field($model, 'level')->dropDownList(ArrayHelper::map(Levels::find()->all(),'id','name'),['prompt'=>'Select the level'])     ?>

    <?= $form->field($model, 'day')->dropDownList(ArrayHelper::map(Days::find()->all(),'id','name'),['prompt'=>'Select the day'])     ?>

    <?= $form->field($model, 'time')->dropDownList(ArrayHelper::map(Times::find()->all(),'id','name'),['prompt'=>'Select the time'])     ?>

    <?= $form->field($model, 'branch')->dropDownList(ArrayHelper::map(Branches::find()->all(),'id','name'),['prompt'=>'Select the branch'])     ?>

    <?= $form->field($model, 'starting_date')->widget(DatePicker::classname(),[
        'inline'=>false,
        'clientOptions'=>[
        'autoclose'=>true,
        'format'=>'yyyy-m-d',
        'daysOfWeekDisabled'=>'0',
        'daysOfWeekHighlighted'=>'1,3,5',
        'todayHighlight'=>true,
        'immediateUpdates'=>true,
        'weekStart'=>'1',

        ]
        ])    ?>

    <?= $form->field($model, 'duration_months')->textInput(['value'=>'2']) ?>

    <?php //echo $form->field($model, 'created_by')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?php //echo $form->field($model, 'created_at')->textInput(['readonly'=>true]) ?>

    <?php //echo $form->field($model, 'updated_by')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?php //echo $form->field($model, 'updated_at')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
