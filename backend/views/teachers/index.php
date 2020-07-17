<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TeachersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teachers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Teachers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'passport',
            'gender',
            'birth_year',
            'phone',
            //'home_phone',
            //'address:ntext',
            //'marital',
            //'spouse_name',
            //'spouse_phone',
            //'number_of_children',
            'ielts',
            'cefr',
            //'previous_work:ntext',
            ['attribute'=>'subject1',
            'value'=>'subject10.name'],
            //['attribute'=>'Second subject',
            //'value'=>'subject10.name'],
            //'purpose_of_working:ntext',
            //'special_abilities',
            //'notes:ntext',
            'salary_percentage',
            'paper_percentage',
            'nalog',
            'kommunal',
            'bonus_percentage',
            'fine_percentage',
            'visible',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
