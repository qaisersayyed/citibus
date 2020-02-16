<?php

use app\models\Bus;
use app\models\Route;

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
        background-image: url("http://localhost/citibus/web/img.jpg");
        background-size: cover;
        background-position: center;

    }
</style>
<br>
<div class="container">
    <div class="card bg-success text-white" style="margin-top:100px;margin-left:150px;margin-right:150px; background-color:#143D59; color:white;">
        <div class="card-body">

            <div id="form" class="form" style="padding:50px">
                <?php $form = ActiveForm::begin([
                    'method' => 'get',
                    // 'action' => Url::to(['route-stop-type/form'])
                ]); ?>

                <?php
                $models1 = Route::find()->all();
                $data = array();
                foreach ($models1 as $model1)
                    $data[$model1->route_id] = $model1->from . ' - ' . $model1->to;

                echo $form->field($model1, 'route_id')->dropDownList(
                    $data,
                    ['prompt' => 'Select']
                );
                ?>

                <div class="form-group" id="from">
                <?php
                // echo json_encode($data);
                
                ?>
                    <?= $form->field($model, 'bus_id', ['inputOptions' => ['name' => 'bus_id', 'id' => 'busid']])->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Bus::find()->all(), 'bus_id', 'license_plate'),
                        'options' => ['prompt' => 'BUS'],
                        'name' => 'from',
                        'pluginOptions' => [
                            'allowClear' => true
                        ],


                    ])->label('Bus') ?>
                </div>





                <div class="form-group" id="button">
                    <?= Html::submitButton('Start Ride', ['class' => 'btn btn-custom', 'style' => 'background-color:#F4B41A']) ?>
                </div>
            </div>


            <?php ActiveForm::end(); ?>
            <div>
            </div>
        </div>

    </div>