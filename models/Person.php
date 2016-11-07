<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Person".
 *
 * @property integer $PersonID
 * @property string $FirstName
 * @property string $LastName
 * @property string $Type
 * @property string $ContactNum
 * @property string $Address
 * @property string $UserName
 * @property string $Password
 * @property string $PasswordHash
 * @property string $Email
 * @property integer $PrivilegeID
 * @property integer $IsSubscribed
 * @property integer $IsActive
 */
class Person extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FirstName', 'LastName', 'UserName', 'Password', 'Email', 'PrivilegeID'], 'required'],
            [['Address'], 'string'],
            [['PrivilegeID'], 'integer'],
            [['FirstName', 'LastName', 'UserName', 'Email'], 'string', 'max' => 30],
            [['Type', 'ContactNum'], 'string', 'max' => 20],
            [['Password', 'PasswordHash'], 'string', 'max' => 55],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PersonID' => 'Person ID',
            'FirstName' => 'First Name',
            'LastName' => 'Last Name',
            'Type' => 'Type',
            'ContactNum' => 'Contact Num',
            'Address' => 'Address',
            'UserName' => 'User Name',
            'Password' => 'Password',
            'PasswordHash' => 'Password Hash',
            'Email' => 'Email',
            'PrivilegeID' => 'Privilege ID',
            'IsSubscribed' => 'Is Subscribed',
            'IsActive' => 'Is Active',
        ];
    }

    public function verifyPassword($password)
    {
        if($this->Password == $password)
            return true;
        else
            return false;
    }

    public static function findByUsername($username)
    {
        $data = Person::find()->where(['UserName' => $username])->one();
        if(isset($data))
        {
            return $data;
        }
        else
        {
            return NULL;
        }
    }

    public static function findByEmail($email)
    {
        $data = Person::find()->where(['Email' => $email])->one();
        if(isset($data))
        {
            return $data;
        }
        else
        {
            return NULL;
        }
    }

    public static function findIdentity($id)
    {
        $data = Person::find()->where(['PersonID' => $id])->one();
        if(isset($data))
        {
            return $data;
        }
        else
        {
            return NULL;
        }
    }

    public function getId()
    {
        return $this->PersonID;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }
}
