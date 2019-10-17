<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property int $transaction_id
 * @property int $bus_route_id
 * @property int $customer_id
 * @property int $route_stop_type_id
 * @property string $seat_code
 * @property int $ticket_id
 * @property string $order_id
 * @property int $amount
 * @property string $date
 * @property int $status
 * @property string $creted_at
 * @property string $updated_at
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bus_route_id', 'customer_id', 'route_stop_type_id', 'ticket_id', 'amount', 'status'], 'integer'],
            [['creted_at', 'updated_at'], 'safe'],
            [['seat_code'], 'string', 'max' => 10],
            [['order_id'], 'string', 'max' => 30],
            [['date'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'transaction_id' => 'Transaction ID',
            'bus_route_id' => 'Bus Route ID',
            'customer_id' => 'Customer ID',
            'route_stop_type_id' => 'Route Stop Type ID',
            'seat_code' => 'Seat Code',
            'ticket_id' => 'Ticket ID',
            'order_id' => 'Order ID',
            'amount' => 'Amount',
            'date' => 'Date',
            'status' => 'Status',
            'creted_at' => 'Creted At',
            'updated_at' => 'Updated At',
        ];
    }
}
