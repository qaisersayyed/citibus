<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RouteStopType;

/**
 * RouteStopTypeSearch represents the model behind the search form of `app\models\RouteStopType`.
 */
class RouteStopTypeSearch extends RouteStopType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['route_stop_type_id', 'fare'], 'integer'],
            [['created_at','stop_id', 'stop_order','route_id', 'bus_type_id','updated_at', 'deleted_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RouteStopType::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('stop');
        $query->joinWith('busType');
        $query->joinWith('route');
        // grid filtering conditions
        $query->andFilterWhere([
            'stop_order' => $this->stop_order,
            'route_stop_type_id' => $this->route_stop_type_id,
            'route_id' => $this->route_id,
            'stop_id' => $this->stop_id,
            'bus_type_id' => $this->bus_type_id,
            'fare' => $this->fare,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);
        $query->andFilterWhere(['like', 'stop.stop_name', $this->stop_id]);
        $query->andFilterWhere(['like', 'busType.type', $this->bus_type_id]);
        $query->andFilterWhere(['like', 'route.from', $this->route_id]);
        $query->andFilterWhere(['like', 'route.to', $this->route_id]);
        return $dataProvider;
    }
}
