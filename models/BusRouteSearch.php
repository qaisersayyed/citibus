<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BusRoute;

/**
 * BusRouteSearch represents the model behind the search form of `app\models\BusRoute`.
 */
class BusRouteSearch extends BusRoute
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bus_route_id', 'bus_id', 'route_id'], 'integer'],
            [['timing', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = BusRoute::find();

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
        $query->joinWith('bus');
        $query->joinWith('route');

        // grid filtering conditions
        $query->andFilterWhere([
            'bus_route_id' => $this->bus_route_id,
            'bus_id' => $this->bus_id,
            'route_id' => $this->route_id,
            'timing' => $this->timing,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);
        $query->andFilterWhere(['like', 'bus.license_plate', $this->bus_id]);
        $query->andFilterWhere(['like', 'route.form', $this->route_id]);
        $query->andFilterWhere(['like', 'route.to', $this->route_id]);
        return $dataProvider;
    }
}
