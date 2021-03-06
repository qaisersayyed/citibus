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
            [['pass_id', 'customer_id', 'route_id', 'up_down','fare'], 'integer'],
            [['start_date', 'end_date', 'created_at', 'updated_at', 'deleted_at','txn_date','order_id','txn_id','status'], 'safe'],
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
            'txn_date' => $this->txn_date,
            'pass_id' => $this->pass_id,
            'order_id' => $this->order_id,
            'status' => $this->status,
            'txn_id' => $this->txn_id,
            'customer_id' => $this->customer_id,
            'route_id' => $this->route_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'up_down' => $this->up_down,
            'fare' => $this->fare,
            // 'down' => $this->down,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        return $dataProvider;
    }
}
