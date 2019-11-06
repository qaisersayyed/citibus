<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\Select2;
use app\models\Stops;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StopsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Search Bar';
$model = new Stops();
$this->params['breadcrumbs'][] = $this->title;
?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
#form{  
    margin:auto:

}

</style>
<div class="container">
    <div id="form">
        <?php $form = ActiveForm::begin([
            'method' => 'get',
        // 'action' => Url::to(['route-stop-type/form'])
        ]); ?>

            <div class="form-group" id="from">
                <?= $form->field($model, 'stop_name')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Stops::find()->all(),'stop_name','stop_name'),
                        'options' => ['placeholder' => 'Select a state ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],]
                    // ]);  ,['inputOptions'=>[
                    //                     'name'=>'from','class'=>'form-control']])->label("From")
                    //                     //->textArea(['rows'=>'12','class'=>'form-control'])
                    //                     ->dropDownList(
                    // ArrayHelper::map(Stops::find()->all(),'stop_name','stop_name')
                    
                    // echo $form->field($model, 'state_1')->widget(Select2::classname(), [
                    //     'data' => $data,
                    //     'options' => ['placeholder' => 'Select a state ...'],
                    //     'pluginOptions' => [
                    //         'allowClear' => true
                    //     ],
                    // ]);
                ) ?>
            </div>
            <center>  
                <i class="fa fa-exchange" style="font-size:36px"></i>
            </center>
          
            <div class="form-group" id="to">
                <?= $form->field($model, 'stop_name',['inputOptions'=>[
                                            'name'=>'to','class'=>'form-control']])->label("To")
                                            //->textArea(['rows'=>'12','class'=>'form-control'])
                                            ->dropDownList(
                    ArrayHelper::map(Stops::find()->all(),'stop_name','stop_name')
                        
                    ) ?>   
            </div>
            <div class="form-group" id="button">
                <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    <div>
</div>  
