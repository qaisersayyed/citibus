<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BusRoute */

$this->title = $model->bus_route_id;
$this->params['breadcrumbs'][] = ['label' => 'Bus Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bus-route-view">

    <h1><?= Html::encode($this->title) ?></h1>

   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bus_route_id',
            'bus_id',
            'route_id',
            'timing',
          //  'created_at',
         //   'updated_at',
         //   'deleted_at',
        ],
    ]) ?>

</div>
