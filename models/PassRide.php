<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pass_ride".
 *
 * @property int $pass_ride_id
 * @property int $pass_id
 * @property int $bus_route_id
 * @property string $ride_time
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property BusRoute $busRoute
 * @property Pass $pass
 */
class PassRide extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pass_ride';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pass_id', 'bus_route_id'], 'required'],
            [['pass_id', 'bus_route_id'], 'integer'],
            [['ride_time', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['bus_route_id'], 'exist', 'skipOnError' => true, 'targetClass' => BusRoute::className(), 'targetAttribute' => ['bus_route_id' => 'bus_route_id']],
            [['pass_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pass::className(), 'targetAttribute' => ['pass_id' => 'pass_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pass_ride_id' => 'Pass Ride ID',
            'pass_id' => 'Pass ID',
            'bus_route_id' => 'Bus Route ID',
            'ride_time' => 'Ride Time',
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
    public function getPass()
    {
        return $this->hasOne(Pass::className(), ['pass_id' => 'pass_id']);
    }
}
