<?php

namespace app\controllers;

use Yii;
use app\models\Bus;
use app\models\BusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BusController implements the CRUD actions for Bus model.
 */
class BusController extends Controller
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
     * Lists all Bus models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {       
        $searchModel = new BusSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
       
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }   
        
    }

    /**
     * Displays a single Bus model.
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

    public function actionCustomerview($bus_route_id,$route_id)
    {
        return $this->render('customerview', [
            'bus_route_id' => $bus_route_id,
            'route_id' => $route_id
        ]);
    }
    /**
     * Creates a new Bus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bus();

        if ($model->load(Yii::$app->request->post())&& $model->save()) {  
            return $this->redirect(['view', 'id' => $model->bus_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    // public function actionForm(){
    //     $model = new Bus();

    //     if ($model->load(Yii::$app->request->post())&& $model->save()) {  
    //         return $this->redirect(['view', 'id' => $model->bus_id]);
    //     }

    //     return $this->render('form', [
    //         'model' => $model,
    //     ]);
    // }
    /**
     * Updates an existing Bus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bus_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bus model.
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
     * Finds the Bus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bus::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
