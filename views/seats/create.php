<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seats */

$this->title = 'Create Seats';
$this->params['breadcrumbs'][] = ['label' => 'Seats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seats-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
