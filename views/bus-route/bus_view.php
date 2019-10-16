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
echo $to;

$from_name = Stops::find()->andwhere(['like','stop_name' , $from ])->one();
$to_name = Stops::find()->andwhere(['like' ,'stop_name' , $to ])->one();

$routes = Route::find()->all();
$array = array();
$foundroute = null;
foreach($routes as $route){
    // echo "routeid = ",$route->route_id,"<br>";
     $routesStopType = RouteStopTypeSearch::find()->where(['route_id' => $route->route_id])->all();
     
foreach($routesStopType as $rst){
    if ($rst->stop_id == $from_name->stop_id || $rst->stop_id == $to_name->stop_id ){
        //echo "rst = ",$rst->route_stop_type_id,"<br>";
        array_push($array,$rst->route_stop_type_id);
        
    }   
}
//echo "count = ",count($array), "<br>";
//echo json_encode($array);

//check count
if (count($array) == 2){
   // echo "count 2 arr fornd = ",count($array), "<br>";
    $frst = RouteStopTypeSearch::find()->where(['stop_id' => $from_name->stop_id, 'route_id' => $route->route_id])->one();
    $trst = RouteStopTypeSearch::find()->where(['stop_id' => $to_name->stop_id, 'route_id' => $route->route_id])->one();
    
    if($frst->stop_order < $trst->stop_order){
      //  echo "U","<br>";
     
        $foundroute = $frst->route_id;
      
    }else{
       // echo "D","<br>";
        
    }
    $array = array();
}else{
   // echo "no bus <br>";
    $array = array();
}
//echo "-------------<br>";
}
if ($foundroute == ""){
    echo "<h1>No Buses Available for this Route</h1>",$foundroute;
}else{
    echo "<h1>Available Buses</h1>",$foundroute;
}



$data = BusRoute::find()->where(['route_id' => $foundroute ])->all();

//echo $data;

    foreach($data as $col){
        $busno =  $col->bus->license_plate;
         $from = $col->route->from;
         $to = $col->route->to;
        $time= $col->timing;
        ?>
        <div>
            <table class="table table-striped table-bordered">
                <tbody>
                        <tr>
                        
                        <td><b>Bus name</b> </td>
                        <td><?php echo $busno ?></td>
                        
                        </tr>
                        <tr>
                        
                        <td><b>From</b></td>
                        <td><?php echo $from ?></td>
                        
                        </tr>

                        <tr>
                        
                        <td><b>To</b> </td>
                        <td><?php echo $to ?></td>
                        
                        </tr>
                        <tr>
                            
                            <td><b>Timing</b> </td>
                            <td><?php echo $time ?></td>
                            
                        </tr>
                        <tr>
                        
                                    <td>
                                 
                                <?= Html::a('submit', ['bus-route/view', 'id' => 6], ['class' => 'btn btn-primary']); ?>
                                
                                    </td>
                        </tr>
                </tbody>
            </table>

        </div>
        <br>
       
<?php
    }
    ?>



</div>
