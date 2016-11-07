<?php namespace app\components;

use app\models\User;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class AdminLogin extends Model
{

    public $username;
    public $email;
    public $password;
    public $rememberMe = true;
    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'email'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) 
        {
            $user = $this->getUser();
            if ($user != NULL) 
            {
                if ($user->IsActive != 0) 
                {
                        if (!$user || !$user->verifyPassword($this->password)) 
                        {
                            $this->addError($attribute, 'Incorrect username or password.');
                        }
                } 
                else 
                {
                    $this->addError($attribute, 'Account Blocked.');
                }
            } 
            else 
            {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->_user, $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) 
        {
            if(strpos($this->email, '@') == -1)
            {
                $this->_user = User::findByEmail($this->email);
            }
            else
            {
                $this->_user = User::findByUsername($this->email);
            }
        }
        return $this->_user;
    }
}
