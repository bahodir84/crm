<?php

namespace backend\controllers;

use Yii;
use common\models\AuthAssignment;
use common\models\AuthAssignmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;



use yii\web\ForbiddenHttpException;
/**
 * AuthAssignmentController implements the CRUD actions for AuthAssignment model.
 */
class AuthAssignmentController extends Controller
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
     * Lists all AuthAssignment models.
     * @return mixed
     */
    public function actionIndex()
    {
         if ( Yii::$app->user->can('director'))
        {

            $searchModel = new AuthAssignmentSearch();
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
     * Displays a single AuthAssignment model.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($item_name, $user_id)
    {

         if ( Yii::$app->user->can('director'))
        {

            return $this->render('view', [
                'model' => $this->findModel($item_name, $user_id),
            ]);
        }
        else
        {
            throw new ForbiddenHttpException;
        }

    }

    /**
     * Creates a new AuthAssignment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       
         if ( Yii::$app->user->can('director'))
        {
            $model = new AuthAssignment();
            
            $model->created_at=date("Y-m-d H:i:s",time());
            date_default_timezone_set('Asia/Tashkent');

            $model->created_by=\Yii::$app->user->identity->username;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
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
     * Updates an existing AuthAssignment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($item_name, $user_id)
    {
      
         if ( Yii::$app->user->can('director'))
        {
            $model = $this->findModel($item_name, $user_id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
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
     * Deletes an existing AuthAssignment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($item_name, $user_id)
    {

         if ( Yii::$app->user->can('director'))
        {
            $this->findModel($item_name, $user_id)->delete();

            return $this->redirect(['index']);

        }
        else
        {
            throw new ForbiddenHttpException;
        }
                

    }

    /**
     * Finds the AuthAssignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $item_name
     * @param string $user_id
     * @return AuthAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($item_name, $user_id)
    {
        if (($model = AuthAssignment::findOne(['item_name' => $item_name, 'user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
