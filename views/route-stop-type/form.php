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
    <?php $form = ActiveForm::begin([
          'method' => 'get',
      // 'action' => Url::to(['route-stop-type/form'])
    ]); ?>
       <?= Html::label('From:') ?>
             <input type="text" class="form-control" name="from" >
             <?= Html::label('To:') ?>
             <input type="text" class="form-control" name="to" >
            
             <div class="form-group">
                  <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
             </div>

    <?php ActiveForm::end(); ?>
       
    
    <div class="text-right">
        <p><b>Search Result: </b>
        <?php 
            // if($searchModel->route_id != ""){
            //     echo $searchModel->route_id ;
            // }else{
            //     echo "None";
            // }
            echo $searchModel->stop_id;
        ?>

     
    


</div>
