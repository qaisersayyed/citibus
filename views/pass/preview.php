<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;
//echo $route_id," ",$fare," ",$up_down," ",$customer_id," ",$start_date," ",$end_date;
//echo $fare;
use app\models\Route;

$routes = Route::find()->where(['route_id'=> $route_id ])->one();

?>
<div class="form">
<?php $form = ActiveForm::begin([
          'method' => 'post',
         'action' => Url::to(['pass/paymentaction'])
    ]); ?>

<div class="form-group">	
			<input class="form-control" style="display:none" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
			name="ORDER_ID" autocomplete="off"
			value="<?php echo  "ORDS" . rand(10000, 9999999999)?>">  
		<div>
		<div class="form-group">		
			<input class="form-control" style="display:none"  id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $customer_id; ?>"></td>
						
		</div>
		<div class="form-group">
			
			<input class="form-control" style="display:none" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
		</div>
		<div class="form-group">
			
			<input class="form-control" style="display:none"  id="CHANNEL_ID" tabindex="4" maxlength="12"
			size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
		</div>
		<div class="form-group">
			
			<input class="form-control" style="display:none" title="TXN_AMOUNT" tabindex="10"
					type="text" name="TXN_AMOUNT"
					value=<?php echo $fare ?> >
		</div>	
		
		<!-- Extra data -->
		<div class="form-group">
			
			<input class="form-control" style="display:none" type="text" name="route_id"
					value=<?php echo $route_id ?> >
		</div>
        <div class="form-group">
			
			<input class="form-control" style="display:none" type="text" name="start_date"
					value=<?php echo $start_date ?> >
		</div>
        <div class="form-group">
			
			<input class="form-control" style="display:none" type="text" name="end_date"
					value=<?php echo $end_date ?> >
		</div>
        

        
        	

		<div class="form-group">
		<input class="btn btn-success" style="display:none" type="submit" id="paysubmitbtn" value="submit">
		</div>
		
</div>
<?php ActiveForm::end(); ?>
<style>

</style>
<script>
function handelclick(){

console.log("clicked");
document.getElementById("paysubmitbtn").click();

}
</script>

<div class="panel panel-primary">
      <div class="panel-heading" style="background-color:#143D59; color:white">
        <div class="row" >
            <h2 class="col-md-8">Confirm Pass Details</h2>
            <h3 class="col-md-4">Customer Name: <?php echo $customer_name ?></h3>
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
            <h4>Total Rides: </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
            <h2><?php echo $routes->from ?></h2>
            </div>
            <div class="col-md-5">
            <h2><?php echo $routes->to ?></h2>
            </div>
            <div class="col-md-2">
            <h2>60 </h2>
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
            <h4>Fare:</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
            <h2><?php echo $start_date ?></h2>
            </div>
            <div class="col-md-5">
            <h2><?php echo $end_date ?></h2>
            </div>
            <div class="col-md-2">
            <h2><?php echo $fare?></h2>
            </div>
        </div>
<br>
        <div class="row">
            <div class="col-md-10">
            
				<a type="button" href="javascript:history.back()" class="btn btn-default"  style="background-color:#143D59; color:white" >Go Back</a>


				
           </div>

            <div class="col-md-2">
            <input class="btn btn-secondary" onClick="handelclick()" style="background-color:#F4B41A; color:black"  type="submit" id="paysubmitbtn" value="submit">

            </div>
        </div>
      </div>
</div>