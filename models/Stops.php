<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stops".
 *
 * @property int $stop_id
 * @property string $stop_name
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property RouteStopType[] $routeStopTypes
 */
class Stops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stop_name','stop_order'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['stop_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'stop_order' => 'Stop order',
            'stop_id' => 'Stop ID',
            'stop_name' => 'Stop Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRouteStopTypes()
    {
        return $this->hasMany(RouteStopType::className(), ['stop_id' => 'stop_id']);
    }
}
