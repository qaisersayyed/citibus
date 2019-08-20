<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bus_type".
 *
 * @property int $bus_type_id
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property RouteStopType[] $routeStopTypes
 */
class BusType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bus_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['type'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bus_type_id' => 'Bus Type ID',
            'type' => 'Type',
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
        return $this->hasMany(RouteStopType::className(), ['bus_type_id' => 'bus_type_id']);
    }
}
