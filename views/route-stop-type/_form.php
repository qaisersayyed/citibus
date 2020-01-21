<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Route;
use app\models\Stops;
use app\models\BusType;
/* @var $this yii\web\View */
/* @var $model app\models\RouteStopType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="route-stop-type-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <div id="dynamicInput">
        <div class=row style="display:inline-block;margin:10px">	
            <?= $form->field($model, 'stop_id')->dropDownList(
                ArrayHelper::map(Stops::find()->where(['deleted_at' => null])->all(),'stop_id','stop_name'),
                ['prompt'=>'Select ','name' => 'RouteStopType[stop_id][]']) ?>
        </div>
        <div class=row style="display:inline-block;margin:10px">	
            <?= $form->field($model, 'fare[]')->textInput() ?>
        </div>
        <div class=row style="display:inline-block;margin:10px">	
            <?= $form->field($model, 'stop_order[]')->textInput() ?>
        </div>
    </div>
    <input class="btn btn-custom" style ="background-color:#F4B41A;float:right" type="button" id="add" name="add" value="Add Stops"> 


    <?= $form->field($model, 'bus_type_id')->dropDownList(
        ArrayHelper::map(BusType::find()->where(['deleted_at' => null])->all(),'bus_type_id','type'),
        ['prompt'=>'Select ']) ?>

    
   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>

$('#add').on('click', function() { 
  var newel = $('#dynamicInput:last').clone();
  $(newel).insertAfter("#dynamicInput:last");
  
})

</script>