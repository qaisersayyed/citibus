<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BusRouteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bus Routes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-route-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bus Route', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'bus_route_id',
            [

                'attribute' => 'bus_id',
                'label' => 'licence_plate',
                'value' => 'bus.license_plate',
            ],
          //  'bus_id',
          [

            'attribute' => 'route_id',
            'label' => 'from',
            'value' => 'route.from',
        ],
        [

            'attribute' => 'route_id',
            'label' => 'to',
            'value' => 'route.to',
        ],
       //     'route_id',
            'timing',
            'created_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
