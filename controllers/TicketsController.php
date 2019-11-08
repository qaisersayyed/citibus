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

//use app\models\Tickets;

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
        // Yii::$app->session->setFlash('success', "You have successfully Booked Ticket ");
        echo $order_id;
        $query = new \yii\db\Query;
        $query->select(['customer_id','amount','creted_at','seat_code','route_stop_type_id','bus_route_id'])->from('transaction')->where(['order_id' => $order_id])->all();
        $rows = $query->all();
        $command = $query->createCommand();
        $rows = $command->queryAll();
        echo json_encode($rows);
     
        $seat = array();
        function mod($i, $length)
        {
            $m = $i % $length;
            if ($m > $length) {
                mod($m, $length);
            }
            return $m;
        }
       
        for ($a = 0; $a < sizeof($rows);$a=$a+1) {
            $k=mod($a, 50);
            array_push($seat, $rows[$k]["seat_code"]);
            //  echo json_encode($seat);
        }
        $customer = Customer::find()->where(['customer_id'=>$rows[0]])->one();
        $name =  $customer->name;
        $amount = ($rows[0]["amount"]);
        $date = $rows[0]["creted_at"];
        $route_stop_type =  ($rows[0]["route_stop_type_id"]);
        $bus_route_id = ($rows[0]["bus_route_id"]);

        $query = new \yii\db\Query;
        $query->select('*')->from('route_stop_type')->where(['route_stop_type_id'=>$route_stop_type])->one();
        $rows = $query->all();
        $command = $query->createCommand();
        $rows = $command->queryAll();
        //echo json_encode($rows);
        $route_id = ($rows[0]["route_id"]);
        $stop_id = ($rows[0]["stop_id"]);
        
        $query = new \yii\db\Query;
        $query->select('*')->from('route')->where(['route_id'=>$route_id])->one();
        $rows = $query->all();
        $command = $query->createCommand();
        $rows = $command->queryAll();
        $from= ($rows[0]["from"]);
        $to = ($rows[0]["to"]);
        //echo json_encode($rows);
        
        $query = new \yii\db\Query;
        $query->select(['bus_id','timing'])->from('bus_route')->where(['bus_route_id'=>$bus_route_id])->one();
        $rows = $query->all();
        $command = $query->createCommand();
        $rows = $command->queryAll();
        $bus_id = ($rows[0]["bus_id"]);
        $time = ($rows[0]["timing"]);
        
        $query = new \yii\db\Query;
        $query->select('license_plate')->from('bus')->where(['bus_id'=>$bus_id])->one();
        $rows = $query->all();
        $command = $query->createCommand();
        $rows = $command->queryAll();
        $bus_no = ($rows[0]["license_plate"]);
        echo json_encode($bus_no);
        
        return $this->render('viewtickets', [
                'name' => $name,
                'amount' => $amount,
                'date' => $date,
                'from' =>$from,
                'to' =>$to,
                'bus_no' => $bus_no,
                'time' => $time,
                'seat' => $seat
        ]);
    }

    public function actionAlltickets()
    {
        $model = new Tickets();
        
        $user_id = Yii::$app->user->id;
        $cus = Customer::find()->where(['user_id' => $user_id ])->one();

        $tickets = Tickets::find()->where(['customer_id' => $cus ])->all();
        
       
      
        return $this->render(
            'alltickets',
            [
            'user_id' => $user_id,
            'customer_id' => $cus->customer_id,
        //    'data' => $tickets

        ]
        );
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
