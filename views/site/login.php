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
                                <h4 class="modal-title " style="color:aliceblue;">Login <a href='http://localhost/citibus/web/route-stop-type/form'><button type="button"  class="close">&times;</button></a></h4>
                            </center>
                            </div>
                    <!-- Modal body -->
                

                        <!-- Modal body -->
                        <div class="modal-body" style="background-color:#F4B41A;">


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
                        <a href='http://localhost/citibus/web/route-stop-type/form'><button type="button" class="btn btn-secondary" >Close</button></a>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <?php ActiveForm::end(); ?>


    </div>

</body>

</html>