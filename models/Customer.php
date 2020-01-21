<?php

namespace app\models;


use Yii;
use yii\helpers\Security;

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

    public $password_repeat;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email_id', 'password', 'password_repeat'], 'required'],
            [['customer_id', 'user_id', 'phone_no', 'e_wallet'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name'], 'string', 'max' => 40],
            ['phone_no','match', 'pattern' => '/^\d{10}$/', 'message' => 'Please Enter A Valid Phone No'],
            ['email_id', 'email'],
            [['password'], 'string', 'max' => 100],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"],
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
            'password_repeat' => 'Confirm Password',
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
    public function getCustomer()
    {
        return $this->hasOne(User::className(), ['customer_id' => 'customer_id']);
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
