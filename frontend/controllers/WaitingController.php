<?php

namespace frontend\controllers;

use Yii;

use common\models\Students;

use common\models\Waiting;
use common\models\WaitingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\ForbiddenHttpException;
/**
 * WaitingController implements the CRUD actions for Waiting model.
 */
class WaitingController extends Controller
{



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
     * Lists all Waiting models.
     * @return mixed
     */
    public function actionIndex()
    {

        if ( Yii::$app->user->can('index'))
        {
            $searchModel = new WaitingSearch();
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
     * Displays a single Waiting model.
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
     * Creates a new Waiting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        if ( Yii::$app->user->can('waiting-create'))
        {
            $model = new Waiting();

            $model->created_by=\Yii::$app->user->identity->username;

            date_default_timezone_set('Asia/Tashkent');
            $model->created_at=date('Y-m-d H:i:s',time());


            if (   $model->load(Yii::$app->request->post())    ) {

            // start creating automatic birth year from students database
            $current_student_id=$model->student;
            $mystudents = Students::find()
            ->where([  'id'=>$current_student_id   ])
            ->one();
            $model->waitingbirth=$mystudents->birth_year;
            // end

                if ( $model->save() )
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
     * Updates an existing Waiting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        if ( Yii::$app->user->can('waiting-update'))
        {
            $model = $this->findModel($id);

            $model->updated_by=\Yii::$app->user->identity->username;

            date_default_timezone_set('Asia/Tashkent');
            $model->updated_at=date('Y-m-d H:i:s',time());

            if ($model->load(Yii::$app->request->post())   ) {


               if ( $model->status=="waiting")
                    {

                    $model->group_id=NULL;    

                    }

            // start creating automatic birth year from students database
            $current_student_id=$model->student;
            $mystudents = Students::find()
            ->where([  'id'=>$current_student_id   ])
            ->one();
            $model->waitingbirth=$mystudents->birth_year;
            // end

                if ( $model->save())
                    {
                    return $this->redirect(['view', 'id' => $model->id]);
                    }


                
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
     * Deletes an existing Waiting model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        if ( Yii::$app->user->can('waiting-del'))
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
     * Finds the Waiting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Waiting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Waiting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
