<?php

namespace app\controllers;

use Yii;
use app\models\Tickets;
use app\models\Customer;
use app\models\TicketsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Transaction;
use app\models\RouteStopType;
use app\models\Route;
use app\models\Stops;
use app\models\BusRoute;
use app\models\Bus;
use app\models\Pass;

/**
 * TicketsController implements the CRUD actions for Tickets model.
 */
class TicketsController extends Controller
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
     * Lists all Tickets models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TicketsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tickets model.
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
    
    public function actionViewtickets($order_id)
    {
        //manisha
        // Yii::$app->session->setFlash('success', "You have successfully Booked Ticket ");
        // echo $order_id;

        $transaction_id = Transaction::find()->where(['order_id' => $order_id])->all();
        $seat_code = array();
        foreach($transaction_id as $t_id){
            $ticketid = $t_id->ticket_id;
            $customer_id  = $t_id->customer_id;
            $amount = $t_id->amount;
            $route_stop_type_id = $t_id->route_stop_type_id;
            $bus_route_id = $t_id->bus_route_id;
            $date = $t_id->date;
            array_push($seat_code, $t_id->seat_code);
            // echo $seat_code;
        }
        // echo $customer_id,"<br>";
        // echo $amount,"<br>";
        // echo $route_stop_type_id,"<br>";
        // echo $bus_route_id,"<br>";
        // echo json_encode($seat_code),"<br>";
        // echo $date;
       
        $customer = Customer::find()->where(['customer_id'=>$customer_id])->one();
        $name =  $customer->name;
        // echo $name,"<br>";

        $rst_id = RouteStopType::find()->where(['route_stop_type_id'=>$route_stop_type_id])->one();
        $route_id = $rst_id->route_id;
        $stop_id = $rst_id->stop_id;
        // echo $route_id,"<br>";
        // echo $stop_id,"<br>";

        $route = Route::find()->where(['route_id'=>$route_id])->one();
        $from = $route->from;
        // echo $from,"<br>";

        $stops = Stops::find()->where(['stop_id'=>$stop_id])->one();
        $to= $stops->stop_name;
        // echo $to,"<br>";
       
        $bus_route  = BusRoute ::find()->where(['bus_route_id'=>$bus_route_id])->one();
        $bus_id = $bus_route->bus_id;
        $time = $bus_route->timing;
        // echo $bus_id,"<br>";
        // echo $time,"<br>";
        
        $bus  = Bus ::find()->where(['bus_id'=>$bus_id])->one();
        $bus_no = $bus->license_plate;
        
        return $this->render('viewtickets', [
                'name' => $name,
                'amount' => $amount,
                'date' => $date,
                'from' =>$from,
                'to' =>$to,
                'bus_no' => $bus_no,
                'time' => $time,
                'seat' => $seat_code,
                'ticketid' => $ticketid
        ]);
    }

    public function actionViewticket2($tid)
    {
        
        $transaction = Transaction::find()->where(['ticket_id' => $tid])->one();
        
        return $this->redirect(['tickets/viewtickets', 'order_id' => $transaction->order_id]);
       
    }

    public function actionAlltickets()
    {
        //qaiser
        $model = new Tickets();
        
        $user_id = Yii::$app->user->id;
        $cus = Customer::find()->where(['user_id' => $user_id ])->one();

        $tickets = Tickets::find()->where(['customer_id' => $cus,'status' => 1 ])->all();
        
       
      
        return $this->render(
            'alltickets',
            [
            'user_id' => $user_id,
            'customer_id' => $cus->customer_id,
        //    'data' => $tickets

        ]
        );
    }


    public function actionScanticket()
    {   
        
        return $this->render(
            'scanticket',
            [
        ]
        );
       
       
    }

    public function actionScan()
    {
        
        return $this->render('scan', [
            
        ]);
    }

    public function actionMarkticket()
    {
        $customer_name = '';
        $busno = '';
        $ticket_id = '';
        // $model = new Tickets();
        // $pass = new Pass();
        $from = '';
        $to = '';
        $rides = '';

        

       
        if (Yii::$app->request->isAjax) {
            
            $data = Yii::$app->request->post();   
            $code =  $data['ticket']; 
            $fst = substr($code,0,1);
            $no = substr($code,1);
            //echo $no;
            if($fst == "T" OR $fst == "t"){
                $model = Tickets::find()->where(['ticket_id' => $no ])->one();
                if($model == '') {
                    $code = 0;
                }elseif ($model->status == 0) {
                    $code = 2;
                }
                else{
                    $alltickets = Tickets::find()->where(['customer_id' => $model->customer_id,'fare' =>$model->fare,
                    'created_at' => $model->created_at ])->all();
                    foreach ($alltickets as $one){
                        $one->status = 0;
                        $one->save();
                    }     
    
                    $customer_id = $model->customer_id;
                    $cus_name = Customer::find()->where(['customer_id' => $customer_id])->one();
                    $customer_name = $cus_name->name;
                    $bus_route = BusRoute::find()->where(['bus_route_id' => $model->bus_route_id ])->one();
                    $busno = $bus_route->bus->license_plate;
                    $ticket_id = $model->ticket_id;
                    $model->save();
                    $code = 1;
                }
                return json_encode(["type" => "t","code"=> $code,"name" =>$customer_name ,"busno" => $busno,"ticket_id" => $ticket_id
                ]);
                //----------------
            }
                //echo $model->ticket_id;
            if($fst == "P" OR $fst == "p"){
                //for pass
                $pass = Pass::find()->where(['pass_id' => $no, 'status' => 1 ])->one();
                if($pass == '') {
                    $code = 0;
                }elseif (date("Y-m-d") > $pass->end_date){
                    $code = 2;
                }elseif ($pass->up_down <= 0){
                    $code = 2;
                }else{
                $pass->up_down = $pass->up_down - 1;
                
                $customer_name = $pass->customer->name;
                $to = $pass->route->to;
                $from = $pass->route->from;
                $rides = $pass->up_down;
                $pass->save();
                $code = 1;
                
                }
                return json_encode(["type" => "p","code"=> $code,"name" =>$customer_name ,"from" => $from,"to" => $to,"rides" => $rides
                ]);
            }
            
            else{
                $code = 0;
                return json_encode(["type" => "none","code"=> $code,"name" =>$customer_name ,"from" => $from,"to" => $to,"rides" => $rides
                ]);
              //  echo "none";
            }
            
            
        }
            

    
    //return $code;
   
    }
    public function actionMarkticketqr()
    {
        $customer_name = '';
        $busno = '';
        $ticket_id = '';
        // $model = new Tickets();
        // $pass = new Pass();
        $from = '';
        $to = '';
        $rides = '';

        

       
        if (Yii::$app->request->isAjax) {
            
            

            $data = Yii::$app->request->post();   
            $code = $data['data']; 
            $code1 = strval($code);
            $fst = substr($code1,0,1);
            $no = substr($code1,1);

            
            //echo $no;
            if($fst == "T" OR $fst == "t"){
                $model = Tickets::find()->where(['ticket_id' => $no,'date' => date("Y-m-d") ])->one();

                if($model == '') {
                    $code = 0;
                }elseif ($model->status == 0) {
                    $code = 2;
                }
                else{
                    $alltickets = Tickets::find()->where(['customer_id' => $model->customer_id,'fare' =>$model->fare,
                    'created_at' => $model->created_at ])->all();
                    foreach ($alltickets as $one){
                        $one->status = 0;
                        $one->save();
                    }    
    
                    $customer_id = $model->customer_id;
                    $cus_name = Customer::find()->where(['customer_id' => $customer_id])->one();
                    $customer_name = $cus_name->name;
                    $bus_route = BusRoute::find()->where(['bus_route_id' => $model->bus_route_id ])->one();
                    $busno = $bus_route->bus->license_plate;
                    $ticket_id = $model->ticket_id;
                    $model->save();
                    $code = 1;
                }
                return json_encode(["type" => "t","code"=> $code,"name" =>$customer_name ,"busno" => $busno,"ticket_id" => $ticket_id
                ]);
                //----------------
            }
                //echo $model->ticket_id;
            if($fst == "P" OR $fst == "p"){
                //for pass
                $pass = Pass::find()->where(['pass_id' => $no, 'status' => 1 ])->one();
                if($pass == '') {
                    $code = 0;
                }elseif (date("Y-m-d") > $pass->end_date){
                    $code = 2;
                }elseif ($pass->up_down <= 0){
                    $code = 2;
                }else{
                $pass->up_down = $pass->up_down - 1;
                
                $customer_name = $pass->customer->name;
                $to = $pass->route->to;
                $from = $pass->route->from;
                $rides = $pass->up_down;
                $pass->save();
                $code = 1;
                
                }
                return json_encode(["type" => "p","code"=> $code,"name" =>$customer_name ,"from" => $from,"to" => $to,"rides" => $rides
                ]);
            }
            
            else{
                $code = 0;
                return json_encode(["type" => "none","code"=> $code,"name" =>$customer_name ,"from" => $from,"to" => $to,"rides" => $rides
                ]);
              //  echo "none";
            }
            
            
        }
            



    }

    /**
     * Creates a new Tickets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tickets();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ticket_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tickets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ticket_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tickets model.
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
     * Finds the Tickets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tickets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tickets::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
