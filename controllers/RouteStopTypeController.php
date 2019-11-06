<?php

namespace app\controllers;

use Yii;
use app\models\RouteStopType;
use app\models\RouteStopTypeSearch;
use app\models\Stops;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Route;
use yii\bootstrap\Alert;

// use app\models\RouteStopType;

/**
 * RouteStopTypeController implements the CRUD actions for RouteStopType model.
 */
class RouteStopTypeController extends Controller
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
     * Lists all RouteStopType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RouteStopTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    // public function actionBus()
    // {
        
    //     return $this->render('bus');
    // }
    public function actionForm()
    {
        $searchModel = new RouteStopTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->request->get('from')) {
            $from = Yii::$app->request->get('from');
            $to = Yii::$app->request->get('to');
            $date = Yii::$app->request->get('date');
            
            return $this->redirect(array('bus-route/bus_view',
                'from' => $from,
                'to' => $to,
                'date' => $date
            ));
        } else {
            return $this->render('form', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        // $route_id = Route::find()->where(['from' => $from , 'to' => $to ])->one();
    }

    protected function findModel1($route_id)
    {
        if (($model = RouteStopType::findOne(['route_id' => $route_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    /**
     * Displays a single RouteStopType model.
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

    /**
     * Creates a new RouteStopType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RouteStopType();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->route_stop_type_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RouteStopType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->route_stop_type_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RouteStopType model.
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
     * Finds the RouteStopType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RouteStopType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */


    

    protected function findModel($id)
    {
        if (($model = RouteStopType::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
