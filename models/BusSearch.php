<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bus;

/**
 * BusSearch represents the model behind the search form of `app\models\Bus`.
 */
class BusSearch extends Bus
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bus_id', 'no_of_seats','status'], 'integer'],
            [['license_plate', 'pattern', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = Bus::find();

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
            'bus_id' => $this->bus_id,
            'status' => $this->status,
            'no_of_seats' => $this->no_of_seats,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'license_plate', $this->license_plate])
            ->andFilterWhere(['like', 'pattern', $this->pattern]);

        return $dataProvider;
    }
}
