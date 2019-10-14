<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\BusRoute;
use app\models\Route;
use yii\bootstrap\Button;
use yii\helpers\Url;
$this->title = 'All Buses';
/* @var $this yii\web\View */
/* @var $model app\models\BusRoute */
echo "route id",$routeid ,"<br>";
echo "rst id",$routeStopType;
//echo $direction;


//$data = BusRoute::find()->where(['route_id' => $id ])->all();
//$route = Route::find()->where(['route_id' => $id ])->one();

$data = BusRoute::find()->where(['route_id' => $routeid ])->all();

//echo $data;
echo "<h1>Available Buses</h1>";
    foreach($data as $col){
        $busno =  $col->bus->license_plate;
         $from = $col->route->from;
         $to = $col->route->to;
        $time= $col->timing;
        // echo "$busno <br>";
        // echo "$from <br>";
        // echo "$to <br>";
        // echo "$time <br>";
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
