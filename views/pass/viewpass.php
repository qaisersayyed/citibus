
<?php use yii\helpers\Html;
use app\models\TransactionSearch;
use app\models\Customer;
use app\models\Route;
require_once 'phpqrcode/qrlib.php';
$path = 'images/';
$file = $path.uniqid().".png";
$p = 'P';
$text = $p.$pass->pass_id;
QRcode::png($text,$file);
?> 
<script  type="text/javascript">
       history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
  
</script>
<br>
<?php 
Yii::$app->session->setFlash('success', "You have successfully Created Pass ");

$customer = Customer::find()->where(['customer_id'=>$pass->customer_id])->one();
$name =  $customer->name;

$route = Route::find()->where(['route_id'=>$pass->route_id])->one();
$from = $route->from;
$to  =$route->to;

$start_date = $pass->start_date;
$end_date = $pass->end_date;
$sd =  Yii::$app->formatter->asDate($start_date, 'long');
$ed =  Yii::$app->formatter->asDate($end_date, 'long');

?>
<html lang="en">
 <head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
</head>
<body>
<div class="container"  >
<div id="editor"></div>
    <center><div class="responsive" id="ticket" style="height:250px;width:60%;border-radius: 20px;">
            
        <div class="card-header" style="background-color:#143D59;height:60px;border-radius: 20px 20px 0px 0px;color:white">
            
            <h2 style="display:inline-block;margin-right:50%">CitiBus Pass</h2>
            <img alt="CitiBus" src="http://localhost/citibus/web/logos/bus-logo.png" style=" display:inline-block;height:62px; width:auto; padding-top:0; padding-bottom:9px; ">
        </div>
        <div class="card-body"  style="background-image:url('http://localhost/citibus/web/logos/grey.jpeg');background-size: 400px 400px;background-position: center;background-repeat: no-repeat; border:1px solid black; padding-top:15px; padding-bottom:auto; padding-left:10px; padding-right:auto">
             <div class="row" >
                <div class="col-sm-3" style="float: left;margin-left:40px;display:inline-block">
                    <h4 >Passenger Name: <br><h3><b><?php echo $name?></h3></h4><br><br>
                    <h4>From:<br> <h3><b><?php echo $from?></h3></h4><br>
                    <h4>Total Ride: <br><h3><b><?php echo $pass->up_down;?></h3></h4><br>
                </div>
                <div class="col-sm-3" style="display:inline-block">
                    <h4 >Issued date: <br><h3><b><?php echo $sd;  ?></h3></h4><br>
                    <h4>To:<br> <h3><b><?php echo $to?></h3></h4><br>
                    <h4>Amount: <br> <h3><b><?php echo $pass->fare; ?></h3></h4><br>     
                </div>
                <div class="col-sm-3" style="display:inline-block;">
                    <h4 >Expiry date: <br><h3><b><?php echo $ed ?></h3></h4><br>
                    
                    <img style="display:inline-block;margin-top:7%;vertical-align:top;border-left: .22em dashed ;" src=<?php echo Yii::$app->request->baseUrl. "/$file"?> alt="" height="150" width="auto" data-toggle="modal" data-target="#myModal">
                </div>
                <div class="col-sm-2" >
                   
                    <?// echo Html::img('@web/uploads/qr.png', ['width'=>'150px']);?>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted" style="background-color:#143D59;height:20px;border-radius: 0px 0px 20px 20px;color:white">
           
         
        </div>
     
        
    </div> 
    
    <center>
    </div class="responsive">
        <!-- <a class="btn btn-default" href='<? //= $model->file1 ?>' Download>Download File 1</a> -->
            
            <button type="button" onclick="printDiv('ticket');"  id="download" style="background-color:#143D59;margin-top:50px;float:right" class="btn btn-primary">Print</button>
    </div>


    <!-- Model to view qr  -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
        <center><img src=<?php echo Yii::$app->request->baseUrl. "/$file"?> alt="" height="300" width="300"></center>
        </div>
    </div>
  </div>
</div>
</div>

 </body>
</html>
<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;     
}
</script>