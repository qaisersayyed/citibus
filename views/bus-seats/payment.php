<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use app\models\BusRouteSearch;

?>


<head>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
<style>
#paysubmitbtn{
	visibility:hidden;
}
</style>
<script>

function onload() { 
document.getElementById("modelbutton").click();
console.log("onload");
}
function handelclick(){

	console.log("clicked");
	document.getElementById("paysubmitbtn").click();
	
}


</script>
<style>
body{
	background-color:grey;
}
</style>
</head>
<?php

//echo "rst id ", $rst_id,"<br>";

//echo "bus_route",$bus_route_id;

//echo "sets",$seats; -->

?>



<body onload="onload()">
<div class="container">
<div class="form">
<?php $form = ActiveForm::begin([
          'method' => 'post',
         'action' => Url::to(['bus-seats/paymentaction'])
    ]); ?>

<div class="form-group">	
			<input class="form-control" style="display:none" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
			name="ORDER_ID" autocomplete="off"
			value="<?php echo  "ORDS" . rand(10000, 99999999)?>">  
		<div>
		<div class="form-group">		
			<input class="form-control" style="display:none"  id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $name; ?>"></td>
						
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
					value=<?php echo $amount ?> >
		</div>	
		
		<!-- Extra data -->
		<div class="form-group">
			
			<input class="form-control" style="display:none" type="text" name="routeid"
					value=<?php echo $route_id ?> >
		</div>	
		<div class="form-group">
			
			<input class="form-control" style="display:none" type="text" name="rstid"
					value=<?php echo $rst_id ?> >
		</div>	
		<div class="form-group">
			
			<input class="form-control" style="display:none" type="text" name="seat"
					value=<?php echo $seats ?> >
		</div>	
		<div class="form-group">
			
			<input class="form-control" style="display:none" type="text" name="busroute"
					value=<?php echo $bus_route_id ?> >
		</div>	
		
		<div class="form-group">
		<input class="btn btn-success" type="submit" id="paysubmitbtn" value="submit">
		</div>
		
</div>
<?php ActiveForm::end(); ?>
<div>

<!-- Trigger the modal with a button -->
<button type="button" data-backdrop='static' data-keyboard='false' id="modelbutton" style="display:none" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary" style="background-color:#143D59">
        <h4 class="modal-title" style="text-align:center">Confirm Details</h4>
      </div>
      <div class="modal-body" style="background-color:#F4B41A">
		<div class="row" style="text-align: center;">

			<div class="col-md-2">
			<h4>From</h4><h3 style="text-transform: capitalize;"><?php echo $f; ?></h3>
			</div>
			<div class="col-md-7">
			<div style="text-align: center;margin-top:40px;margin-left:10px" >
				<p>------------------------------------------------</p>
			</div>
			</div>
			<div class="col-md-3">
			<h4>To</h4><h3 style="text-transform: capitalize;"><?php echo $t; ?></h3>
			</div>
		</div><br><br>
		<div class="row" style="text-align: center;">
			<div class="col-md-4">
			<h5>Customer name </h5><h4><b style="text-transform: capitalize;"><?php echo $name; ?></b></h4>
			</div>
			<div class="col-md-4">
			<h5>Bus No. </h5><h4><b><?php echo $bus_no; ?></b></h4>
			</div>
			<div class="col-md-4">
			<h5>Seat No. </h5><h4><b><?php echo $seats; ?></b></h4>
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-12" style="margin-right:60px">
			
			<div style="text-align:right;padding-right:30px">
			<p>_____________</p>
			<p>Total <h3><?php echo "₹ ",$amount; ?></h3> </p>
			</div>
				
			</div>
		</div>
		
      </div>
      <div class="modal-footer">
		  <div class="row">
				<div class="col-md-3">
				<a type="button" href="javascript:history.back()" class="btn btn-default"  style="background-color:#143D59; color:white" >Go Back</a>


				</div>
				<div class="col-md-5">

				</div>
				<div class="col-md-2" >
				<button type="button" class="btn btn-primary" style="background-color:#F4B41A; color:white" onClick="handelclick()" data-dismiss="modal">Complete Payment</button>

				</div>
		  </div>     
      </div>
    </div>

  </div>
</div>

</div>
</body>