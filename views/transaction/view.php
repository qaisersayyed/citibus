<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Customer;
use app\models\BusRoute;
use app\models\RouteStopType;
/* @var $this yii\web\View */
/* @var $model app\models\Transaction */

$this->title = $model->transaction_id;
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transaction-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->transaction_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->transaction_id], [
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
            // 'transaction_id',
            // 'bus_route_id',
            // 'customer_id',
            'customer.name',
            'busRoute.route.from',
            'busRoute.route.to',
            // 'route_stop_type_id',
            'routeStopType.stop.stop_name',
            'seat_code',
            // 'ticket_id',
            'order_id',
            // 'txn_id',
            'amount',
            // 'date',
            [
                'label' => 'Date',
                'attribute'=>'date',
                'value' => function($model){
                    return date('d M Y', strtotime($model->date));
                }
            ],
            // 'status',
            // 'creted_at',
            // 'updated_at',
        ],
    ]) ?>

</div>
