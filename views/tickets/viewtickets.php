<?php use yii\helpers\Html;
use app\models\TransactionSearch;

?> 
<script  type="text/javascript">
       history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
  
}

</script>

<?php 

Yii::$app->session->setFlash('success', "You have successfully Booked Ticket ");

// $date =  Yii::$app->formatter->asDate($date, 'dd-mm-yyyy');

$format_date =  Yii::$app->formatter->asDate($date, 'long');
// echo $format_date;
echo $time;
$dateObject = new DateTime($time);

?>
<html lang="en">
 <head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container"  >

    <div class="responsive" style="height:300px;width:100%;border-radius: 20px;">
            
        <div class="card text-left" style="background-color:#143D59;height:70px;border-radius: 20px 20px 0px 0px;color:white">
            <img alt="CitiBus" src="http://localhost/citibus/web/logos/bus-logo.png" style=" display:inline-block;height:62px; width:auto; padding-top:0; padding-bottom:9px; padding-left:30px">
            <h2 style="display:inline-block;margin-left:20px">Bus Ticket</h2>
        </div>
        <div class="card-body"  style="border:1px solid black;background-color:#F4B41A; padding-top:15px; padding-bottom:auto; padding-left:10px; padding-right:auto">
             <div class="row" >
                <div class="col-sm-3" style="float: left;margin-left:50px;display:inline-block">
                    <h4 >Passenger Name: <br><h3><b><?php echo $name?></h3></h4><br>
                    <h4>From:<br> <h3><b><?php echo $from?></h3></h4><br>
                    <h4 >Date: <br><h3><b><?php echo $format_date?></h3></h4>
                </div>
                <div class="col-sm-3" style="display:inline-block">
                    <h4>Bus Number: <br><h3><b><?php echo $bus_no?></h3></h4><br>
                     <h4>To:<br> <h3><b><?php echo $to?></h3></h4><br>
                    <h4>Time: <br> <h3><b><?php echo $dateObject->format('h:i A')?></h3></h4><br>
                    
                </div>
                <div class="col-sm-3" style="display:inline-block;">
                    <h4 >Seat: <br><h3><b><?php echo json_encode($seat)?></h3></h4><br>
                    <h4>Amount: <br> <h3><b><?php echo $amount?></h3></h4><br>
                   
                </div>
                <div class="col-sm-2" style="display:inline-block;margin-top:7%;vertical-align:top;border-left: .22em dashed #fff;">
                   <img src="http://localhost/citibus/web/uploads/qr.png" alt="" height="150" width="auto">
                    <?// echo Html::img('@web/uploads/qr.png', ['width'=>'150px']);?>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted" style="background-color:#143D59;height:30px;border-radius: 0px 0px 20px 20px;color:white">
           
         
        </div>
     
        
    </div> 
    

    </div class="responsive">
            <button type="button" style="background-color:#143D59;margin-top:50px;float:right" class="btn btn-primary">Print</button>
    </div>
</div>

 </body>
</html>