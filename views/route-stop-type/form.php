<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\DetailView;
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
    margin:auto:

}

</style>
<div class="container">
    <div  id="form">
        <?php $form = ActiveForm::begin([
            'method' => 'get',
        // 'action' => Url::to(['route-stop-type/form'])
        ]); ?>

            <div class="form-group" id="from">
                <?= $form->field($model, 'stop_name', ['inputOptions'=>[
                                        'name'=>'from','class'=>'form-control']])->label("From")
                                        //->textArea(['rows'=>'12','class'=>'form-control'])
                                        ->dropDownList(
                                            ArrayHelper::map(Stops::find()->all(), 'stop_name', 'stop_name'),
                                            ['prompt'=>'From ']
                                        ) ?>
            </div><br>
           
                <!-- <i class="fa fa-exchange" style="font-size:36px"></i> -->
          
            <div class="form-group" id="to">
                <?= $form->field($model, 'stop_name', ['inputOptions'=>[
                                            'name'=>'to','class'=>'form-control']])->label("To")
                                            //->textArea(['rows'=>'12','class'=>'form-control'])
                                            ->dropDownList(
                                                ArrayHelper::map(Stops::find()->all(), 'stop_name', 'stop_name'),
                                                ['prompt'=>'To ']
                                            ) ?>   
            </div>

            <div class="form-group" style="padding-right:900px"> 
                <p>When?</p>
                                    <?php    echo DatePicker::widget([
                            'name' => 'date',
                            'value' => date('d-M-Y'),
                            'options' => ['placeholder' => 'Select issue date ...'],
                            'pluginOptions' => [
                                'format' => 'dd-M-yyyy',
                                'todayHighlight' => true
                            ]
                        ]);
                                        ?>
            </div>


            <div class="form-group" id="button">
                <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
            </div>

            
     <script>
    $('.select2').select2();
</script>
</div>
            

        <?php ActiveForm::end(); ?>
    <div>
    
</div>  
