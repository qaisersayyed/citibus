<br>
<style>
body {
    background-image: url(http://localhost/citibus/web/img.jpg);
    background-size: cover;
    background-position: center;
    
    background-repeat: no-repeat;
  background-attachment: fixed;
}
</style>
<?php


//echo $passes->pass_id;
use yii\helpers\Html;


if ($passes == ""){
    echo "<center><h2>No Passes Found</h2></center>";
}else{
    echo "<center><h2>Your Passes</h2></center>";
    

    foreach ($passes as $pass) {
   // $pass->end_date = 2020-02-5;
        ?>
        
        <br>
        <div class="panel panel-primary">
              <div class="panel-heading" style="background-color:#143D59; color:white">
                <div class="row" >
                    <h3 class="col-md-4">Pass Details</h3>
                    <h3 class="col-md-4">Customer Name: <?php echo $pass->customer->name ?></h3>
                    
                    <?php
                    if (date("Y-m-d") < $pass->end_date){
                        ?>
                    <h3 class="col-md-3">Status: <button style="background-color:green; color:white" type="button" class="btn btn-outline-success">Active</button></h3>

                        <?php

                    }else{
                        ?>
                     <h3 class="col-md-2">Status: <button style="background-color:red; color:white" type="button" class="btn btn-outline-danger">Expired</button></h3>
                     <div style="padding-top:22px;" class="col-md-1">
                     <?= Html::a(
                    'Renew Pass',
                    ['pass/create'],
                    ['class' => 'btn btn-custom btn-sm', 'style' => 'background-color:#F4B41A; color:black']
                ); ?>
                     </div>
                        <?php
                    }
                    ?>
                    
                    
                </div>
              </div>
              <div class="panel-body" style="background-color:#F4B41A; color:black">
                <div class="row">
                    <div class="col-md-5">
                    <h5>From:</h5>
                    </div>
                    <div class="col-md-5">
                    <h5>To:</h5>
                    </div>
                    <div class="col-md-2">
                    <h5>Total Rides: </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                    <h3><?php echo $pass->route->from ?></h3>
                    </div>
                    <div class="col-md-5">
                    <h3><?php echo $pass->route->to ?></h3>
                    </div>
                    <div class="col-md-2">
                    <h3>60 </h3>
                    </div>
                </div>
        
        
                <div class="row">
                    <div class="col-md-5">
                    <h5>Start Date:</h5>
                    </div>
                    <div class="col-md-5">
                    <h5>End Date:</h5>
                    </div>
                    <div class="col-md-2">
                    <h5>Fare:</h5>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-md-5">
                    <h3><?php echo $pass->start_date ?></h3>
                    </div>
                    <div class="col-md-5">
                    <h3><?php echo $pass->end_date ?></h3>
                    </div>
                    <div class="col-md-2">
                    <h3><?php echo $pass->fare?></h3>
                    </div>
                    <div class="col-md-12">
                    <?= Html::a(
                    'View Pass',
                    ['pass/viewpass','id'=>$pass->pass_id],
                    ['class' => 'btn btn-custom', 'style' => 'background-color:#143D59; color:white']
                ); ?>
                    </div>
                </div>
              </div>
        </div>
        
        <?php
        }
        
        ?>
        
        
        <?php
        }
        
        ?>
        
