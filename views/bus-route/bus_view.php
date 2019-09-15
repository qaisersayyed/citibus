<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\BusRoute;
$this->title = 'All Buses';
/* @var $this yii\web\View */
/* @var $model app\models\BusRoute */
echo $id;
$data = BusRoute::find()->where(['route_id' => $id ])->all();
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
                                        <?= Html::Button('select', ['class' => 'btn btn-success']) ?>
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
