<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_no')->textInput() ?>

    <?= $form->field($model, 'license_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aadhar_card_no')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <h3>Login Details:</h3>

    <label for="">Email</label>
    <?= Html::input('text','email','', $options=['class'=>'form-control']) ?>
    <br>
    <label for="">Password</label>
    <?= Html::input('text','password','', $options=['class'=>'form-control',]) ?>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
