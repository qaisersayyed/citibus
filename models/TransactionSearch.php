<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transaction;

/**
 * TransactionSearch represents the model behind the search form of `app\models\Transaction`.
 */
class TransactionSearch extends Transaction
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaction_id', 'bus_route_id', 'customer_id', 'route_stop_type_id', 'ticket_id', 'amount', 'status'], 'integer'],
            [['seat_code', 'order_id', 'txn_id','date', 'creted_at', 'updated_at'], 'safe'],
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
        $query = Transaction::find();

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
            'transaction_id' => $this->transaction_id,
            'bus_route_id' => $this->bus_route_id,
            'customer_id' => $this->customer_id,
            'route_stop_type_id' => $this->route_stop_type_id,
            'ticket_id' => $this->ticket_id,
            'txn_id' => $this->txn_id,
            'amount' => $this->amount,
            'status' => $this->status,
            'creted_at' => $this->creted_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'seat_code', $this->seat_code])
            ->andFilterWhere(['like', 'order_id', $this->order_id])
            ->andFilterWhere(['like', 'date', $this->date]);

        return $dataProvider;
    }
}
