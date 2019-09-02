<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seats".
 *
 * @property int $seat_id
 * @property string $seat_code
 * @property string $seat_name
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property BusSeats[] $busSeats
 */
class Seats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seat_code', 'seat_name'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['seat_code', 'seat_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'seat_id' => 'Seat ID',
            'seat_code' => 'Seat Code',
            'seat_name' => 'Seat Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusSeats()
    {
        return $this->hasMany(BusSeats::className(), ['seat_id' => 'seat_id']);
    }
}
