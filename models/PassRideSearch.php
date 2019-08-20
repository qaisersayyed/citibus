<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PassRide;

/**
 * PassRideSearch represents the model behind the search form of `app\models\PassRide`.
 */
class PassRideSearch extends PassRide
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pass_ride_id', 'pass_id', 'bus_route_id'], 'integer'],
            [['ride_time', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = PassRide::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'pass_ride_id' => $this->pass_ride_id,
            'pass_id' => $this->pass_id,
            'bus_route_id' => $this->bus_route_id,
            'ride_time' => $this->ride_time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        return $dataProvider;
    }
}
