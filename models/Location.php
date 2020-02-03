<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $location_id
 * @property string $lat
 * @property string $lon
 * @property int $bus_employee_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property BusEmployee $busEmployee
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lat', 'lon', 'bus_employee_id'], 'required'],
            [['lat', 'lon'], 'string'],
            [['bus_employee_id'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['bus_employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => BusEmployee::className(), 'targetAttribute' => ['bus_employee_id' => 'bus_employee_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'location_id' => 'Location ID',
            'lat' => 'Lat',
            'lon' => 'Lon',
            'bus_employee_id' => 'Bus Employee ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusEmployee()
    {
        return $this->hasOne(BusEmployee::className(), ['bus_employee_id' => 'bus_employee_id']);
    }
}
