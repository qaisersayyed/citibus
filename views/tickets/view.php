<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Customer;
use app\models\BusRoute;
use app\models\RouteStopType;
/* @var $this yii\web\View */
/* @var $model app\models\Tickets */

$this->title = $model->ticket_id;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tickets-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ticket_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ticket_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'ticket_id',
            // 'customer_id',
            'customer.name',
            'busRoute.route.from',
            'busRoute.route.to',
            // 'bus_route_id',
            // 'route_stop_type_id',
            'routeStopType.stop.stop_name',
            'seat_code',
            'fare',
            // 'created_at',
            // 'updated_at',
            // 'deleted_at',
        ],
    ]) ?>

</div>
