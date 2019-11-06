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

$this->title = 'All Buses';
/* @var $this yii\web\View */
/* @var $model app\models\BusRoute */
// echo "route id",$routeid ,"<br>";
// echo "rst id",$routeStopType;

echo $from,"->";
echo $to;"->";
echo $date;


$from_name = Stops::find()->andwhere(['like','stop_name' , $from ])->one();
$to_name = Stops::find()->andwhere(['like' ,'stop_name' , $to ])->one();

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
    echo "<h1>No Buses Available for this Route</h1>",$foundroute;
} else {
    echo "<h1>Available Buses</h1>",$foundroute;
}



$data = BusRoute::find()->where(['route_id' => $foundroute ])->all();

//echo $data;
?>
<html>
            <head>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
            </head>
        <body>
        <div>
        <table class="table table-striped table-bordered">
            <tbody>
            <?php
    foreach ($data as $col) {
        $busno =  $col->bus->license_plate;
        $from = $col->route->from;
        $to = $col->route->to;
        $time= $col->timing; ?>
        
        
              
                    <div class="panel-group">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><h3>Bus Number: <?php echo $busno ?></h3></div>
                            <div class="panel-body">
                                <div class="row">
                                        <div class="col-sm">
                                            <h4>From</h4>
                                            <h3><?php echo $from ?></h3>
                                        
                                        </div>
                                        <div class="col-sm">
                                            <h4>To</h4>
                                            <h3><?php echo $to ?></h3>
                                        </div>
                                        <div class="col-sm">
                                           <h4>Timing</h4>
                                            <h3><?php echo $time ?></h3>
                                        </div>
                                </div>
                                <div class="row" style="padding-left:900px">
                                <?= Html::a(
            'submit',
            ['bus-seats/seatselect', 'date' => $date, 'rst_id' => $found_rst->route_stop_type_id,'route_id' =>$col->route_id,'bus_id'=>$col->bus_id,'bus_route_id'=>$col->bus_route_id],
            ['class' => 'btn btn-primary']
        ); ?>
                                </div>
                            </div>
                        </div>         
                    </div>
                    <br>

    <?php
    }
    ?>
    </tbody>
                </table>

        </div>

        </body>
        </html>
       
       





