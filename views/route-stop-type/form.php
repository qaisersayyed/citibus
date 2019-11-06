<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\DetailView;
use kartik\select2\Select2;
use app\models\Stops;
use yii\helpers\ArrayHelper;

use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StopsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Search Bar';
$model = new Stops();
$this->params['breadcrumbs'][] = $this->title;
?>

              
<head>
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

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
                    'data' => ArrayHelper::map(Stops::find()->all(), 'stop_name', 'stop_name'),
                        'options' => ['prompt'=>'From'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                        'bsVersion' => '4.x',
                        
                    ])->label('From')?>
          </div>
          
           
                <!-- <i class="fa fa-exchange" style="font-size:36px"></i> -->
                <div class="row">
                    <div class="col-md-3">
                        <h5>When?</h5>
                            <?php echo DatePicker::widget([
                                'name' => 'date',
                                'value' => date('d-M-Y', strtotime('')),
                                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                'bsVersion' => '4.x',
                                'options' => ['placeholder' => 'Select journey date'],
                                'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                                'pluginOptions' => [
                                    'todayHighlight' => true,
                                    'todayBtn' => true,
                                    'format' => 'yyyy-mm-dd',
                                    'autoclose' => true,
                                    'required'=>true
                                ]
                            ]); ?>
                    </div>
                
                </div><br>
                
            
          
            <div class="form-group" id="to" >
            <?= $form->field($model, 'stop_name')->widget(Select2::classname(), [
                     'data' => ArrayHelper::map(Stops::find()->all(), 'stop_name', 'stop_name'),
                         'options' => ['prompt'=>'To'],
                         'pluginOptions' => [
                             'allowClear' => true
                         ],
                          'bsVersion' => '4.x',
                        
                     ])->label('To')?>

                
            </div>

            
            <div class="form-group" id="button">
                <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    <div>
    
</div>  
