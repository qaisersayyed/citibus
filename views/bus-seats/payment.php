<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;

?>


<head>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

<script>
function onload() { 
document.getElementById("modelbutton").click();
console.log("onload");
}
function handelclick(){

	console.log("clicked");
//	document.getElementById("paysubmitbtn").click();
	
}


</script>
<style>
/* body{
	background-color:grey;
} */
</style>
</head>
Welcome <?php echo $name; ?><br>
Amount is: <?php echo $amount; ?>
route id: <?php echo $route_id,"<br>";

echo "rst id ", $rst_id,"<br>";

echo "bus_route",$bus_route_id;

echo "sets",$seats;

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
			value="<?php echo  "ORDS" . rand(10000,99999999)?>">  
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
      <div class="modal-header">
        <h4 class="modal-title">Confirm Details</h4>
      </div>
      <div class="modal-body">
        <h4>Customer name :</h4><p><?php echo $name; ?></p>
		<h4>Total amount :</h4><p><?php echo $amount; ?></p>
		<h4>Seat :</h4><p><?php echo $seats; ?></p>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" onClick="handelclick()" data-dismiss="modal">Complete Payment</button>
      </div>
    </div>

  </div>
</div>

</div>
</body>