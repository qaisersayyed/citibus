<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//echo $model->customer_id;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = $model->name;

\yii\web\YiiAsset::register($this);
?>




<!-- <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update Profile', ['update', 'id' => $model->customer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->customer_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->



<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        .wrap {
            padding-top: 30px;
        }

        .glyphicon {
            margin-bottom: 10px;
            margin-right: 10px;
        }

        small {
            display: block;
            color: #888;
        }

        .well {
            ;
        }
    </style>
</head>

<body>




    <div class="container ">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-3">
                <div class=" ">
                    <div class="row" style="background-color:#F4B41A">
                        <div class="modal-header" style="background-color: #143D59;margin:0px">
                            <center>
                                <h1 style="color:aliceblue;">User Profile</h1>
                            </center>
                        </div>

                        <div class="col-sm-12 col-md-1 col-lg-10 col-md-offset-1 " style="margin-bottom:20px">
                            <center><img src="http://localhost/citibus/web/logos/Avatar.png" alt="citibus" class="img-rounded" height="200px"/></center>
                        </div>

                        <!-- <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                // 'customer_id',
                                // 'user_id',
                                'name',
                                'phone_no',
                                'email_id:email',
                                // 'password',
                                // 'e_wallet',
                                // 'created_at',
                                // 'updated_at',
                                // 'deleted_at',
                            ],
                        ]) ?> -->


                        <table class="table">
                            <thead>
                                <tr>

                                </tr>
                            </thead>
                            <tbody style="background-color:#F4B41A">
                                <tr>
                                    <td><b>Name</b></td>

                                    <td><?php echo $model->name ?></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>

                                    <td><?php echo $model->email_id ?></td>
                                </tr>
                                <tr >
                                    <td><b>Phone No</b></td>

                                    <td><?php echo $model->phone_no ?></td>
                                </tr>
                                <tr>
                                    <td><b>E-Wallet</b></td>

                                    <td> 0</td>
                                </tr>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>