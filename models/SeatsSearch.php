<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Seats;

/**
 * SeatsSearch represents the model behind the search form of `app\models\Seats`.
 */
class SeatsSearch extends Seats
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seat_id'], 'integer'],
            [['seat_code', 'seat_name', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = Seats::find();

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
            'seat_id' => $this->seat_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'seat_code', $this->seat_code])
            ->andFilterWhere(['like', 'seat_name', $this->seat_name]);

        return $dataProvider;
    }
}
