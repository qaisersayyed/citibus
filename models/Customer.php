<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $customer_id
 * @property int $user_id
 * @property string $name
 * @property int $phone_no
 * @property string $email_id
 * @property string $password
 * @property int $e_wallet
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property User $user
 * @property Pass[] $passes
 * @property Tickets[] $tickets
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'phone_no', 'email_id', 'password', 'e_wallet'], 'required'],
            [['user_id', 'phone_no', 'e_wallet'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name'], 'string', 'max' => 40],
            [['email_id'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 20],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'phone_no' => 'Phone No',
            'email_id' => 'Email ID',
            'password' => 'Password',
            'e_wallet' => 'E Wallet',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPasses()
    {
        return $this->hasMany(Pass::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::className(), ['customer_id' => 'customer_id']);
    }
}
