<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BusSeats */

$this->title = 'Create Bus Seats';
$this->params['breadcrumbs'][] = ['label' => 'Bus Seats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-seats-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
