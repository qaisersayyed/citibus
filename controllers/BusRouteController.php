<?php

namespace app\controllers;

use Yii;
use app\models\BusRoute;
use app\models\RouteSearch;
use app\models\Route;
use app\models\RouteStopType;
use app\models\Stops;
use app\models\BusRouteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BusRouteController implements the CRUD actions for BusRoute model.
 */
class BusRouteController extends Controller
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
     * Lists all BusRoute models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BusRouteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BusRoute model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    //bus view
    public function actionBus_view($from, $to, $date)
    {
        $searchModel = new RouteSearch();
        echo $from;
        echo $to;
        $from_id = Stops::find(['stop_id'])->where(['stop_name' => $from])->one();
        $to_id = Stops::find(['stop_id'])->where(['stop_name' => $to])->one();
         
         $route_id = RouteStopType::find(['route_id'])->where(['stop_id' => $from_id->stop_id])->andwhere(['stop_id' => $to_id->stop_id])->all();
         echo json_encode($route_id);
         // $model = Route::find()->where(['to'=>$to])->one();
        // $query = new \yii\db\Query;
        // $query->select('route_id')->from('route')->where(['from' => $from])->andwhere(['to' => $to])->one();
        // $rows = $query->all();
        // $command = $query->createCommand();
        // $rows = $command->queryAll();
        // $route_id = ($rows[0]["route_id"]);
        foreach($route_id as $routeid){
            echo ($routeid->route_id);
        }
        
        // $stop_id = RouteStopType::find(['stop_id'])->where(['route_id' => $route_id])->orderby(['stop_order' =>SORT_ASC])->all();
        
        
        
        
        // return $this->render('bus_view', [
        //     'f' => $from,
        //     't' => $to,
        //     'date' => $date,
        //     'stop_id' => $stop_id,
        // ]);
    }

    /**
     * Creates a new BusRoute model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BusRoute();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bus_route_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BusRoute model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bus_route_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BusRoute model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BusRoute model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BusRoute the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    // find for bus view
    
    //
    protected function findModel($id)
    {
        if (($model = BusRoute::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
