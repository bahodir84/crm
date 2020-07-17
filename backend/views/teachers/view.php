<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Teachers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-view">

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
            'name',
            'passport',
            'gender',
            'birth_year',
            'phone',
            'home_phone',
            'address:ntext',
            'marital',
            'spouse_name',
            'spouse_phone',
            'number_of_children',
            'ielts',
            'cefr',
            'previous_work:ntext',
            'subject10.name',
            'subject20.name',
            'purpose_of_working:ntext',
            'special_abilities',
            'notes:ntext',
            'salary_percentage',
            'paper_percentage',
            'nalog',
            'kommunal',
            'fine_percentage',
            'bonus_percentage',
            'visible',
        ],
    ]) ?>

</div>
