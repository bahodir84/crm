<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Waiting */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Waitings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="waiting-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'student0.name',
            'subject0.name',
            'level0.name',
            'day0.name',
            'time0.name',
            'status',
            //'givenTo.name',
            'group.id',
            //'branch0.name',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'notes:ntext',
        ],
    ]) ?>

</div>
