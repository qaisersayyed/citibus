<?php

namespace app\controllers;

use Yii;
use app\models\Stops;
use app\models\StopsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Home;
/**
 * StopsController implements the CRUD actions for Stops model.
 */
class HomeController extends Controller
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
     * Lists all Stops models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new StopsSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Home();
        return $this->render('index', [
                    'model' => $model,
                   // $this->findModel(),
                ]);

    }
    public function actionForm()
    {
        // $searchModel = new StopsSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$model = new Home();
        return $this->render('form');

    }
    /**
     * Displays a single Stops model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionView($id)
    // {
    //     return $this->render('view', [
    //         'model' => $this->findModel($id),
    //     ]);
    // }

    /**
     * Creates a new Stops model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $model = new Stops();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->stop_id]);
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Updates an existing Stops model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->stop_id]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Deletes an existing Stops model.
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
     * Finds the Stops model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Stops the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel()
    {
        return Stops::find()
        ->where(['stop_name', $from_id])
        ->andWhere(['stop_name', $to_id])
        ->all();
        // if (($model = Stops::findOne($id)) !== null) {
        //     return $model;
        // }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
