<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $employee_id
 * @property int $user_id
 * @property string $name
 * @property string $role
 * @property int $phone_no
 * @property string $license_no
 * @property int $aadhar_card_no
 * @property string $address
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property BusEmployee[] $busEmployees
 * @property User $user
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'name', 'role', 'phone_no', 'license_no', 'aadhar_card_no', 'address'], 'required'],
            [['user_id', 'phone_no', 'aadhar_card_no'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at','user_id'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['role', 'license_no'], 'string', 'max' => 15],
            [['address'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Employee ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'role' => 'Role',
            'phone_no' => 'Phone No',
            'license_no' => 'License No',
            'aadhar_card_no' => 'Aadhar Card No',
            'address' => 'Address',
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
        return $this->hasMany(BusEmployee::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
