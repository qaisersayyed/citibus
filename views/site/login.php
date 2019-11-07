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
    <title>Document</title>
    <script>
        function myFunction() {
 
  document.getElementById("button").click();
}
    </script>
   
</head>
<body onload="myFunction()" style="background: url('') no-repeat center center;" >
<div class="site-login">
   

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'options'=>[
            
        ],
        'fieldConfig' => [
            
        ],
    ]); ?>



    <div class="container">

        <button type="button" style="visibility: hidden;;" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="button">
            Login
        </button>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog " style="margin-top:15%">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header" style="background-color:lightblue;" >
                        <center><h4 class="modal-title ">Login  <button type="button" class="close" data-dismiss="modal">&times;</button></h4></center>
                        
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">


                        <?= $form->field($model, 'email_id')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>


                        <div class="form-group">
                            <div >
                                <center><?= Html::submitButton('Login', ['class' => 'btn btn-info', 'name' => 'login-button']) ?></center>
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
