<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "route_stop_type".
 *
 * @property int $route_stop_type_id
 * @property int $route_id
 * @property int $stop_id
 * @property int $bus_type_id
 * @property int $fare
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property BusType $busType
 * @property Route $route
 * @property Stops $stop
 * @property Tickets[] $tickets
 */
class RouteStopType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'route_stop_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['route_id', 'stop_id', 'bus_type_id', 'fare'], 'required'],
            [['route_id', 'stop_id', 'bus_type_id', 'fare','stop_order'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['bus_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => BusType::className(), 'targetAttribute' => ['bus_type_id' => 'bus_type_id']],
            [['route_id'], 'exist', 'skipOnError' => true, 'targetClass' => Route::className(), 'targetAttribute' => ['route_id' => 'route_id']],
            [['stop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stops::className(), 'targetAttribute' => ['stop_id' => 'stop_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'route_stop_type_id' => 'Route Stop Type ID',
            'route_id' => 'Route ID',
            'stop_id' => 'Stop ID',
            'bus_type_id' => 'Bus Type ID',
            'fare' => 'Fare',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusType()
    {
        return $this->hasOne(BusType::className(), ['bus_type_id' => 'bus_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoute()
    {
        return $this->hasOne(Route::className(), ['route_id' => 'route_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStop()
    {
        return $this->hasOne(Stops::className(), ['stop_id' => 'stop_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::className(), ['route_stop_type_id' => 'route_stop_type_id']);
    }
}
