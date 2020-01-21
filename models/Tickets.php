<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tickets".
 *
 * @property int $ticket_id
 * @property int $customer_id
 * @property int $bus_route_id
 * @property int $route_stop_type_id
 * @property string $seat_code
 * @property string $seat_name
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property BusRoute $busRoute
 * @property Customer $customer
 * @property RouteStopType $routeStopType
 */
class Tickets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            
            [['customer_id', 'bus_route_id', 'route_stop_type_id', 'seat_code', 'fare'], 'required'],
            [['customer_id', 'bus_route_id', 'route_stop_type_id'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at','status'], 'safe'],
            [['seat_code'], 'string', 'max' => 10],
           
            [['bus_route_id'], 'exist', 'skipOnError' => true, 'targetClass' => BusRoute::className(), 'targetAttribute' => ['bus_route_id' => 'bus_route_id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'customer_id']],
            [['route_stop_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => RouteStopType::className(), 'targetAttribute' => ['route_stop_type_id' => 'route_stop_type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ticket_id' => 'Ticket ID',
            'customer_id' => 'Customer ID',
            'bus_route_id' => 'Bus Route ID',
            'route_stop_type_id' => 'Route Stop Type ID',
            'seat_code' => 'Seat Code',
            'fare' => 'Fare',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusRoute()
    {
        return $this->hasOne(BusRoute::className(), ['bus_route_id' => 'bus_route_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRouteStopType()
    {
        return $this->hasOne(RouteStopType::className(), ['route_stop_type_id' => 'route_stop_type_id']);
    }
}
