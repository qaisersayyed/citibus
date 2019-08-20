<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BusTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bus Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bus Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bus_type_id',
            'type',
            'created_at',
            'updated_at',
            'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
