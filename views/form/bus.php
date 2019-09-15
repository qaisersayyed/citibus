<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RouteStopType */

$this->title = $model->route_stop_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Route Stop Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'route_stop_type_id',
            'route.from',
            'route.to',
            //'route_id',
            'stop_id',
            'bus_type_id',
            'fare',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
