<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RouteStopType */

$this->title = 'Create Route Stop Type';
$this->params['breadcrumbs'][] = ['label' => 'Route Stop Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="route-stop-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
