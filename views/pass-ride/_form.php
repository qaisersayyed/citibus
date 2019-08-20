<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PassRide */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pass-ride-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pass_id')->textInput() ?>

    <?= $form->field($model, 'bus_route_id')->textInput() ?>

    <?= $form->field($model, 'ride_time')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
