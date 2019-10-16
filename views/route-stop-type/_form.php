<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RouteStopType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="route-stop-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'route_id')->textInput() ?>

    <?= $form->field($model, 'stop_id')->textInput() ?>

    <?= $form->field($model, 'bus_type_id')->textInput() ?>

    <?= $form->field($model, 'fare')->textInput() ?>

    <?= $form->field($model, 'stop_order')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
