<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

use common\models\Staffs;
use common\models\Branches;

/* @var $this yii\web\View */
/* @var $model common\models\Expenditures */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expenditures-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'staff')->dropDownList(ArrayHelper::map(Staffs::find()->all(),'id','name'),['prompt'=>'Select the staff'])     ?>




    <?= $form->field($model, 'branch')->dropDownList(ArrayHelper::map(Branches::find()->all(),'id','name'),['prompt'=>'Select the staff'])     ?>



    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'for_what')->textarea(['rows' => 6]) ?>

    <?php // echo $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?php // echo $form->field($model, 'created_at')->textInput() ?>

    <?php //echo $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <?php // echo $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
