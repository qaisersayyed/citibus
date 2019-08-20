<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BusRoute */

$this->title = 'Update Bus Route: ' . $model->bus_route_id;
$this->params['breadcrumbs'][] = ['label' => 'Bus Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bus_route_id, 'url' => ['view', 'id' => $model->bus_route_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bus-route-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
