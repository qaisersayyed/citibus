<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seats */

$this->title = 'Update Seats: ' . $model->seat_id;
$this->params['breadcrumbs'][] = ['label' => 'Seats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->seat_id, 'url' => ['view', 'id' => $model->seat_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seats-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
