<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Tickets;
use app\models\Route;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TicketsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Customers ';
// $this->params['breadcrumbs'][] = $this->title;

$query = Tickets::find()->where(['bus_route_id'=>$bus_route_id]);
$dataProvider = new ActiveDataProvider([
    'query' => $query,
]);

$route = Route::find()->where(['route_id'=>$route_id])->one();

// echo json_encode($route->from);
?>
<div class="tickets-index">
    <h1><?php echo $route->from ;?> To <?php echo $route->to ;?></h1><br>
    <h3><?= Html::encode($this->title) ?></h3>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'customer_id',
                'label' => 'Customer Name',
                'value' => 'customer.name',
            ],
            // 'route.from',
            [
                'attribute' => 'bus_route_id',
                'label' => 'License_plate',
                'value' => 'busRoute.bus.license_plate',
            ],

            [
                'attribute' => 'route_stop_type_id',
                'label' => 'Stop Name',
                'value' => 'routeStopType.stop.stop_name',
            ],
            'seat_code',
            'fare',
            'date',
            [
                'attribute' => 'bus_route_id',
                'label' => 'Timing',
                'value' => 'busRoute.timing',
            ],
            //'seat_name',
            //'created_at',
            //'updated_at',
            //'deleted_at',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
