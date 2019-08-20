<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bus_seats".
 *
 * @property int $bus_seat_id
 * @property int $bus_id
 * @property int $seat_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property Bus $bus
 * @property Seats $seat
 */
class BusSeats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bus_seats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bus_id', 'seat_id'], 'required'],
            [['bus_id', 'seat_id'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['bus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bus::className(), 'targetAttribute' => ['bus_id' => 'bus_id']],
            [['seat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seats::className(), 'targetAttribute' => ['seat_id' => 'seat_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bus_seat_id' => 'Bus Seat ID',
            'bus_id' => 'Bus ID',
            'seat_id' => 'Seat ID',
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
    public function getSeat()
    {
        return $this->hasOne(Seats::className(), ['seat_id' => 'seat_id']);
    }
}
