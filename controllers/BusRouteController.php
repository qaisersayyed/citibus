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
        
        //  echo $id;
        return $this->render('view', [            
            'model' => $this->findModel($id),
        ]);
    }

    //bus view
    public function actionBus_view($from, $to, $date)
    {
        $searchModel = new RouteSearch();    
        
        return $this->render('bus_view', [
            'f' => $from,
            't' => $to,
            'date' => $date,
            // 'stop_id' => $stop_id,
        ]);
    }

    public function actionStart_ride()
    {
        
               
        return $this->render('start_ride');

}

    

    /**
     * Creates a new BusRoute model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BusRoute();

        if ($model->load(Yii::$app->request->post())) {
            $r_id =  $model->route_id;
            
            foreach ($r_id as $rid) {
                if($rid != null){
                    // echo $rid;
                    // echo "<br>";
                    // echo $model->bus_id;
                    // echo "<br>";
                    // echo $model->timing;
                    // echo "<br>";
                    $mod = new BusRoute();
                    $mod->route_id = $rid;
                    $mod->bus_id = $model->bus_id;
                    $mod->timing = $model->timing;
                     $mod->save();

                }                    
                }               
               return $this->redirect(['view', 'id' => $mod->bus_route_id]);
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
