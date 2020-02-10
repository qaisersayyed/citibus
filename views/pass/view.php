<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pass */

$this->title = $model->pass_id;

\yii\web\YiiAsset::register($this);
?>
<div class="pass-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pass_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pass_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pass_id',
            'customer_id',
            'route_id',
            'start_date',
            'end_date',
            'up_down',
            'fare',
            // 'created_at',
            // 'updated_at',
            // 'deleted_at',
        ],
    ]) ?>

</div>
