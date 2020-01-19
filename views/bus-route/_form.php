<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\TimePicker;
use yii\helpers\ArrayHelper;
use app\models\Bus;
use app\models\Route;
/* @var $this yii\web\View */
/* @var $model app\models\BusRoute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bus-route-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bus_id')->dropDownList(
        ArrayHelper::map(Bus::find()->where(['status' => 1])->all(),'bus_id','license_plate'),
        ['prompt'=>'Select ']) ?>

    <div id="dynamicInput">
            <?php
            $models1 = Route::find()->all();
            $data = array();
            foreach ($models1 as $model1)
                $data[$model1->route_id] = $model1->from . ' -> '. $model1->to;

            echo $form->field($model, 'route_id')->dropDownList(
                                        $data,
                                        ['prompt'=>'Select','name' => 'BusRoute[route_id][]']);
        ?>
        <?//=  $form->field($model, 'route_id')->dropDownList(
        // ArrayHelper::map(Route::find()->where(['deleted_at' => null])->all(),'route_id','from','to'),
        // ['prompt'=>'select ']) ?>
    </div>
        <input class="btn btn-custom" style ="background-color:#F4B41A;float:right" type="button" id="add" name="add" value="Add Route"> 

    <?= $form->field($model, 'timing')->textInput(['placeholder' => "H:M "])->widget(TimePicker::classname(), []) ?>

    

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