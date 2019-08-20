<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PassRide */

$this->title = 'Create Pass Ride';
$this->params['breadcrumbs'][] = ['label' => 'Pass Rides', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pass-ride-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
