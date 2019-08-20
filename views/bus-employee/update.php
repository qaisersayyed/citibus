<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BusEmployee */

$this->title = 'Update Bus Employee: ' . $model->bus_employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Bus Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bus_employee_id, 'url' => ['view', 'id' => $model->bus_employee_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bus-employee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
