<?php

namespace app\controllers;

use Yii;
use app\models\BusSeats;
use app\models\Customer;
use app\models\Tickets;
use app\models\TicketsSearch;
use app\models\BusSeatsSearch;
use app\models\CustomerSearch;
use app\models\RouteSearch;
use app\models\BusRouteSearch;
use app\models\RouteStopTypeSearch;
use app\models\BusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Transaction;

/**
 * BusSeatsController implements the CRUD actions for BusSeats model.
 */
class BusSeatsController extends Controller
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
     * Lists all BusSeats models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BusSeatsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionSeatselect($rst_id,$bus_id,$route_id,$bus_route_id){
        $model = BusSearch::find()->where(['bus_id'=>$bus_id])->one();
        $route_id = RouteSearch::find()->where(['route_id'=>$route_id])->one();
        $bus_route_id_m = BusRouteSearch::find()->where(['bus_route_id'=>$bus_route_id])->one();
        $route_stop_type_id = RouteStopTypeSearch::find()->where(['route_stop_type_id'=>$rst_id])->one();

         if(Yii::$app->request->get('seat') ){
            $seat = Yii::$app->request->get('seat');
            $fare = Yii::$app->request->get('fare');
    
         return $this->redirect(array('bus-seats/payment',
                 'route_id' =>$route_id->route_id,
                'bus_route_id' => $bus_route_id_m->bus_route_id,
                'route_stop_type_id' => $route_stop_type_id->route_stop_type_id,        
                'seat' => $seat,
                'fare' => $fare,
         ));
          }
         else{          
    
            $query = new \yii\db\Query;
            $query->select('seat_code')->from('tickets')->where(['bus_route_id' => $bus_route_id])->all();
            $rows = $query->all();
            $command = $query->createCommand();
            $rows = $command->queryAll();
            
           return $this->render('seatselect', [          
                'model' => $model,
                'route_id' =>$route_id,
                'bus_route_id' => $bus_route_id_m,
                'route_stop_type_id' => $route_stop_type_id,
                'rows' =>$rows,
               
             ]);
     }  
    }
    
    

    /**
     * Displays a single BusSeats model.
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

    public function actionPayment($fare,$route_id,$bus_route_id,$route_stop_type_id,$seat)
    {   
       // echo  $fare,$route_id,$bus_route_id,$route_stop_type_id,$seat;

        if (Yii::$app->user->id == null){
            return $this->redirect(['site/login']);
        }else{                                                                                                                                                  


        $user_id = Yii::$app->user->id;
        $data = Customer::find()->where(['user_id' => $user_id ])->one();
        return $this->render('payment', [
            
            'name' => $data->name,
            'amount' => $fare,
            'route_id' => $route_id,
            'bus_route_id' => $bus_route_id,
            'rst_id'=> $route_stop_type_id,
            'seats' => $seat,
            
        ]);}
    }
    public function actionPaymentaction()
    
    {  
//         $od = Yii::$app->request->post('ORDER_ID');
        echo $name = Yii::$app->request->post('CUST_ID'),"<br>";
        $data = Customer::find()->where(['name' => $name ])->one();

        echo $amount =Yii::$app->request->post('TXN_AMOUNT'),"<br>";
        echo $order_id = Yii::$app->request->post('ORDER_ID'),"<br>";
        echo $route_id = Yii::$app->request->post('routeid'),"<br>";
        echo $seat =Yii::$app->request->post('seat'),"<br>";
        echo $bus_route_id = Yii::$app->request->post('busroute'),"<br>";
        echo $route_stop_type_id =Yii::$app->request->post('rstid'),"<br>";

        $s = array();
     $length =strlen($seat);
       json_encode($seat);
        
            function mod($i,$length){
            $m = $i % $length;
            if ($m > $length)
                mod($m,$length);
                return $m;
             }
            for ($a = 0; $a <= $length;$a=$a+3) {
                $k=mod($a,50); 
                // echo $k;
                array_push($s,$seat[$k].$seat[$k+1]);
                
                $myArray = str_split($seat);
                array_splice($myArray, $k+2, 1);
                

          }

         foreach($s as $seats){
            Yii::$app->db->createCommand("INSERT INTO transaction (transaction_id,bus_route_id,customer_id,route_stop_type_id,seat_code,order_id,amount)
             VALUES (NULL,'$bus_route_id','$data->customer_id','$route_stop_type_id','$seats','$order_id','$amount')"
             )->execute();
            
            }
            

        return $this->render('PaytmKit/pgRedirect' 
          );
        
    }

    public function actionPaymentresponse()
    
    {  
       // echo $order_id;
     //  echo Yii::$app->request->get('or'),"<br>";
       $orderid = Yii::$app->request->get('order_no');
       $amount = Yii::$app->request->get('amount');
       $date = Yii::$app->request->get('date');
       $txnid = Yii::$app->request->get('txnid');
       $status = Yii::$app->request->get('status');

        echo $orderid,"<br>"; 
        echo $amount,"<br>"; 
        echo $date,"<br>"; 
        echo $txnid,"<br>"; 
        echo $status,"<br>"; 
        // foreach($s as $seats){
            // Yii::$app->db->createCommand("INSERT INTO transaction (transaction_id,bus_route_id,customer_id,route_stop_type_id,seat_code,order_id,amount)
            //  VALUES (NULL,'$bus_route_id','$data->customer_id','$route_stop_type_id','$seats','$order_id','$amount')"
            //  )->execute();
            
        //     }
        $transactions = Transaction::find()->where(['order_id' => $orderid, 'amount' => $amount ])->all();

        foreach($transactions as $data){
            echo $data->transaction_id,"<br>";
            // Yii::$app->db->createCommand("UPDATE transaction SET column1 = value1, column2 = value2,WHERE condition; )"
            //  )->execute();
            //inserting in ticket
            Yii::$app->db->createCommand("INSERT INTO tickets (ticket_id,customer_id,bus_route_id,route_stop_type_id,seat_code,fare)
             VALUES (NULL,'$data->customer_id','$data->bus_route_id','$data->route_stop_type_id','$data->seat_code','$amount')"
             )->execute();

             $tickets = Tickets::find()->where(['customer_id' => $data->customer_id,'seat_code' => $data->seat_code,'fare' => $amount ])->one();
             echo "ticketd" ,$tickets->ticket_id;
             Yii::$app->db->createCommand("UPDATE transaction SET ticket_id = '$tickets->ticket_id', txn_id = '$txnid' ,date = '$date', status = 1  WHERE order_id = '$data->order_id'; )"
             )->execute();
        }
        return $this->redirect(['tickets/viewtickets']);
        // return $this->render('tickets/viewtickets' 
        //   );
    }

    /**
     * Creates a new BusSeats model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BusSeats();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bus_seat_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BusSeats model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bus_seat_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BusSeats model.
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
     * Finds the BusSeats model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BusSeats the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BusSeats::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
