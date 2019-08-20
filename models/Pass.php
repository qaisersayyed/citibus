<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pass".
 *
 * @property int $pass_id
 * @property int $customer_id
 * @property int $route_id
 * @property string $start_date
 * @property string $end_date
 * @property int $up
 * @property int $down
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property Customer $customer
 * @property Route $route
 * @property PassRide[] $passRides
 */
class Pass extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pass';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'route_id', 'start_date', 'end_date', 'up', 'down'], 'required'],
            [['customer_id', 'route_id', 'up', 'down'], 'integer'],
            [['start_date', 'end_date', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'customer_id']],
            [['route_id'], 'exist', 'skipOnError' => true, 'targetClass' => Route::className(), 'targetAttribute' => ['route_id' => 'route_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pass_id' => 'Pass ID',
            'customer_id' => 'Customer ID',
            'route_id' => 'Route ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'up' => 'Up',
            'down' => 'Down',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
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
    public function getRoute()
    {
        return $this->hasOne(Route::className(), ['route_id' => 'route_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPassRides()
    {
        return $this->hasMany(PassRide::className(), ['pass_id' => 'pass_id']);
    }
}
