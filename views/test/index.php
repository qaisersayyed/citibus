<?php
use app\models\RouteStopType;
use app\models\RouteStopTypeSearch;
use app\models\Stops;
use app\models\Route;


echo $from_name->stop_id,$from_name->stop_name,"<br>";
echo $to_name->stop_id,$to_name->stop_name, "<br>";

echo "loop <br>";
$routes = Route::find()->all();
$array = array();
$foundroute = null;
foreach($routes as $route){
     echo "routeid = ",$route->route_id,"<br>";
     $routesStopType = RouteStopTypeSearch::find()->where(['route_id' => $route->route_id])->all();
     
foreach($routesStopType as $rst){
    if ($rst->stop_id == $from_name->stop_id || $rst->stop_id == $to_name->stop_id ){
        echo "rst = ",$rst->route_stop_type_id,"<br>";
        array_push($array,$rst->route_stop_type_id);
        
    }   
}
echo "count = ",count($array), "<br>";
echo json_encode($array);

//check count
if (count($array) == 2){
    echo "count 2 arr fornd = ",count($array), "<br>";
    $frst = RouteStopTypeSearch::find()->where(['stop_id' => $from_name->stop_id, 'route_id' => $route->route_id])->one();
    $trst = RouteStopTypeSearch::find()->where(['stop_id' => $to_name->stop_id, 'route_id' => $route->route_id])->one();
    
    if($frst->stop_order < $trst->stop_order){
        echo "U","<br>";
     
        $foundroute = $frst->route_id;
      
    }else{
        echo "D","<br>";
        
    }
    $array = array();
}else{
    echo "no bus <br>";
    $array = array();
}
echo "-------------<br>";
}
echo "fornd route", $foundroute;

?>