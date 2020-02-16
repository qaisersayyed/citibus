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

</head>
<style>
#form{  
    background-color:#0030776e;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
#f{
    background-color:red;
}
body {
 background-image: url("/citibus/web/img.jpg");
 background-size: cover;
 background-position: center; 
 
}

</style>
<br>
<div class="container">
<div class="card bg-success text-white" style="margin-top:100px;margin-left:150px;margin-right:150px; background-color:#143D59; color:white;">
    <div class="card-body">
	
    <div  id="form" class="form" style="padding:50px">
        <?php $form = ActiveForm::begin([
            'method' => 'get',
        // 'action' => Url::to(['route-stop-type/form'])
        ]); ?>

            <div class="form-group" id="from">
                <?= $form->field($model, 'stop_name', ['inputOptions' => ['name' => 'from','id' => 'f']])->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Stops::find()->all(), 'stop_name', 'stop_name'),
                        'options' => ['prompt'=>'From'],
                        'name' => 'from',
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                       
                        
                    ])->label('From')?>
            </div>
          
            <div class="form-group" style="width:260px"> 
                <p>When?</p>
                                    <?php    echo DatePicker::widget([
                            'name' => 'date',
                            'value' => date('d-M-Y'),
                            'options' => ['placeholder' => 'Select issue date ...'],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,    
                            'startDate' => date("yyyy-MM-dd H:i:s"),
                            ]
                        ]);
                                        ?>
            </div>
                <!-- <i class="fa fa-exchange" style="font-size:36px"></i> -->

            <div class="form-group" id="to" >
                <?= $form->field($model, '[1]stop_name', ['inputOptions' => ['name' => 'to']])->widget(Select2::classname(), [
                     'data' => ArrayHelper::map(Stops::find()->all(), 'stop_name', 'stop_name'),
                         'options' => ['prompt'=>'To'],
                         'name' => 'to',
                         'pluginOptions' => [
                             'allowClear' => true
                         ],
                         
                        
                     ])->label('To')?>

                
            </div>

            
            <div class="form-group" id="button">
                <?= Html::submitButton('Search', ['class' => 'btn btn-custom', 'style' => 'background-color:#F4B41A']) ?>
            </div>
</div>
            

        <?php ActiveForm::end(); ?>
    <div>
</div>
</div>
    
</div>  
