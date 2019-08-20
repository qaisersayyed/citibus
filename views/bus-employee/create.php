<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BusEmployee */

$this->title = 'Create Bus Employee';
$this->params['breadcrumbs'][] = ['label' => 'Bus Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-employee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
