<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Waiting */

$this->title = 'Update Waiting Students';
$this->params['breadcrumbs'][] = ['label' => 'Waitings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="waiting-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
