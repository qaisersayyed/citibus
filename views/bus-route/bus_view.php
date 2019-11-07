<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\BusRoute;
use app\models\Route;
use app\models\RouteStopType;
use app\models\RouteStopTypeSearch;
use yii\bootstrap\Button;
use yii\helpers\Url;
use app\models\Stops;
use app\models\Tickets;
use app\models\Bus;

$this->title = 'All Buses';
/* @var $this yii\web\View */
/* @var $model app\models\BusRoute */
// echo "route id",$routeid ,"<br>";
// echo "rst id",$routeStopType;

// echo $from,"->";
// echo $to;"->";
// echo $date;


$from_name = Stops::find()->andwhere(['like', 'stop_name', $from])->one();
$to_name = Stops::find()->andwhere(['like', 'stop_name', $to])->one();

$routes = Route::find()->all();
$array = array();
$foundroute = null;
foreach ($routes as $route) {
    // echo "routeid = ",$route->route_id,"<br>";
    $routesStopType = RouteStopTypeSearch::find()->where(['route_id' => $route->route_id])->all();

    foreach ($routesStopType as $rst) {
        if ($rst->stop_id == $from_name->stop_id || $rst->stop_id == $to_name->stop_id) {
            //echo "rst = ",$rst->route_stop_type_id,"<br>";
            array_push($array, $rst->route_stop_type_id);
        }
    }
    //echo "count = ",count($array), "<br>";
    //echo json_encode($array);

    //check count
    if (count($array) == 2) {
        // echo "count 2 arr fornd = ",count($array), "<br>";
        $frst = RouteStopTypeSearch::find()->where(['stop_id' => $from_name->stop_id, 'route_id' => $route->route_id])->one();
        $trst = RouteStopTypeSearch::find()->where(['stop_id' => $to_name->stop_id, 'route_id' => $route->route_id])->one();

        if ($frst->stop_order < $trst->stop_order) {
            //  echo "U","<br>";

            $foundroute = $frst->route_id;
            $found_rst = $trst;
        } else {
            // echo "D","<br>";
            $found_rst = $frst;
        }
        $array = array();
    } else {
        // echo "no bus <br>";
        $array = array();
    }
    //echo "-------------<br>";
}
if ($foundroute == "") {
    echo " <div class='alert alert-dark' role='alert'><h1>No Buses Available for this Route</h1></div>";
} else {
    echo "<div class='alert alert-dark' role='alert'><h1>Available buses</h1></div>";
}



$data = BusRoute::find()->where(['route_id' => $foundroute])->all();

//echo $data;
?>
<html>

<head>
    <style>
        #bus_block:hover {
            transform: scale(1.01);
        }
    </style>
</head>

<body>
    <div class="container">

    </div>


    <?php
    foreach ($data as $col) {
        $busno =  $col->bus->license_plate;
        $from = $col->route->from;
        $to = $col->route->to;
        $time = $col->timing;
        $seats_count = Tickets::find()->where(['bus_route_id' => $col->bus_route_id])->count();
        $bus_seat_count = Bus::find()->where(['bus_id' => $col->bus_id])->one();
        $seats_left = $bus_seat_count->no_of_seats - $seats_count ?>



        <div id="bus_block" class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Bus Number: <b><?php echo $busno ?></b></h4>
                            <div>
                                <h4>Date <b><?php echo $date ?></b></h4>
                            </div>
                        </div>

                        <div class="col-md-2" style="padding-left:160px">
                            <img src="http://localhost/citibus/web/seat.png" alt="seat-left" height="40px" width="40px">

                        </div>
                        <div class="col-md-2">
                            <h4><?php echo $seats_left; ?> Left</h4>
                        </div>

                    </div>
                </div>

                <div class="panel-body">
                    <div class="row" style="padding-left:20px">
                        <div class="col-sm-4">
                            <p>From</p>
                            <h4>Margao</h4>
                        </div>
                        <div class="col-sm-4">
                            <p>To</p>
                            <h4>Panjim</h4>
                        </div>
                        <div class="col-sm-2">
                            <p>Timing</p>
                            <h4>10:00</h4>
                        </div>
                        <div style="padding-top:10px" class="col-sm-2">
                            <?= Html::a(
                                    'Select seats',
                                    ['bus-seats/seatselect', 'rst_id' => $found_rst->route_stop_type_id, 'route_id' => $col->route_id, 'bus_id' => $col->bus_id, 'bus_route_id' => $col->bus_route_id],
                                    ['class' => 'btn btn-primary']
                                ); ?>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <br>

    <?php
    }
    ?>

    </div>

</body>

</html>