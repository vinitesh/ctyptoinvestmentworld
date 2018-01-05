<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $reCaptcha;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            //['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
	    
	    ['reCaptcha', \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6Ledyj0UAAAAADfflZZ1w6uKjOZ0bhg3u2fzPVvt']
        ];
    }
    
    public function attributeLabels() {
	return [
	    'reCaptcha' => '',
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
            return null;
        }
        
        $user = new User();
        $user->username = $this->email;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
	$user->password_reset_token = \Yii::$app->security->generateRandomString();
        
        return $user->save() ? $user : null;
    }
    
    public static function sendVerifyEmail() {
	$settings = \backend\models\Settings::findOne(1);
	return \Yii::$app->mailer->compose(['html' => 'verification'])
		    ->setTo(\Yii::$app->user->identity->email)
		    ->setFrom([$settings->email => "CryptoInvestmentWorld Team"])
			->setSubject("Email Verification - Cryptoinvestmentworld")		    
		    ->send();
    }
}
