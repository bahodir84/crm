<?php

namespace backend\controllers;

use Yii;
use common\models\Expenditures;
use common\models\ExpendituresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;



use yii\web\ForbiddenHttpException;



/**
 * ExpendituresController implements the CRUD actions for Expenditures model.
 */
class ExpendituresController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Expenditures models.
     * @return mixed
     */
    public function actionIndex()
    {
      

        if ( Yii::$app->user->can('manager'))
        {

            $searchModel = new ExpendituresSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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
     * Displays a single Expenditures model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        if ( Yii::$app->user->can('manager'))
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
     * Creates a new Expenditures model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {





        if ( Yii::$app->user->can('manager'))
        {  
            $model = new Expenditures();

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
     * Updates an existing Expenditures model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {




        if ( Yii::$app->user->can('director'))
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
     * Deletes an existing Expenditures model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {


        if ( Yii::$app->user->can('manager'))
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
     * Finds the Expenditures model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Expenditures the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Expenditures::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
