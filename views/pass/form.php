<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use app\models\Pass;
use app\models\Route;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StopsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Search Bar';
$model = new Pass();
// $this->params['breadcrumbs'][] = $this->title;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">   
   
    <script>
        function myFunction() {
            
            document.getElementById("button").click();
            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            })
            
            
        }
        function changeDate() {
            var date = document.getElementById('start_date').value;
            console.log(date);
            var dt = new Date(date);
            var n = dt.getMonth()+1;
            var d = dt.setMonth(n);
            var formatted_date = dt.getFullYear()+ "-" + (dt.getMonth() + 1)+ "-" + dt.getDate() ;
            document.getElementById('end_date').value = formatted_date;
            // document.getElementById('end_date').disabled = true;
         }

</script>
  </head>
<style>
        body {
            background-image: url("http://localhost/citibus/web/img.jpg");
            background-size: cover;
            background-position: center;

        }
</style>



<body onload="myFunction()">
<div class="site-login">
        <div class="container">
            <button type="button" style="visibility: hidden;" data-backdrop="static" data-keyboard="false" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="button">
                Pass
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog " style="margin-top:10%; ">
                    <div class="modal-content" style="background-color: #F4B41A;">
                        <!-- Modal Header -->
                        <div class="modal-header" style="background-color: #143D59;">
                            <center>
                                <h4 class="modal-title " style="color:aliceblue;">Create Pass <a href='http://localhost/citibus/web/route-stop-type/form'> <button type="button" class="close">&times;</button></a></h4>
                            </center>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body" style="margin-left:15%;margin-right:15%;background-color: #F4B41A;">

                            <?php $form = ActiveForm::begin(); ?>

                                <?//= $form->field($model, 'customer_id')->textInput() ?>
                                <?php
                                    $models1 = Route::find()->all();
                                    $data = array();
                                    foreach ($models1 as $model1)
                                        $data[$model1->route_id] = $model1->from . ' -> '. $model1->to;

                                        echo $form->field($model, 'route_id')->dropDownList(
                                                                $data,
                                                                ['prompt'=>'Select']);
                                ?>
                                <?//= $form->field($model, 'route_id')->textInput() ?>
                                <!-- <div class="form-group" style="width:260px">  -->
                           
                            <?php echo $form->field($model, 'start_date')->widget(
                                    DatePicker::class, 
                                    [
                                        'value' => date('d-M-Y'),
                                        'options' => ['id'=>'start_date','placeholder' => 'Select issue time ...','onchange'=>'changeDate()'],
                                            'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'startDate' => date("yyyy-MM-dd H:i:s"),
                                            'todayHighlight' => true
                                        ]
                                    ]
                                    );
                                  ?>
                                                               
                                <?= $form->field($model, 'end_date')->widget(
                                    DatePicker::class, 
                                    [
                                        'value' => date('d-M-Y'),
                                        'options' => ['id'=>'end_date','placeholder' => 'Select issue time ...'],
                                            'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'startDate' => date("yyyy-MM-dd H:i:s"),
                                            'todayHighlight' => true,
                                           
                                        ]
                                    ]
                                    );
                                  ?>

                                <?= $form->field($model, 'up_down')->textInput(['readonly' => true, 'value' => '60']) ?>

                                <?//= $form->field($model, 'down')->textInput() ?>

                                <div class="form-group">
                                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                </div>
                            <?php ActiveForm::end(); ?>

                        </div>
                    </div>
                </div>

            </div>
                    
        </div>
 </div>
    
 