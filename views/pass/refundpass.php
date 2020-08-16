


<?php
use yii\helpers\Html;
    
?>
<script>

function handelclick(){
    console.log("tetet");
    msg.style.display = "block";
    
history.back()


}
function myFunction(){
var msg = document.getElementById('msg') ;
msg.style.display = "none";

}


</script>
<body onload="myFunction()">
    

<div id="msg" class="alert alert-success">
  <strong>Success!</strong> Indicates a successful or positive action.
</div>
<br>
<div class="panel panel-primary">
      <div class="panel-heading" style="background-color:#143D59; color:white">
        <div class="row" >
            <h2 class="col-md-8">Confirm Refund Details</h2>
            
        </div>
      </div>
      <div class="panel-body" >
        <div class="row">
            <div class="col-md-5">
            <h4>From</h4>
            </div>
            <div class="col-md-5">
            <h4>To:</h4>
            </div>
            <div class="col-md-2">
            <h4>Total Left: </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
            <h2><?php echo $model->route->from ?></h2>
            </div>
            <div class="col-md-5">
            <h2><?php echo $model->route->to ?></h2>
            </div>
            <div class="col-md-2">
            <h2><?php echo $model->up_down ?> </h2>
            </div>
        </div>
<br>

        <div class="row">
            <div class="col-md-5">
            <h4>Start Date:</h4>
            </div>
            <div class="col-md-5">
            <h4>End Date:</h4>
            </div>
            <div class="col-md-2">
            <h4>Refund Amount :</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
            <h2><?php echo $model->start_date ?></h2>
            </div>
            <div class="col-md-5">
            <h2><?php echo $model->end_date ?></h2>
            </div>
            <div class="col-md-2">
            <h2><?php echo round(($model->fare/60)*$model->up_down)?></h2>
            </div>
        </div>
<br>
        <div class="row">
            <div class="col-md-10">
            
				<a type="button" href="javascript:history.back()" class="btn btn-default"  style="background-color:#143D59; color:white" >Go Back</a>


				
           </div>

            <div class="col-md-2">
            <?= Html::a(
                    'Refund',
                    ['pass/refunddone','pass_id' => $model->pass_id],
                    ['class' => 'btn btn-custom btn-sm', 'style' => 'background-color:#F4B41A; color:black']
                ); ?>
            </div>
        </div>
      </div>
</div>
</body>