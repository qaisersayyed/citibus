<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RouteStopTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="route-stop-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'route_stop_type_id') ?>

    <?= $form->field($model, 'route_id') ?>

    <?= $form->field($model, 'stop_id') ?>

    <?= $form->field($model, 'bus_type_id') ?>

    <?= $form->field($model, 'fare') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
