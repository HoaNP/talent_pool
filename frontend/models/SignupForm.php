<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use yii\db\BaseActiveRecord;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $role;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],

            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['role'], 'integer'],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            var_dump($this->getErrors());
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->role = $this->role;
        $user->setPassword($this->password);

        $user->generateAuthKey();
//        var_dump(gettype($user->role));
//        var_dump($user->role);
//        var_dump($user->getErrors());
//        $user->save(false);
        if ($user->save()) {
            return $user;
        }
        else {
//            var_dump(gettype($user->role));
//            var_dump($user->role);
//            var_dump($user->getErrors());
        }

        return $user->save() ? $user : null;
    }


}
