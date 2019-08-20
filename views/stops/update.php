<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Stops */

$this->title = 'Update Stops: ' . $model->stop_id;
$this->params['breadcrumbs'][] = ['label' => 'Stops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stop_id, 'url' => ['view', 'id' => $model->stop_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stops-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
