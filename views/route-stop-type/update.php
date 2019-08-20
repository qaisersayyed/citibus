<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RouteStopType */

$this->title = 'Update Route Stop Type: ' . $model->route_stop_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Route Stop Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->route_stop_type_id, 'url' => ['view', 'id' => $model->route_stop_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="route-stop-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
