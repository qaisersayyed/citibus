<?php use yii\helpers\Html;
use app\models\TransactionSearch;
require_once 'phpqrcode/qrlib.php';
$path = 'images/';
$file = $path.uniqid().".png";
$text = $model->pass_id;
QRcode::png($text,$file);
?> 
<script  type="text/javascript">
       history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
  


</script>

<?php 

Yii::$app->session->setFlash('success', "You have successfully Created Pass ");

// $date =  Yii::$app->formatter->asDate($date, 'dd-mm-yyyy');

// $format_date =  Yii::$app->formatter->asDate($date, 'long');
// // echo $format_date;
// // echo $time;
// $dateObject = new DateTime($time);

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
    <center><div class="responsive" id="ticket" style="height:250px;width:65%;border-radius: 20px;">
            
        <div class="card text-left" style="background-color:#143D59;height:60px;border-radius: 20px 20px 0px 0px;color:white">
            <img alt="CitiBus" src="http://localhost/citibus/web/logos/bus-logo.png" style=" display:inline-block;height:62px; width:auto; padding-top:0; padding-bottom:9px; padding-left:30px">
            <h2 style="display:inline-block;margin-left:20px">Bus Pass</h2>
        </div>
        <div class="card-body"  style="border:1px solid black;background-color:#F4B41A; padding-top:15px; padding-bottom:auto; padding-left:10px; padding-right:auto">
             <div class="row" >
                <div class="col-sm-3" style="float: left;margin-left:50px;display:inline-block">
                    <h4 >Passenger Name: <br><h3><b><?php echo "Manisha"?></h3></h4><br>
                    <h4>From:<br> <h3><b><?php echo "Margoa"?></h3></h4><br>
                    <h4 >Issued date: <br><h3><b><?php echo "1-1-2020"  ?></h3></h4>
                </div>
                <div class="col-sm-3" style="display:inline-block">
                    <h4>Total Ride: <br><h3><b><?php echo "60"?></h3></h4><br>
                     <h4>To:<br> <h3><b><?php echo "Panjim"?></h3></h4><br>
                     <h4 >Expiry date: <br><h3><b><?php echo " 1-2-2020" ?></h3></h4>
                    
                </div>
                <div class="col-sm-3" style="display:inline-block;">
                    
                    <h4>Amount: <br> <h3><b><?php echo "600" ?></h3></h4><br>
                   
                </div>
                <div class="col-sm-2" style="display:inline-block;margin-top:7%;vertical-align:top;border-left: .22em dashed #fff;">
                   <img src=<?php echo Yii::$app->request->baseUrl. "/$file"?> alt="" height="150" width="auto" data-toggle="modal" data-target="#myModal">
                    <?// echo Html::img('@web/uploads/qr.png', ['width'=>'150px']);?>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted" style="background-color:#143D59;height:30px;border-radius: 0px 0px 20px 20px;color:white">
           
         
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