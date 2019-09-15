<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RouteStopTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Route Stop Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="route-stop-type-index">



<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'route_id')->textInput() ?>

<?= $form->field($model, 'stop_id')->textInput() ?>


<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>





</div>
