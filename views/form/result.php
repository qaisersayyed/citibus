<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">



     <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'route_stop_type_id',
            'route_id',
            'stop_id',
            'bus_type_id',
            'fare',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>


</div>
