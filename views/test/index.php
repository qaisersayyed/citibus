<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RouteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Routes';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="route-index">

 

   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

            //'route_id',
            'from',
            'to',
            [
                          'header' => 'Button',
                          'content' => function($model) {
                              return Html::a('Select route', ['bus-route/bus_view','id'=>$model->route_id], ['class' => 'btn btn-success btn-xs']);
                          }           
              ],
            //'created_at',
            //'updated_at',
            //'deleted_at',                                 
            
          //  ['class' => 'yii\grid\ActionColumn'],
        ],
       
     
        
    ]); ?>


</div>
