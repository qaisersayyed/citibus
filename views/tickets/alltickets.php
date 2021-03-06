<head>
<style>
body {
    background-image: url(http://localhost/citibus/web/img.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  background-attachment: fixed;
}
</style>
</head>

<?php

use app\models\Tickets;
use yii\helpers\Html;
use app\models\RouteStopTypeSearch;
use app\models\Transaction;

//echo json_encode($data);
//echo $data->fare;
$mod = Tickets::find()->where(['customer_id' => $customer_id])->groupBy(['created_at'])->orderBy(['date' => SORT_DESC])->all();

//echo "<br>";
$seats = array();

//$ctime = new DateTime($time);
if ($mod == null) {
    echo "<center><h1>No Bookings Found</h1></center>";
} else {
    echo "<center><h1>Your Bookings</h1></center><br>";
}

foreach ($mod as $col) {
    // echo $col->ticket_id,"<br>";

    $tickets = Tickets::find()->where(['created_at' => $col->created_at])->all();
    $rst = RouteStopTypeSearch::find()->where(['route_stop_type_id' => $col->route_stop_type_id])->one();
    // $date = Tickets::find()->where(['date' => $col->date ])->one();
    $from = $rst->route->from;

    $to = $rst->stop->stop_name;
    //$time = $tickets->bus_route_id;
    $col->route_stop_type_id;

    $doj = $col->date;

    // echo $doj;
    foreach ($tickets as $cols) {

        $time = $cols->busRoute->timing;
        $busno = $cols->busRoute->bus->license_plate;
        $fare = $cols->fare;
        $tid = $cols->ticket_id;

        array_push($seats, $cols->seat_code);
    }
    $ftime = new DateTime($time);
    // echo $time;
    //echo "each",json_encode($seats),"<br>";
?>
    <html>

    <body style="background-color:white">

        <div>
            <div class="card bg-info text-dark">
                <div class="card-body">
                    <div class="panel panel-custom" style="background-color:#F4B41A;">
                        <div class="panel-heading" style="background-color:#143D59; color:white">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>ID <b><?php echo $cols->ticket_id ?></b></h4>
                                </div>
                                <div class="col-md-3">
                                    <h4>Bus Number: <b><?php echo $busno ?></b></h4>
                                </div>

                                <div class="col-md-4">
                                    <h4>Date <b><?php echo $doj ?></b></h4>
                                </div>

                            </div>

                        </div>
                        <div class="panel-body">

                            <div class=row>
                                <div class="col-md-4">
                                    <p>From</p>
                                    <h3 style="text-transform: capitalize;"><?php echo $from; ?> </h3>
                                </div>
                                <div class="col-sm-4">
                                    <p>To</p>
                                    <h3 style="text-transform: capitalize;"> <?php echo $to; ?> </h3>
                                </div>
                                <div class="col-sm-2">
                                    <p>Timing</p>
                                    <h4><?php echo $ftime->format('h:i A') ?> </h4>
                                </div>
                            </div>
                            <div class=row>
                                <div class="col-md-4">
                                    <p>Seats</p>
                                    <h4 ><b><?php echo implode(",", $seats); ?></b> </h4>
                                </div>
                                <div class="col-sm-4">
                                    <p>Amount</p>
                                    <h4 style="text-transform: capitalize;"> <?php echo $fare; ?> </h4>
                                </div>
                                <div class="col-sm-2">

                                    <?php if($col->status==1 AND $doj >= date("Y-m-d") ){
                                       echo  Html::a(
                                            'View Ticket',
                                            ['tickets/viewticket2', 'tid' => $cols->ticket_id],
                                            ['class' => 'btn btn-custom', 'style' => 'background-color:#143D59; color:white']
                                        );
                                    }else{
                                        ?>
                                        <img src="/citibus/web/ex.png" alt="" height=50px>
                                    <?php }
                                    
                                     ?>
                                </div>

                                <div class="col-sm-2">

                                    <?php if($col->status==1  AND $doj >= date("Y-m-d")){
                                        echo   Html::a(
                                                'Track Bus',
                                                ['location/gps',],
                                                ['class' => 'btn btn-custom', 'style' => 'background-color:#143D59; color:white']
                                            );
                                    }
                                     ?>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>



<?php
    echo "<br>";
    $seats = array();
}
?>