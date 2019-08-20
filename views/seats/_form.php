<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Seats */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seats-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'seat_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seat_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
