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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Document</title>
    <script>
        function myFunction() {

            document.getElementById("button").click();
            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            })

        }
    </script>

    <style>
        body {
            background-image: url("http://localhost/citibus/web/img.jpg");
            background-size: cover;
            background-position: center;

        }
    </style>

</head>

<body onload="myFunction()">
    <div class="site-login">



        <div class="container">

            <button type="button" style="visibility: hidden;" data-backdrop="static" data-keyboard="false" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="button">
                Login
            </button>

            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog " style="margin-top:10%; ">
                    <div class="modal-content" style="background-color: #F4B41A;">

                        <!-- Modal Header -->
                        <div class="modal-header" style="background-color: #143D59;">
                            <center>
                                <h4 class="modal-title " style="color:aliceblue;">Sign Up <a href='http://localhost/citibus/web/route-stop-type/form'> <button type="button" class="close">&times;</button></a></h4>
                            </center>

                        </div>

                        <!-- Modal body -->
                        <div class="modal-body" style="margin-left:15%;margin-right:15%;background-color: #F4B41A;">

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
                                <center><?= Html::submitButton('Sign Up', ['class' => 'btn btn-info', 'style' => "background-color: #143D59;"]) ?></center>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer" style="background-color: white;">
                            <a href='http://localhost/citibus/web/route-stop-type/form'><button type="button" class="btn btn-secondary">Close</button></a>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <?php ActiveForm::end(); ?>


    </div>
</body>

</html>