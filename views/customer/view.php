<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//echo $model->customer_id;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = $model->name;

\yii\web\YiiAsset::register($this);
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update Profile', ['update', 'id' => $model->customer_id], ['class' => 'btn btn-primary']) ?>
        <!-- <?= Html::a('Delete', ['delete', 'id' => $model->customer_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'customer_id',
            // 'user_id',
            'name',
            'phone_no',
            'email_id:email',
            // 'password',
            // 'e_wallet',
            // 'created_at',
            // 'updated_at',
            // 'deleted_at',
        ],
    ]) ?> 

    

</div>
