<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "route".
 *
 * @property int $route_id
 * @property string $from
 * @property string $to
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property BusRoute[] $busRoutes
 * @property Pass[] $passes
 * @property RouteStopType[] $routeStopTypes
 */
class Route extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'route';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from', 'to'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['from', 'to'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'route_id' => 'Route ID',
            'from' => 'From',
            'to' => 'To',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusRoutes()
    {
        return $this->hasMany(BusRoute::className(), ['route_id' => 'route_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPasses()
    {
        return $this->hasMany(Pass::className(), ['route_id' => 'route_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRouteStopTypes()
    {
        return $this->hasMany(RouteStopType::className(), ['route_id' => 'route_id']);
    }
}
