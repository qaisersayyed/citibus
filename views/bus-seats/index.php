<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BusSeatsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bus Seats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-seats-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bus Seats', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bus_seat_id',
            [

                'attribute' => 'bus_id',
                'label' => 'licence_plate',
                'value' => 'bus.license_plate',
            ],
            //'bus_id',
            //'seat_id',
            [

                'attribute' => 'seat_id',
                'label' => 'seat_code',
                'value' => 'seat.seat_code',
            ],
            'created_at',
            'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
