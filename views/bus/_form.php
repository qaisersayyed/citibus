<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bus-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'license_plate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_of_seats')->textInput() ?>

    <?= $form->field($model, 'pattern')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
