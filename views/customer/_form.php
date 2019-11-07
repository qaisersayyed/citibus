<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
        function myFunction() {

            document.getElementById("button").click();
        }
    </script>

</head>

<body onload="myFunction()" >
    <div class="site-login">



        <div class="container">

            <button type="button" style="visibility: hidden;;" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="button">
                Login
            </button>

            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog " style="margin-top:10%">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header" style="background-color:lightblue;">
                            <center>
                                <h4 class="modal-title ">Sign Up <button type="button" class="close" data-dismiss="modal">&times;</button></h4>
                            </center>

                        </div>

                        <!-- Modal body -->
                        <div class="modal-body" style="margin-left:15%;margin-right:15%">

                            <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($model, 'user_id')->hiddenInput()->label(false); ?>

                            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'phone_no')->textInput() ?>

                            <?= $form->field($model, 'email_id')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'e_wallet')->textInput() ?>

                            <?= $form->field($model, 'created_at')->hiddenInput()->label(false); ?>

                            <?= $form->field($model, 'updated_at')->hiddenInput()->label(false); ?>

                            <?= $form->field($model, 'deleted_at')->hiddenInput()->label(false); ?>



                            <div class="form-group">
                                <center><?= Html::submitButton('Sign Up', ['class' => 'btn btn-info']) ?></center>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <?php ActiveForm::end(); ?>


    </div>
</body>
</html>