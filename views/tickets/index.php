<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TicketsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tickets-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?//= Html::a('Create Tickets', ['create'], ['class' => 'btn btn-success']) ?>
        <br>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'ticket_id',
            [
                'attribute' => 'customer_id',
                'label' => 'Customer Name',
                'value' => 'customer.name',
            ],
            // 'customer_id',
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
            
            // 'bus_route_id',
            [
                'attribute' => 'route_stop_type_id',
                'label' => 'Stop Name',
                'value' => 'routeStopType.stop.stop_name',
            ],
            // 'route_stop_type_id',
            'fare',
            //'seat_name',
            //'created_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
