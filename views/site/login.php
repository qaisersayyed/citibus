<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
 
$this->title = 'Login';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="/js/jquery-1.12.4.min.js">\x3C/script>')
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Document</title>
    <script>
        function myFunction() {
            console.log('')

            document.getElementById("button").click();
            $('#myModal').modal({backdrop: 'static', keyboard: false})


        }
    </script>

</head>

<body onload="myFunction()">
    <div class="site-login">


        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'options' => [],
            'fieldConfig' => [],
        ]); ?>



        <div class="container">

            <button type="button" style="visibility: hidden;" data-backdrop="static" data-keyboard="false" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="button">
                Login
            </button>

            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog " style="margin-top:15%">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header" style="background-color: #143D59;">
                            <center>
                                <h4 class="modal-title " style="color:aliceblue;">Login <button type="button"  class="close" data-dismiss="modal">&times;</button></h4>
                            </center>

                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">


                            <?= $form->field($model, 'email_id')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'password')->passwordInput() ?>


                            <div class="form-group">
                                <div>
                                    <center><?= Html::submitButton('Login', ['class' => 'btn btn-info', 'style' => "background-color: #143D59;", 'name' => 'login-button']) ?></center>
                                </div>
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