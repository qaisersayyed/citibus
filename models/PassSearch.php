<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pass;

/**
 * PassSearch represents the model behind the search form of `app\models\Pass`.
 */
class PassSearch extends Pass
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pass_id', 'customer_id', 'route_id', 'up', 'down'], 'integer'],
            [['start_date', 'end_date', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = Pass::find();

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
            'pass_id' => $this->pass_id,
            'customer_id' => $this->customer_id,
            'route_id' => $this->route_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'up' => $this->up,
            'down' => $this->down,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        return $dataProvider;
    }
}
