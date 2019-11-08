<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\web\IdentityInterface;
use yii\helpers\Security;
/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $username
 * @property string $password
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property Customer[] $customers
 * @property Employee[] $employees
 */

class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public $type = "";
    public static function tableName()
    {
        return 'users';
    }

    public $password_repeat;
    
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email_id', 'password', 'password_repeat'], 'required'],
            [['created_at', 'updated_at', 'deleted_at', 'type'], 'safe'],
            [['email_id','email']],
            [['password'], 'string', 'max' => 20],
            [['password_repeat'],'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'email_id' => 'E-mail',
            'password' => 'Password',
            'password_repeat' => 'Confirm Password',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['user_id' => 'user_id']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return null;
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public static function findByEmail($email_id)
    {
        return Users::find()->where(['email_id' => $email_id])->one();
    }
}
