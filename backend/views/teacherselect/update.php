<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Teacherselect */

$this->title = 'Update Teacherselect: ' . $model->branchname;
$this->params['breadcrumbs'][] = ['label' => 'Teacherselects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="teacherselect-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
