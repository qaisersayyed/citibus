<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BusEmployee;

/**
 * BusEmployeeSearch represents the model behind the search form of `app\models\BusEmployee`.
 */
class BusEmployeeSearch extends BusEmployee
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bus_employee_id', 'bus_id', 'employee_id', 'deleted_at'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
        $query = BusEmployee::find();

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
            'bus_employee_id' => $this->bus_employee_id,
            'bus_id' => $this->bus_id,
            'employee_id' => $this->employee_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        return $dataProvider;
    }
}
