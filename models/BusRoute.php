<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bus_route".
 *
 * @property int $bus_route_id
 * @property int $bus_id
 * @property int $route_id
 * @property string $timing
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property Bus $bus
 * @property Route $route
 * @property PassRide[] $passRides
 * @property Tickets[] $tickets
 */
class BusRoute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bus_route';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bus_id', 'route_id', 'timing'], 'required'],
            [['bus_id', 'route_id'], 'integer'],
            [['timing', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['bus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bus::className(), 'targetAttribute' => ['bus_id' => 'bus_id']],
            [['route_id'], 'exist', 'skipOnError' => true, 'targetClass' => Route::className(), 'targetAttribute' => ['route_id' => 'route_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bus_route_id' => 'Bus Route ID',
            'bus_id' => 'Bus ID',
            'route_id' => 'Route ID',
            'timing' => 'Timing',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBus()
    {
        return $this->hasOne(Bus::className(), ['bus_id' => 'bus_id']);
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
    public function getPassRides()
    {
        return $this->hasMany(PassRide::className(), ['bus_route_id' => 'bus_route_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::className(), ['bus_route_id' => 'bus_route_id']);
    }
}
