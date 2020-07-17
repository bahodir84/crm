<?php

use yii\helpers\Html;
//use yii\grid\GridView;

use kartik\grid\GridView;

//use dosamigos\datepicker\DatePicker;
use kartik\daterange\DateRangePicker;


use common\models\Staffs;
use common\models\Branches;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ExpendituresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expenditures';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expenditures-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Expenditures', ['create'], ['class' => 'btn btn-success']) ?>
    </p>








<?php 


$gridColumns = [
['class' => 'kartik\grid\SerialColumn'],

/*            ['attribute'=>'id',
              'pageSummary' => 'Total',

            ],*/



            ['attribute'=>'staff',
            'value'=>'staff0.name',
            'filter'=>ArrayHelper::map(Staffs::find()->all(),'name','name'), ],

            ['attribute'=>'branch',
            'value'=>'branch0.name',
            'filter'=>ArrayHelper::map(Branches::find()->all(),'name','name'),
            'pageSummary' => 'Total'],


            ['attribute'=>'amount',
            'pageSummary'=>true,],


            'for_what:ntext',

            
           ['attribute'=>'created_at',
            'value'=>'created_at',
            'format'=>'raw',
            'filter'=> DateRangePicker::widget([
                'model'=>$searchModel,
                'attribute'=>'created_at',
                'convertFormat'=>false,
                'presetDropdown'=>true,
                'hideInput'=>true,
                'pluginOptions'=>[
                    'locale' => [ 'format' => 'YYYY-MM-DD' ],
  
                                ]
                                                ]),
            ],


    ['class' => 'kartik\grid\ActionColumn'],
];
?>



 <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'showFooter' => true,
    'columns' => $gridColumns,
   
    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
   
   'resizableColumns'=>true,

    'pjax' => false,
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
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
