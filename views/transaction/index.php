<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?//= Html::a('Create Transaction', ['create'], ['class' => 'btn btn-success']) ?>
        <br>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'transaction_id',
           // 'bus_route_id',
            // 'customer_id',
            [
                'attribute' => 'customer_id',
                'label' => 'Customer Name',
                'value' => 'customer.name',
            ],
            [

                'attribute' => 'bus_route_id',
                'label' => 'From',
                'value' => 'busRoute.route.from',
            ],
            [
    
                'attribute' => 'bus_route_id',
                'label' => 'To',
                'value' => 'busRoute.route.to',
            ],
            // 'route_stop_type_id',
            [
                'attribute' => 'route_stop_type_id',
                'label' => 'Stop Name',
                'value' => 'routeStopType.stop.stop_name',
            ],
            'seat_code',
            // 'ticket_id',
             'order_id',
            'amount',
            'date',
            [
                'label' => 'Date',
                'attribute'=>'date',
                'value' => function($model){
                    return date('d M Y', strtotime($model->date));
                }
            ],
            //'status',
            //'creted_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
