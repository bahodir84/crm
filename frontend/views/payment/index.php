<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
//use dosamigos\datepicker\DatePicker;
use kartik\daterange\DateRangePicker;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



<?php

$gridColumns = [
['class' => 'kartik\grid\SerialColumn'],

          'id',



        ['attribute'=>'student',
           'format' => 'raw',
            'value'=>function($data){
                $id=$data->student0->name;
                return Html::a(Html::encode($id),['/students/view','id'=>$data->student],['target'=>'_blank']);
                    },
            ],



            ['attribute'=>'group_id',
           'format' => 'raw',
            'value'=>function($data){
                    $id=$data->group_id;
                   return Html::a(Html::encode($id),['/groups/view','id'=>$id],['target'=>'_blank']);
                   },
            ],

            ['attribute'=>'teacher',
            'value'=>'teacher0.name'],

            ['attribute'=>'amount',
              'pageSummary' => true ],

            'month',
            'type',
            'created_by',

            ['attribute'=>'created_at',
            'value'=>'created_at',
            'format'=>'raw',
            'contentOptions' => ['style' => 'width:100px; white-space: normal;'],
            'filter'=> DateRangePicker::widget([
                'model'=>$searchModel,
                'attribute'=>'created_at',
                'convertFormat'=>false,
                'presetDropdown'=>true,
                'options' => ['style'=>'width:30px'],
                'hideInput'=>true,
                'pluginOptions'=>[
                    'locale' => [ 'format' => 'YYYY-MM-DD' ],
  
    ]
]),
            ],
            //'start_date',
            //'end_date',

            //'updated_by',
            //'updated_at',
            //'notes:ntext',

    ['class' => 'kartik\grid\ActionColumn',
    'template'=>'{view}',
    ],
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
                    'title'=>'Add payment', 
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





