<?php

use app\models\Bus;
use app\models\Route;
use app\models\BusRoute;

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\DetailView;
use kartik\select2\Select2;
use app\models\Stops;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StopsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Search Bar';
$model = new Bus();
$this->params['breadcrumbs'][] = $this->title;
?>


<head>

</head>
<style>
    #form {
        background-color: #0030776e;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    #f {
        background-color: red;
    }

    body {
        background-image: url("/citibus/web/img.jpg");
        background-size: cover;
        background-position: center;

    }
</style>
<br>
<br>
<br>

        <div class="card-body" style="background-color:#143D59;color:white;">
            <div>
                <br>
            </div>
            <div class='row' >
                <div class="col-md-1">
                   
                </div>
                <div class="col-md-10">
                    <center><h2>Start Ride</h2></center>
                    
                    <?php $form = ActiveForm::begin(); ?>
                        <div class="form-group" style="padding:0 10px 0 10px">
                            <?php
                                $models1 = Route::find()->all();
                                $data = array();
                                foreach ($models1 as $model1){
                                    $data[$model1->route_id] = $model1->from . ' ---- ' . $model1->to;
                                }
                                    echo $form->field($model1, 'route_id')->dropDownList(
                                        $data,
                                        ['prompt' => 'Select']       
                                    )->label('Route');        
                            ?>
                        </div>
                        <div class="form-group" style="padding:0 10px 0 10px">
                            <?php 
                                echo $form->field($model, 'bus_id', ['inputOptions' => ['name' => 'bus_id', 'id' => 'busid','class' => 'form-control']])->widget(Select2::classname(), [
                                    'data' => ArrayHelper::map(Bus::find()->where('')->all(), 'bus_id', 'license_plate'),
                                    'options' => ['prompt' => 'BUS'],
                                    'name' => 'from',
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ])->label('Bus')
                            ?>
                        </div>
                        <div class="form-group" style="padding:0 10px 0 10px">
                            <?= Html::submitButton('Start Ride', ['class' => 'btn btn-success']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                        <div class="col-md-1">
                        </div>
                </div>
                
            </div>  
            <div>
                    <br>
            </div>
        </div>

