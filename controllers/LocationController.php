<?php

namespace app\controllers;

use app\models\BusEmployee;
use app\models\Employee;
use app\models\Bus;
use Yii;
use app\models\Location;
use app\models\LocationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LocationController implements the CRUD actions for Location model.
 */
class LocationController extends Controller
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
     * Lists all Location models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LocationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Location model.
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



    public function actionGps()
    {

        $model = new Location();

        if (Yii::$app->request->isAjax) {
            
            $data = Yii::$app->request->post();   
            $lat =  $data['lat'];
            $lng =  $data['lng'];  
            
            $user_id = Yii::$app->user->id;
            $employee_id = Employee::find()->where(['user_id'=>$user_id])->one();
            $bus_employee_id = BusEmployee::find()->where(['employee_id'=>$employee_id->employee_id])->one();
            $model->lat = $lat;
            $model->lon = $lng;
            $model->bus_employee_id = $bus_employee_id->bus_employee_id;


            $model->save();


            
        //  $code = 1;
            return $bus_employee_id->bus_employee_id;

            
        }
        return $this->render('gps', [
          

        ]);
    }

    /**
     * Creates a new Location model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionTrack()
    {
        return $this->render('track', [
            
        ]);
    }
    public function actionGetlatlog(){
        if (Yii::$app->request->isAjax) {
            
            $data = Yii::$app->request->post();   
            $data =  $data['data']; 
            $bus = Bus::find()->where(['license_plate'=>$data])->one();
            
            $busemp = BusEmployee::find()->where(['bus_id' =>$bus->bus_id])->one();

            $location = Location::find()->where(['bus_employee_id'=>$busemp->bus_employee_id])
            ->orderBy(['created_at' => SORT_DESC])
           ->one();
            if ($location == ''){
                return json_encode(['code' => 0 ]); 
            }else{
                return json_encode(['lat' => $location->lat,'lon' =>$location->lon,'code' =>1 ]);
            }

            
        }
        
    }

    public function actionCreate()
    {
        $model = new Location();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->location_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Location model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->location_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Location model.
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
     * Finds the Location model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Location the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Location::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
