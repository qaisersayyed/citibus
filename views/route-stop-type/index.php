<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RouteStopTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Route Stop Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="route-stop-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Route Stop Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'route_stop_type_id',
            'route_id',
            'stop_id',
            'bus_type_id',
            'fare',
            //'created_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
