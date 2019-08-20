<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BusSeats */

$this->title = 'Update Bus Seats: ' . $model->bus_seat_id;
$this->params['breadcrumbs'][] = ['label' => 'Bus Seats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bus_seat_id, 'url' => ['view', 'id' => $model->bus_seat_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bus-seats-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
