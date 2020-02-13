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
            $route_id  = $model->route_id;
            $route = RouteStopType::find()->where(['route_id'=> $route_id])->orderBy(['stop_order' => SORT_DESC]) ->one();
            $fare = ($route->fare)* 60;
            $user_id = Yii::$app->user->id;
            $customer = Customer::find()->where(['user_id'=> $user_id ])->one();
            $model->customer_id = $customer->customer_id;
            $model->fare =  $fare;
           // $model->save();
            echo $route_id," ",$fare," ",$model->up_down," ",$customer->customer_id," ",$model->start_date," ",$model->end_date;
            // echo $model->pass_id;
            return $this->redirect(array('preview','customer_id' => $customer->customer_id,
            'route_id' => $route_id, 'start_date' => $model->start_date, 'end_date' => $model->end_date,
            'up_down' => $model->up_down , 'fare' => $fare,'customer_name' => $customer->name));
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionPreview($route_id,$fare,$up_down,$customer_id,$start_date,$end_date,$customer_name)
    {
       
        return $this->render('preview', [
            'customer_id' => $customer_id,
            'route_id' => $route_id, 'start_date' => $start_date, 'end_date' => $end_date,
            'up_down' => $up_down , 'fare' => $fare, 'customer_name' => $customer_name
            
        ]);
    }


    public function actionPaymentaction()
    {
        $amount =Yii::$app->request->post('TXN_AMOUNT');
        $order_id = Yii::$app->request->post('ORDER_ID');
        $route_id = Yii::$app->request->post('route_id');
        $customer_id =Yii::$app->request->post('CUST_ID');
        $start_date = Yii::$app->request->post('start_date');
        $end_date =Yii::$app->request->post('end_date');

        
       echo $amount,"##",$order_id,"##",$route_id,"##",$customer_id,"##",$start_date,"##",$end_date;
        //return $this->render('preview');
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
