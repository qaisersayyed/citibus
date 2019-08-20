<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BusType */

$this->title = 'Update Bus Type: ' . $model->bus_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Bus Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bus_type_id, 'url' => ['view', 'id' => $model->bus_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bus-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
