<?php

namespace app\controllers;

use Yii;
use app\models\Pass;
use app\models\RouteStopType;
use app\models\Customer;
use app\models\PassSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use DateTime;
/**
 * PassController implements the CRUD actions for Pass model.
 */
class PassController extends Controller
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
     * Lists all Pass models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PassSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pass model.
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
     * Creates a new Pass model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pass();
        if ($model->load(Yii::$app->request->post()) ) {
            $start_date =  $model->start_date;
            $end_date = new DateTime($start_date);
            $end_date->modify("+1 month");
            $model->end_date = $end_date->format("Y-m-d"); 
            $route_id  = $model->route_id;
            $route = RouteStopType::find()->where(['route_id'=> $route_id])->orderBy(['stop_order' => SORT_DESC]) ->one();
            $fare = ($route->fare)* 60;
            $user_id = Yii::$app->user->id;
            $customer = Customer::find()->where(['user_id'=> $user_id ])->one();
            $model->customer_id = $customer->customer_id;
            $model->fare =  $fare; 
            // $model->save();
           
            return $this->redirect(['viewpass', 'id' => 8]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionViewpass($id)
    {
        if (!Yii::$app->user->isGuest) {       
            return $this->render('viewpass', [
                'model' => $this->findModel($id),
            ]);
            }else{
                throw new \yii\web\ForbiddenHttpException;
            }
    }
    /**
     * Updates an existing Pass model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pass_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pass model.
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
     * Finds the Pass model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pass the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pass::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
