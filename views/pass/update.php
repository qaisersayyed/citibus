<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pass */

$this->title = 'Update Pass: ' . $model->pass_id;
$this->params['breadcrumbs'][] = ['label' => 'Passes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pass_id, 'url' => ['view', 'id' => $model->pass_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pass-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
