<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bus".
 *
 * @property int $bus_id
 * @property string $license_plate
 * @property int $no_of_seats
 * @property string $pattern
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property BusEmployee[] $busEmployees
 * @property BusRoute[] $busRoutes
 * @property BusSeats[] $busSeats
 */
class Bus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['license_plate', 'no_of_seats', 'pattern'], 'required'],
            [['no_of_seats'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['license_plate'], 'string', 'max' => 15],
            [['pattern'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bus_id' => 'Bus ID',
            'license_plate' => 'License Plate',
            'no_of_seats' => 'No Of Seats',
            'pattern' => 'Pattern',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusEmployees()
    {
        return $this->hasMany(BusEmployee::className(), ['bus_id' => 'bus_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusRoutes()
    {
        return $this->hasMany(BusRoute::className(), ['bus_id' => 'bus_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusSeats()
    {
        return $this->hasMany(BusSeats::className(), ['bus_id' => 'bus_id']);
    }
}
