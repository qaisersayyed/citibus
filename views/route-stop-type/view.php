<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\RouteStopType;
/* @var $this yii\web\View */
/* @var $model app\models\RouteStopType */

$this->title = $model->route_stop_type_id;

$stop_id =  RouteStopType::find()
        ->where(['route_id' => $model->route_id, 'deleted_at' => null])
        ->orderBy(['stop_order' => SORT_ASC])
        ->all();

\yii\web\YiiAsset::register($this);
?>
<div class="route-stop-type-view">

    <h1>All Stops</h1>
    <?php    
         foreach($stop_id as $s_id){
            //  echo $s_id->stop_order; ?>
         
            <?= DetailView::widget([
                'model' => $s_id,
                'attributes' => [
                    // 'route_stop_type_id',
                    'route.from',
                    'route.to',
                    'stop.stop_name',
                    'busType.type',
                    'fare',
                    'stop_order',
                    
                ],
            ]) ?>
    <?php } ?>
    

</div>
