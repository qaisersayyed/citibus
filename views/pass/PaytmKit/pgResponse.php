<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<?php


header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("lib/config_paytm.php");
require_once("lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if ($isValidChecksum == "TRUE") {
    echo '<script>console.log("checksum matched")</script>';
    if ($_POST["STATUS"] == "TXN_SUCCESS") {
        echo "<center><b>Transaction status is success</b><br><h1>Please wait</h1></center>";
        
        if (isset($_POST) && count($_POST)>0) {
            // foreach($_POST as $paramName => $paramValue) {
            // 		echo "<br/>" . $paramName . " = " . $paramValue;
            // }
            echo "<br>";
            $orderno = $_POST["ORDERID"];
            $date = $_POST["TXNDATE"];
            $txn_id = $_POST["TXNID"];
            $amount = $_POST["TXNAMOUNT"];
            $stat  = $_POST["STATUS"]; ?>
		<html>
		<head>
		
		</head>
		<body onload="onload()">

		</div>
		<form action="http://localhost/citibus/web/pass/paymentresponse" method="get">
            <input style="display:none" type="text" name="order_no" value=<?php echo $orderno ?> 
			/>
            <input style="display:none" type="number" step="any" name="amount" value=<?php echo $amount ?>
			/>
			<input style="display:none" type="datetime-local" name="date" value=<?php echo $date ?>
			/>
			<input style="display:none" type="text" name="status" value=<?php echo $stat?>
			/>
			<input style="display:none" type="text" name="txnid" value=<?php echo $txn_id ?>
			/>

			<input style="display:none" type="submit" name="submit" id="sub"/>
        </form>
		</div>
		</body>
		<script>
function onload() { 
document.getElementById("sub").click();
console.log("onload");
}
</script>
		</html> 
		
		
		
		<?php
        }
    

        //Process your transaction here as success transaction.
        //Verify amount & order id received from Payment gateway with your application's order id and amount.
    } else {
        ?>
	<center>
	<div>
	<h2>Transaction status is failure</h2>
	<a href='http://localhost/citibus/web/pass/create' class='btn btn-primary'>Back Home</a>
	</div>
	</center>
	<?php
    }
} else {
    echo "<b> Checksum mismatched.</b>";
    //Process transaction as suspicious.
}

?>
