<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BusRoute */

$this->title = 'Create Bus Route';
$this->params['breadcrumbs'][] = ['label' => 'Bus Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-route-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
