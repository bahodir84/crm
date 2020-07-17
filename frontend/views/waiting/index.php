<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Times;
use common\models\Subjects;
use common\models\Levels;
use common\models\Days;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WaitingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Waiting Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="waiting-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>


<?php

$gridColumns = [
['class' => 'kartik\grid\SerialColumn'],


   // ['class' => 'kartik\grid\CheckboxColumn'],

  'id',


        ['attribute'=>'student',
           'format' => 'raw',
            'value'=>function($data){
                        if( isset($data->student0->name) )
                        {
	                $id=$data->student0->name;
	                return Html::a(Html::encode($id),['/students/view','id'=>$data->student],['target'=>'_blank']);
	                }
	                
                    },
            ],

            'waitingbirth',
            

            'student0.phone',

            'student0.phone2',

            [
            'attribute'=>'subject',
            'value'=>'subject0.name',
            'filter'=>ArrayHelper::map(Subjects::find()->asArray()->all(), 'name', 'name'),
             ],


            [
            'attribute'=>'level',
            'value'=>'level0.name',
            'filter'=>ArrayHelper::map(Levels::find()->asArray()->all(), 'name', 'name'),
             ],



            [
            'attribute'=>'day',
            'value'=>'day0.name',
            'filter'=>ArrayHelper::map(Days::find()->asArray()->all(), 'name', 'name'),
             ],
           

            

[
    'attribute'=>'time',
    'value'=>'time0.name',
    'filter'=>ArrayHelper::map(Times::find()->asArray()->all(), 'id', 'name'),
],



            ['attribute'=>'status',
            'contentOptions'=>function($model,$key,$index,$column){
                return ['style'=>  $model->status=="waiting"? 'color:red; font-weight: bold':'color:blue; font-weight: bold'     ]; },

            'filter'=>array("waiting"=>"waiting","given"=>"given"),

                ],





          /*  ['attribute'=>'given_to',
            'value'=>'givenTo.name',
            'contentOptions'=>function($model,$key,$index,$column){
                return ['style'=>  $model->status=="given"? 'color:blue; font-weight: bold':''     ]; },
            ],*/
            


            ['attribute'=>'group_id',
           'format' => 'raw',
            'value'=>function($data){
                    $id=$data->group_id;
                   return Html::a(Html::encode($id),['/groups/view','id'=>$id],['target'=>'_blank']);
                    },


            'contentOptions'=>function($model,$key,$index,$column){
            return ['style'=>  $model->status=="given"? 'font-weight: bold':''     ]; },

            ],



           
            
           // ['attribute'=>'branch',
           // 'value'=>'branch0.name'],

            'created_by',
            'created_at',
            //'updated_by',
            //'updated_at',
            //'notes:ntext',



    ['class' => 'kartik\grid\ActionColumn'],
];
?>



   <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
   
    'containerOptions' => ['style'=>'overflow: auto; font-size: 12px'], // only set when $responsive = false
   
   'resizableColumns'=>true,

    'pjax' => false,
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => false,
    'responsiveWrap'=>false,
    'hover' => true,
    'floatHeader' => true,
     'showPageSummary' => true,



    'toolbar' => [
        [
            'content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>',['create'], [
                    'type'=>'button', 
                    'title'=>'Add waiting list', 
                    'class'=>'btn btn-success'
                ]) . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                    'class' => 'btn btn-default', 
                    'title' => 'Refresh',
                    
                ]),


        ],



        '{export}',
        '{toggleData}'
        ],


    'panel' => [
        'type' => GridView::TYPE_PRIMARY
    ],
]);

 ?>
</div>
