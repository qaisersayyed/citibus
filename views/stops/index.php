<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StopsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stops';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stops-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Stops', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'stop_id',
            'stop_name',
            'created_at',
            'updated_at',
            'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
