<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BusSeats;

/**
 * BusSeatsSearch represents the model behind the search form of `app\models\BusSeats`.
 */
class BusSeatsSearch extends BusSeats
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bus_seat_id', 'bus_id', 'seat_id'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = BusSeats::find();

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
            'bus_seat_id' => $this->bus_seat_id,
            'bus_id' => $this->bus_id,
            'seat_id' => $this->seat_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        return $dataProvider;
    }
}
