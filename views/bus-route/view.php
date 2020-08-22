<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\BusRoute;
/* @var $this yii\web\View */
/* @var $model app\models\BusRoute */

//  $this->title = $model->bus_route_id;

\yii\web\YiiAsset::register($this);
 
$bus_id =  BusRoute::find()
        ->where(['bus_id' => $model->bus_id, 'deleted_at' => null])
        ->all();
// echo json_encode($bus_id);
?>

<div class="bus-route-view">
    <h3>All Routes</h3><br>
    <?php    
         foreach($bus_id as $b_id){
             //  echo $br_id->bus_route_id;?>
             <?= DetailView::widget([
                 'model' => $b_id,
                'attributes' => [
                     // 'bus_route_id',
                     'bus.license_plate',
                     'route.from','route.to',
                     'timing',
                    
                 ],
             ])
    
     ?>
   <?php  }?>
                    
                
       
</div>
