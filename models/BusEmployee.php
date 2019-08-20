<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bus_employee".
 *
 * @property int $bus_employee_id
 * @property int $bus_id
 * @property int $employee_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $deleted_at
 *
 * @property Bus $bus
 * @property Employee $employee
 */
class BusEmployee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bus_employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bus_id', 'employee_id'], 'required'],
            [['bus_id', 'employee_id', 'deleted_at'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['bus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bus::className(), 'targetAttribute' => ['bus_id' => 'bus_id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bus_employee_id' => 'Bus Employee ID',
            'bus_id' => 'Bus ID',
            'employee_id' => 'Employee ID',
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
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }
}
