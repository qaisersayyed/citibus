<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PassRide */

$this->title = 'Update Pass Ride: ' . $model->pass_ride_id;
$this->params['breadcrumbs'][] = ['label' => 'Pass Rides', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pass_ride_id, 'url' => ['view', 'id' => $model->pass_ride_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pass-ride-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
