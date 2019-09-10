<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StopsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Search Bar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-index">
    <div style="width:50%; margin: 0 auto;" >

    <?php $form = ActiveForm::begin([
        'method' => 'post',
        'action' => Url::to(['home/form'])
    ]); ?>
       <?= Html::label('From:') ?>
            <?= Html::textInput('from', "", ['class' => 'form-control']); ?>
            <?= Html::label('To:') ?>
            <?= Html::textInput('to',"", ['class' => 'form-control']); ?>
            
            <div class="form-group">
                 <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

    <?php ActiveForm::end(); ?>
        <!-- <form action="index.php?r=home/form" method="post">
            <div class="form-group mb-2">
                <label >From</label>
                <input type="text" class="form-control" name="from" >
            </div>
            <div class="form-group mb-2">
                <label >To</label>
                <input type="text" class="form-control" name="to" >
            </div>

            <div class="form-group" style="text-align:center;">
                 <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </div>
        
        </form> -->
    </div>

    


    
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 
    


</div>
