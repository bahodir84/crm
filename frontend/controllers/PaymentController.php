<?php

namespace frontend\controllers;

use Yii;
use common\models\Payment;
use common\models\PaymentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\ForbiddenHttpException;

/**
 * PaymentController implements the CRUD actions for Payment model.
 */
class PaymentController extends Controller
{


    public function timelimit()
{
        date_default_timezone_set('Asia/Tashkent');
        $time=$time=date('H:i'); 

        if ( $time< "08:00" || $time>"23:30" )
            throw new NotFoundHttpException('Not allowed - operation time is between 8:00 and 23:30');

}
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Payment models.
     * @return mixed
     */
    public function actionIndex()
    {

        if ( Yii::$app->user->can('index'))
        {

            $searchModel = new PaymentSearch();
            
            
            $queryParams = array_merge(array(),Yii::$app->request->getQueryParams());
            $logged_username=\Yii::$app->user->identity->username;
            $queryParams["PaymentSearch"]["created_by"] = $logged_username ;
            $dataProvider = $searchModel->search($queryParams);
            
            
            
            //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }


        else if ( Yii::$app->user->can('teacher'))
        {
            $searchModel = new PaymentSearch();

            $queryParams = array_merge(array(),Yii::$app->request->getQueryParams());
            $logged_username=\Yii::$app->user->identity->username;
            $queryParams["PaymentSearch"]["teacher"] = $logged_username ;
            //$queryParams["PaymentSearch"]["status"] = "DRAFT" ;



            //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider = $searchModel->search($queryParams);


            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }


        else
        {
            throw new ForbiddenHttpException;           
        }



    }

    /**
     * Displays a single Payment model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {


        if ( Yii::$app->user->can('view'))
        {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        else
        {
            throw new ForbiddenHttpException;
        }        




    }

    /**
     * Creates a new Payment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->timelimit();

        if ( Yii::$app->user->can('payment-create'))
        {

            $model = new Payment();

            $model->created_by=\Yii::$app->user->identity->username;

            date_default_timezone_set('Asia/Tashkent');
            $model->created_at=date('Y-m-d H:i:s',time());

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
        else
        {
            throw new ForbiddenHttpException;
        }



    }

    /**
     * Updates an existing Payment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->timelimit();

        if ( Yii::$app->user->can('payment-update'))
        {
            $model = $this->findModel($id);

            $model->updated_by=\Yii::$app->user->identity->username;

            date_default_timezone_set('Asia/Tashkent');
            $model->updated_at=date('Y-m-d H:i:s',time());


            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        else
        {
            throw new ForbiddenHttpException;
        }



    }

    /**
     * Deletes an existing Payment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->timelimit();
        
        if ( Yii::$app->user->can('payment-del'))
        {
                    
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        else
        {
            throw new ForbiddenHttpException;
        }


    }

    /**
     * Finds the Payment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Payment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Payment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
