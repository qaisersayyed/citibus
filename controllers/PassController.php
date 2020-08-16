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
           // $fare = (10 / 100) * $fare;
           $fare = 250;
            $user_id = Yii::$app->user->id;
            $customer = Customer::find()->where(['user_id'=> $user_id ])->one();
          //  $model->customer_id = $customer->customer_id;
          //  $model->fare =  $fare;
           // $model->save();
          //  echo $route_id," ",$fare," ",$model->up_down," ",$customer->customer_id," ",$model->start_date," ",$model->end_date;
            // echo $model->pass_id;
            return $this->redirect(array('preview','customer_id' => $customer->customer_id,
            'route_id' => $route_id, 'start_date' => $model->start_date, 'end_date' => $model->end_date,
            'up_down' => $model->up_down , 'fare' => $fare,'customer_name' => $customer->name));
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionViewpass($id)
    {
        if (!Yii::$app->user->isGuest) {       
            return $this->render('viewpass', [
                'pass' => $this->findModel($id),
            ]);
            }else{
                throw new \yii\web\ForbiddenHttpException;
            }
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


        // Yii::$app->db->createCommand(
        //     "INSERT INTO pass (customer_id,route_id,start_date,end_date,up_down,fare,order_id)
        //  VALUES ('$customer_id','$route_id','$start_date','$end_date',60,'$amount','$order_id
        //  ')"
        // )->execute();
       // echo $model->pass_id;


        
       //echo $amount,"##",$order_id,"##",$route_id,"##",$customer_id,"##",$start_date,"##",$end_date;
        return $this->redirect(['paymentprocess','ORDER_ID' =>$order_id,
        'CUST_ID' => $customer_id,
     'CHANNEL_ID' => 'WEB' ,'INDUSTRY_TYPE_ID' => 'Retail',
            'route_id' => $route_id, 'start_date' => $start_date, 'end_date' => $end_date,
             'fare' => $amount,]);
    }


    public function actionPaymentprocess($ORDER_ID,$CUST_ID,$CHANNEL_ID,$INDUSTRY_TYPE_ID,$route_id,$start_date,
    $end_date,$fare)
    {
        $model = new Pass();
        $model->customer_id = $CUST_ID;
        $model->route_id = $route_id;
        $model->start_date = $start_date;
        $model->end_date = $end_date;
        $model->up_down = 60;
        $model->fare = $fare;
        $model->order_id = $ORDER_ID;
        $model->save();
   // echo $ORDER_ID,$CUST_ID,$TXN_AMOUNT,$CHANNEL_ID,$INDUSTRY_TYPE_ID;
    return $this->render('PaytmKit/pgRedirect',['ORDER_ID' =>$ORDER_ID,
    'CUST_ID' => $CUST_ID, 'TXN_AMOUNT' => 100, 'CHANNEL_ID' => 'WEB' ,'INDUSTRY_TYPE_ID' => 'Retail']);

    }

    public function actionPaymentresponse(){
        
        $orderid = Yii::$app->request->get('order_no');
        $amount = Yii::$app->request->get('amount');
        $date = Yii::$app->request->get('date');
        $txnid = Yii::$app->request->get('txnid');
        $status = Yii::$app->request->get('status');
        $user_id = Yii::$app->user->id;
        $customer = Customer::find()->where(['user_id'=> $user_id ])->one();
        $pass = Pass::find()->where(['order_id'=> $orderid,'customer_id' =>$customer->customer_id])->one();
        $pass->order_id = $orderid;
        $pass->txn_id = $txnid;
        $pass->status = 1;
        $pass->txn_date = $date;

        $pass->save();
        // echo "saved";        
        return $this->render('viewpass', [
            'pass' => $pass,
        ]);



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



    public function actionAllpasses()
    {
        $user_id = Yii::$app->user->id;
        $customer = Customer::find()->where(['user_id'=> $user_id ])->one();
        $pass = Pass::find()->where(['customer_id'=> $customer->customer_id, 'status' => 1 ])->orderBy(['created_at' => SORT_DESC])->all();

        return $this->render('allpasses', [
            'passes' => $pass,
        ]);
        
    }

    public function actionRefundpass($id)
    {

        $pass = Pass::find()->where(['pass_id' => $id])->one();
       // echo $pass->start_date;
        return $this->render('refundpass', [
            'model' => $pass,
        ]);
        
    }

    public function actionRefunddone($pass_id)
    {
        $pass = Pass::find()->where(['pass_id' => $pass_id])->one();
        $pass->status = 0;
        $pass->save();

        // $pass = Pass::find()->where(['pass_id' => $id])->one();
       // echo $pass->start_date;
        return $this->render('refunddone', [
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
