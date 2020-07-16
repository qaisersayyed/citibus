<?php
namespace app\models;
use yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\BusRoute;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use app\models\BusRouteSearch;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Bus */

$this->title = $model->license_plate;

\yii\web\YiiAsset::register($this);


$query = BusRoute::find()->where(['bus_id'=>$model->bus_id]);
// foreach($query as $q){
//     echo $q->bus_route_id;echo "<br>";
//     $searchModel = new BusRouteSearch();
//     $dataProvider = $searchModel->search($q->bus_id);
//     echo json_encode($dataProvider);echo "<br>";
// }

$dataProvider = new ActiveDataProvider([
    'query' => $query,
]);
//  echo json_encode($dataProvider);
?>
<div class="bus-view">

    <h1><?= Html::encode($this->title) ?></h1><br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'bus_id',
            'license_plate',
            'no_of_seats',
            'pattern',
            
        ],
    ]) ?>
    <br>
    <h1>All Routes</h1><br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'bus_id',
                'label' => 'licence_plate',
                'value' => 'bus.license_plate',
            ],
          //  'bus_id',
          [
            'attribute' => 'route_id',
            'label' => 'from',
            'value' => 'route.from',
        ],
        [
            'attribute' => 'route_id',
            'label' => 'to',
            'value' => 'route.to',
        ],
       //     'route_id',
            'timing',
                       ['class' => 'yii\grid\ActionColumn',
                       'template' => '{leadVieww} {leadUpdatew}',
                       'buttons' => [
                        'leadVieww' => function ($url, $dataProvider) {
                            $url = Url::to(['bus/customerview', 'bus_route_id' => $dataProvider->bus_route_id,'route_id' => $dataProvider->route_id]);
                           return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => 'view']);
                        },
                        
                     ]],

        ],
    ]); 
    ?>

</div>
