<?php

namespace app\modules\user\models;

use Yii;
use yii\base\Model;



class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;

    public $password_confirm;

    private $user;

    public function setUser($user)
    {
        $this->user = $user;
        $this->username = $user->username;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            [['username','email','password','password_confirm'], 'required'],
            ['email', 'email'],
            ['username', 'unique',
                'targetClass'=>'app\modules\user\models\User',
                'message' => '此用户名已经被注册',
                'filter' => function ($query) {
                    $query->andWhere(['not', ['id' => Yii::$app->user->getId()]]);
                }
            ],
            ['email', 'unique',
                'targetClass'=>'app\modules\user\models\User',
                'message' => '此邮箱已经被注册',
                'filter' => function ($query) {
                    $query->andWhere(['not', ['id' => Yii::$app->user->getId()]]);
                }
            ],
            ['username', 'string', 'min' => 1, 'max' => 255],
            ['password', 'string', 'min' => 6, 'max' => 18],
            [['password_confirm'], 'compare', 'compareAttribute' => 'password'],

        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'email' => '邮箱',
            'username' => '用户名',
            'password'=>'密码',
            'password_confirm'=>'确认密码'
        ];
    }


    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->save();
            $user->afterSignup();
            return $user;
        }

        return null;
    }
}
