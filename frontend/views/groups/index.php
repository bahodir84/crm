<?php

use yii\helpers\Html;
use yii\grid\GridView;

use common\models\Teachers;
use common\models\Subjects;
use common\models\Levels;
use common\models\Days;
use common\models\Times;
use common\models\Branches;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $searchModel common\models\GroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groups-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Groups', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',


           ['attribute'=>'teacher',
           'value'=>'teacher0.name',
            'filter'=>ArrayHelper::map(Teachers::find()->all(),'name','name'),
            ],





 
            ['attribute'=>'subject',
           'value'=>'subject0.name',
            'filter'=>ArrayHelper::map(Subjects::find()->all(),'name','name'),
            ],



            
            ['attribute'=>'level',
           'value'=>'level0.name',
            'filter'=>ArrayHelper::map(Levels::find()->all(),'name','name'),
            ],


            ['attribute'=>'day',
           'value'=>'day0.name',
            'filter'=>ArrayHelper::map(Days::find()->all(),'name','name'),
            ],



            ['attribute'=>'time',
           'value'=>'time0.name',
            'filter'=>ArrayHelper::map(Times::find()->all(),'name','name'),
            ],

            ['attribute'=>'branch',
           'value'=>'branch0.name',
            'filter'=>ArrayHelper::map(Branches::find()->all(),'name','name'),
            ],




            'starting_date',
            'duration_months',
            'created_by',
            //'created_at',
            'updated_by',
            //'updated_at',
            //'notes:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
