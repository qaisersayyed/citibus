<?php

namespace app\controllers;

use Yii;
use app\models\Route;
use app\models\RouteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\RouteStopType;
use app\models\RouteStopTypeSearch;
use app\models\Stops;

/**
 * RouteController implements the CRUD actions for Route model.
 */
class TestController extends Controller
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
     * Lists all Route models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $from_name = Stops::find()->andwhere(['like','stop_name' , 'pilar' ])->one();
        $to_name = Stops::find()->andwhere(['like' ,'stop_name' , 'verna' ])->one();

        return $this->render('index', [
            'from_name' => $from_name,
            'to_name' => $to_name,
        ]);
       // }else{
        //    throw new \yii\web\ForbiddenHttpException;
        //}
    }

    /**
     * Displays a single Route model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        return $this->render('view', [
          
        ]);
    }

    public function actionGps()
    {

        if (Yii::$app->request->isAjax) {
            
            $data = Yii::$app->request->post();   
            $lat =  $data['lat'];
            $lng =  $data['lng'];   

            $code = 1;
            return $code;

            
        }
        return $this->render('gps', [
          

        ]);
    }

    public function actionTrack()
    {

       
        return $this->render('track', [
          

        ]);
    }

    /**
     * Creates a new Route model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $model = new Route();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->route_id]);
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Updates an existing Route model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->route_id]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Deletes an existing Route model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

    /**
     * Finds the Route model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Route the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Route::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
