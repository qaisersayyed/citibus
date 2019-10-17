<?php

namespace app\controllers;

use Yii;
use app\models\BusSeats;
use app\models\Customer;
use app\models\BusSeatsSearch;
use app\models\CustomerSearch;
use app\models\RouteSearch;
use app\models\BusRouteSearch;
use app\models\RouteStopTypeSearch;
use app\models\BusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
    public function actionSeatselect(){
        $model = BusSearch::find()->where(['bus_id'=>1])->one();
        $customer_id = CustomerSearch::find()->where(['customer_id'=>1])->one();
        $route_id = RouteSearch::find()->where(['route_id'=>1])->one();
        $bus_route_id = BusRouteSearch::find()->where(['bus_route_id'=>6])->one();
        $route_stop_type_id = RouteStopTypeSearch::find()->where(['route_stop_type_id'=>1])->one();

         if(Yii::$app->request->get('seat') ){
            $seat = Yii::$app->request->get('seat');
            $fare = Yii::$app->request->get('fare');
            
            $s = array();
            $length =strlen($seat);
            echo json_encode($seat);
            
                function mod($i,$length){
                $m = $i % $length;
                if ($m > $length)
                    mod($m,$length);
                    return $m;
                 }
                for ($a = 0; $a <= $length;$a=$a+3) {
                    $k=mod($a,60); 
                    // echo $k;
                    array_push($s,$seat[$k].$seat[$k+1]);
                    
                    $myArray = str_split($seat);
                    array_splice($myArray, $k+2, 1);
                    
              }
            
                 echo  json_encode($s);
               $customer = $customer_id->customer_id;
               $bus_route = $bus_route_id->bus_route_id;
                $route_stop_type = $route_stop_type_id->route_stop_type_id;
            
             foreach($s as $seats){
                Yii::$app->db->createCommand("INSERT INTO tickets (ticket_id,customer_id,bus_route_id,route_stop_type_id,seat_code,seat_name)
                 VALUES (NULL,'$customer','$bus_route','$route_stop_type','$seats','$seats')"
                
                
            )->execute();
            echo  json_encode($seats);

              }
          

            return $this->render('bus-seat/payment', [          
                // 'seat' => $seat,
                'fare' => $fare,
                // 'model' => $model,
                
            ]);
          }
         else{
            $query = new \yii\db\Query;
            $query->select('seat_name')->from('tickets')->where('bus_route_id' == '$bus_route_id');
            $rows = $query->all();
            $command = $query->createCommand();
            $rows = $command->queryAll();
           return $this->render('seatselect', [          
                'model' => $model,
                'route_id' =>$route_id,
                'bus_route_id' => $bus_route_id,
                'route_stop_type_id' => $route_stop_type_id,
                'rows' =>$rows,
                // 'booked_seats' => $booked_seats
                // 'seat' =>$seat
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
        echo "name ", Yii::$app->request->post('ORDER_ID'),"<br>";
        echo "amt",Yii::$app->request->post('TXN_AMOUNT'),"<br>";
        echo "order",Yii::$app->request->post('ORDER_ID'),"<br>";
        echo "routeid",Yii::$app->request->post('routeid'),"<br>";
        echo "seat",Yii::$app->request->post('seat'),"<br>";
        echo "bs",Yii::$app->request->post('busroute'),"<br>";
       
         //return $this->render('PaytmKit/pgRedirect'            //  'name' => 'qaiser',
        //     //  'amount' => 100
            
        //  );
    }

    public function actionPaymentresponse()
    
    {  
       // echo "payy"; 
        // return $this->redirect('PaytmKit/pgRedirect');
        return $this->render('PaytmKit/pgResponse' 
         );
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
