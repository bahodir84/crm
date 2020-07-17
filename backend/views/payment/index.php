<?php
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
//use dosamigos\datepicker\DatePicker;
use kartik\daterange\DateRangePicker;

use common\models\Teachers;
use yii\helpers\ArrayHelper;

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

            ['attribute'=>'id',
              'pageSummary' => 'Total',

            ],

            ['attribute'=>'student',
            'value'=>'student0.name'],

            'group_id',


           ['attribute'=>'teacher',
           'value'=>'teacher0.name',
            'filter'=>ArrayHelper::map(Teachers::find()->all(),'name','name'),
            ],

            [   'attribute' => 'amount',
            'pageSummary' => true,  ],


            'teacher0.salary_percentage',
            'teacher0.paper_percentage',

            ['attribute'=>'teacher0.nalog',
            'contentOptions'=>function($model,$key,$index,$column){
                return ['style'=>  'color:red; font-weight: bold'  ]; },
                ],

            ['attribute'=>'teacher0.kommunal',
            'contentOptions'=>function($model,$key,$index,$column){
                return ['style'=>  'color:red; font-weight: bold'  ]; },
                ],



            'teacher0.fine_percentage',
            'teacher0.bonus_percentage',


            ['attribute'=>'Salary',
            'value'=>function($model){
                $all=$model->amount;

                if ( isset($model->teacher0))
                {
                    $sal_per=$model->teacher0->salary_percentage;
                    $paper_per=$model->teacher0->paper_percentage;
                    //$nalog=$model->teacher0->nalog;
                    //$kommunal=$model->teacher0->kommunal;
                    $fine_per=$model->teacher0->fine_percentage;
                    $bonus_per=$model->teacher0->bonus_percentage;


                    $sal_per_amount=$all*$sal_per/100;
                    $paper_per_amount=$sal_per_amount*$paper_per/100;
                    $fine_per_amount=$sal_per_amount*$fine_per/100;
                    $bonus_per_amount=$sal_per_amount*$bonus_per/100;

                    $total=$sal_per_amount-$paper_per_amount-$fine_per_amount+$bonus_per_amount;

                    return $total;
                }else{
                    return 0;
                }
            

                


                

            },
            'pageSummary'=>true,
             ],


  
           ['attribute'=>'month',
            'filter'=>array("first month"=>"first month","second month"=>"second month","third month"=>"third month","fourth month"=>"fourth month","fifth month"=>"fifth month","sixth month"=>"sixth month"),
            ],

           ['attribute'=>'type',
            'value'=>'type',
            'filter'=>array("cash"=>"cash","plastic"=>"plastic","bank"=>"bank"),
            ],


            'created_by',

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
            //'start_date',
            //'end_date',

            //'updated_by',
            //'updated_at',
            //'notes:ntext',

    ['class' => 'kartik\grid\ActionColumn'],
];
?>





  
    
    
   <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'showFooter' => true,
    'columns' => $gridColumns,
   
    'containerOptions' => ['style'=>'overflow: auto; font-size: 10px'], // only set when $responsive = false
   
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
    
    
    echo "P.S. Отнимите налоги и коммунальные услуги из общей суммы зарплаты в программе Excel";
    
     ?>
</div>
