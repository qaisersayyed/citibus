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

 //echo $f,"->";
 //echo $t;"->";
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
           <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
                   <style>
                   
           #bus_block:hover {
               transform: scale(1.01);
           }
            
            
           /* #progress{
                width:<?php //echo 50?>%
           } */
           </style>
           </head> 
              
        <body>
        <div class="container">
        <div class="card bg-info text-white" style="margin-right:40px;padding-top:10px; background-color:#F4B41A;">
       <div class="card-body">
        <center>
        <div class="row" >
         <div class="col-md-4" style="text-align: ;"><h4>From</h4><h3 style="text-transform: capitalize;"><?php echo $f ?></h3></div>
         <div class="col-md-4" style=""></div>
         <div class="col-md-4" style="text-align: ;"><h4>To</h4><h3 style="text-transform: capitalize;"><?php echo $t ?></h3></div>
        </div><br>
        </center>
        </div>
        </div><br>
        
           
</div>

      
            <?php
    foreach ($data as $col) {
        $busno =  $col->bus->license_plate;
        $from = $col->route->from;
        $to = $col->route->to;
        $time= $col->timing;
        $seats_count = Tickets::find()->where(['bus_route_id' => $col->bus_route_id,'date(created_at)' => $date])->count();
        $bus_seat_count = Bus::find()->where(['bus_id' => $col->bus_id ])->one();
        $seats_left = $bus_seat_count->no_of_seats - $seats_count ;
        $ftime = new DateTime($time); ?>
        
        
              
                    <div id="bus_block" class="panel-group">
                        <div class="panel panel-primary" style="background-color:#F4B41A;">
                            <div class="panel-heading" style="background-color:#143D59;">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4>Bus Number: <b><?php echo $busno ?></b></h4>
                                        <div>
                                            <h4>Date  <b><?php $jdate =  Yii::$app->formatter->asDate($date, 'long');echo $jdate ?></b></h4>
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
                                            <h4><?php echo $ftime->format('h:i A'); ?> </h4>
                                        </div>
                                        <div style="padding-top:10px;display:inline-block;" class="col-sm-2">
                                        <?= Html::a(
            'Select seats',
            ['bus-seats/seatselect', 'rst_id' => $found_rst->route_stop_type_id,'route_id' =>$col->route_id,'date'=>$date,'f'=>$f,'t' => $t,'bus_id'=>$col->bus_id,'bus_route_id'=>$col->bus_route_id],
            ['class' => 'btn btn-custom', 'style' => 'background-color:#143D59; color:white']
        ); ?>
                                <div style="text-align:center;padding-top:10px" >
                                <a    data-toggle="modal" data-target="#myModal"><b>Stops</a>
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
<?php
$from_id = Stops::find(['stop_id'])->where(['stop_name' => $f])->one();
$to_id = Stops::find(['stop_id'])->where(['stop_name' => $t])->one();
 
$from_route_id = RouteStopType::find('*')->where(['stop_id' => $from_id]) ->all();
$to_route_id = RouteStopType::find('*')->where(['stop_id' => $to_id])->all();
//   echo json_encode($to_route_id);

for($i = 0; $i < count($from_route_id) ;$i++) {
    if($from_route_id[$i]->route_id != $to_route_id[$i]->route_id and $from_route_id[$i]->stop_order > $to_route_id[$i]->stop_order){
        echo "not Available";  
    }
    else{
        $route_id =  $from_route_id[$i]->route_id;
        $stop_id = RouteStopType::find(['stop_id'])->where(['route_id' => $route_id])->orderby(['stop_order' =>SORT_ASC])->all();
        if($stop_id>0){
        ?>
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
                <?php
                    foreach ($stop_id as $stopid) {
                        // echo $stopid->stop_id;
                        $stop_name = Stops::find(['stop_name'])->where(['stop_id' => $stopid->stop_id])->one(); ?>
                            <div > 
                                <p style="display:inline-block"> <i class="material-icons"> my_location </i></p><p style="display:inline-block;vertical-align:top;margin-top:5px;margin-left:10px"><?php echo $stop_name->stop_name?></p><br><br>                               
                            </div>  
                    <?php
                    }
                        
                ?>

            </div>
            <div class="modal-footer">
                <button type="button" class='btn btn-primary' data-dismiss="modal">Close</button>
            </div>
            </div>

        </div>
<?php 
        break;
            }
            
        }
           
    }    
?>


</div>
        </body>
        </html>
       
       





