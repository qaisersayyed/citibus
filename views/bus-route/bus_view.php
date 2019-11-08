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

 echo $f,"->";
 echo $t;"->";
// echo $date;


$from_name = Stops::find()->andwhere(['like','stop_name' , $f ])->one();
$to_name = Stops::find()->andwhere(['like' ,'stop_name' , $t ])->one();

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



$data = BusRoute::find()->where(['route_id' => $foundroute ])->all();

//echo $data;
?>
<html>
           <head>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
                   <style>
           #bus_block:hover {
               transform: scale(1.01);
           }
            /* $brand-primary: tomato;
            $white: #fff;
            $grey-light: #ededed; */
            %remain-steps{
            &:before{
                content: counter(stepNum);
                font-family: inherit;
                font-weight: 700;
            }
            &:after{
                background-color: #ededed;
            }
            }
            .multi-steps{
            display: table;
            table-layout: fixed;
            width: 100%;
            > li{
                counter-increment: stepNum;
                text-align: center;
                display: table-cell;
                position: relative;
                color: tomato;

                &:before{
                content: '\f00c';
                content: '\2713;';
                content: '\10003';
                content: '\10004';
                content: '\2713';
                display: block;
                margin: 0 auto 4px;
                background-color: #fff;
                width: 36px;
                height: 36px;
                line-height: 32px;
                text-align: center;
                font-weight: bold;
                border:{
                    width: 2px;
                    style: solid;
                    color: tomato;
                    radius: 50%;
                }
                }
                &:after{
                content: '';
                height: 2px;
                width: 100%;
                background-color: tomato;
                position: absolute;
                top: 16px;
                left: 50%;
                z-index: -1;
                }
                &:last-child{
                &:after{
                    display: none;
                }
                }

                &.is-active{
                @extend %remain-steps;
                &:before{
                    background-color: #fff;
                    border-color: tomato;
                }

                ~ li{
                    color: #808080;
                    @extend %remain-steps;
                    &:before{
                    background-color: #ededed;
                    border-color: #ededed;
                    }
                }
                }
            }
            }
           /* #progress{
                width:<?php //echo 50?>%
           } */
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
        $time= $col->timing;
        $seats_count = Tickets::find()->where(['bus_route_id' => $col->bus_route_id ])->count();
        $bus_seat_count = Bus::find()->where(['bus_id' => $col->bus_id ])->one();
        $seats_left = $bus_seat_count->no_of_seats - $seats_count ?>
        
        
              
                    <div id="bus_block" class="panel-group">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4>Bus Number: <b><?php echo $busno ?></b></h4>
                                        <div>
                                            <h4>Date  <b><?php echo $date ?></b></h4>
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
                                            <h4 style="text-transform: capitalize;"><?php echo $from; ?> </h4>
                                        </div>
                                        <div class="col-sm-4">
                                            <p>To</p>
                                            <h4 style="text-transform: capitalize;"> <?php echo $to; ?> </h4>
                                        </div>
                                        <div class="col-sm-2">
                                            <p>Timing</p>
                                            <h4><?php echo $time; ?> </h4>
                                        </div>
                                        <div style="padding-top:10px;display:inline-block;" class="col-sm-1">
                                        <?= Html::a(
            'Select seats',
            ['bus-seats/seatselect', 'rst_id' => $found_rst->route_stop_type_id,'route_id' =>$col->route_id,'date'=>$date,'f'=>$f,'t' => $t,'bus_id'=>$col->bus_id,'bus_route_id'=>$col->bus_route_id],
            ['class' => 'btn btn-primary']
        ); ?>
                                <div class="col-sm-1" style="display:inline-block;">
                                <button class='btn' style="background-color:#F4B41A;color:white" type="button"  data-toggle="modal" data-target="#myModal">Stops</button>
                                </div>
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

<!-- Modal -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="panel panel-primary">
      <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">All Stops</h4>
      </div>
      <div class="panel-body">
      
            <br /><br />
            <ul class="list-unstyled multi-steps">
                <li>Start</li>
                <li>First Step</li>
                <li class="is-active">Middle Stage</li>
                <li>Finish</li>
            </ul>

      </div>
      <div class="modal-footer">
        <button type="button" class='btn btn-primary' data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
        </body>
        </html>
       
       





