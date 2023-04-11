<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string|null $auth_key
 * @property string|null $accessToken
 * @property string|null $fname
 * @property string|null $sname
 * @property string|null $lname
 * @property string|null $email
 * @property string $password_hash
 */
class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @return array[]
     */
    public function rules()
    {
        return [
            [['fname', 'sname', 'lname', 'email', 'username', 'auth_key','password_hash'], 'string', "max" => 255]
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'auth_key' => 'Name',
            'accessToken' => 'Name',
            'fname' => 'Имя',
            'sname' => 'Фамилия',
            'lname' => 'Отчество',
            'email' => 'Адрес почты',
            'password_hash' => 'Пароль',
            'password' => 'Пароль',
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne(['id'=>$id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['auth_key'=>$token]);

    }

    /**
     * @param $username
     * @return array|ActiveRecord|null
     */
    public static function findByUsername($username)
    {
        return static::find()->orWhere(['username' => $username])->orWhere(['email' => $username])->one();
    }


    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = \Yii::$app->security->generatePasswordHash($password);
    }
    public function setPassword_hash($password)
    {
        $this->password_hash = \Yii::$app->security->generatePasswordHash($password);
    }
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = \Yii::$app->security->generateRandomString();
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
         return $this->username ?: $this->email;
    }
}
