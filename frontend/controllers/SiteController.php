<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\models\Settings;
use backend\models\Menu;
use backend\models\Pages;
use yii\web\NotFoundHttpException;
use backend\models\Currency;
use common\models\User;
use common\models\BasicHelper;
use backend\models\CurrencyRates;
use frontend\modules\user\models\Orders;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
	return [
	    'access' => [
		'class' => AccessControl::className(),
		'only' => ['logout', 'signup', 'buycurrency', 'buysteptwo', 'buystepthree'],
		'rules' => [
		    [
			'actions' => ['signup'],
			'allow' => true,
			'roles' => ['?'],
		    ],
		    [
			'actions' => ['logout', 'buycurrency', 'buysteptwo', 'buystepthree'],
			'allow' => true,
			'roles' => ['@'],
		    ],
		],
	    ],
	];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
	return [
	    'error' => [
		'class' => 'yii\web\ErrorAction',
	    ],
	    'captcha' => [
		'class' => 'yii\captcha\CaptchaAction',
		'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
	    ],
	];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
	$menu = Menu::findOne(1);
	$settings = Settings::findOne(1);
	$slides = \backend\models\Slider::find()->where(['status' => 1])->all();
	$rates = CurrencyRates::getRates();
	$crypto = \backend\models\Currency::find()->where("status = 1")->orderBy('order_number ASC')->all();
	$currency = \backend\models\Currencies::find()->all();
	return $this->render('index', compact('menu', 'settings', 'slides', 'rates', 'crypto', 'currency'));
    }

    public function actionBuycurrency($currency) {
	$crypto_title = str_replace("-", " ", $currency);
	$crypto = Currency::findOne(['title' => $crypto_title]);
	if (empty($crypto)) {
	    throw new NotFoundHttpException('The requested page does not exist.');
	} else {
	    $currency = \backend\models\Currencies::find()->all();
	    $rates = CurrencyRates::getRates($crypto->id);
	    $model = new Orders();
	    $model->crypto_id = $crypto->id;
	    return $this->render('order', compact('currency', 'rates', 'model', 'crypto'));
	}
    }

    public function actionBuysteptwo() {
	$model = new Orders();
	if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
	    $settings = Settings::findOne(1);
	    $model->user_id = \Yii::$app->user->id;
	    $model->number = $model->generateNumber();
	    $model->date_create = time();
	    $model->status = 1;
	    $rate = CurrencyRates::findOne(['currency_id' => $model->currency_id, 'crypto_id' => $model->crypto_id]);
	    if (empty($rate)) {
		BasicHelper::sendResponse(200, ['status' => 'error', 'title' => 'Error', 'message' => 'We got system problem, please try again later']);
	    }
	    $model->rate = number_format($rate->rate * ($settings->procent / 100 + 1), 10, ".", "");
	    $model->summ_in = number_format($model->summ_out / $rate->rate, 10, ".", "");
	    if ($model->save()) {
		$code = rand(100000, 999999);
		$confirm_order = ['number' => $model->number, 'code' => $code];
		\Yii::$app->session['confirm_order'] = $confirm_order;
		\Yii::$app->mailer->compose(['html' => 'confirm_order'], ['model' => $model, 'code' => $code])
			->setTo(\Yii::$app->user->identity->email)
			->setFrom([$settings->email => "CryptoInvestmentWorld Team"])
			->setSubject("Confirm your order - Cryptoinvestmentworld")
			->send();
		BasicHelper::sendResponse(200, ['status' => 'success', 'message' => $this->renderPartial("_step_2", ['model' => $model])]);
	    } else {
		BasicHelper::sendResponse(200, ['status' => 'error', 'title' => 'Error', 'message' => BasicHelper::getErrorString($model->errors)]);
	    }
	} else {
	    BasicHelper::sendResponse(200, ['status' => 'error', 'title' => 'Error', 'message' => BasicHelper::getErrorString($model->errors)]);
	}
    }

    public function actionBuystepthree() {
	$confirm_order = \Yii::$app->session['confirm_order'];
	$number = \Yii::$app->request->post('Orders')['number'];
	if ($confirm_order['number'] == $number && $confirm_order['code'] == \Yii::$app->request->post('code')) {
	    $model = Orders::findOne(['number' => $number]);
	    if (!empty($model)) {
		$model->status = 2;
		$model->save();
		unset(\Yii::$app->session['confirm_order']);
		BasicHelper::sendResponse(200, ['status' => 'success', 'message' => $this->renderPartial("_step_3", ['model' => $model])]);
	    }
	} else {
	    BasicHelper::sendResponse(200, ['status' => 'error', 'title' => 'Error', 'message' => 'Your confirmation code is wrong']);
	}
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
	if (!Yii::$app->user->isGuest) {
	    return $this->goHome();
	}

	$model = new LoginForm();
	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	    $user = User::findByUsername($model->username);
	    if ($user->last_login_ip != \Yii::$app->request->userIP) {
		$code = rand(100000, 999999);
		$check_email = ['user' => $user->username, 'code' => $code, 'fails' => 0];
		\Yii::$app->session['checkemail'] = $check_email;
		$settings = Settings::findOne(1);
		\Yii::$app->mailer->compose(['html' => 'send_code'], ['model' => $user, 'code' => $code])
			->setTo($user->email)
			->setFrom([$settings->email => "CryptoInvestmentWorld Team"])
			->setSubject("Confirmation code - Cryptoinvestmentworld")
			->send();
		$email_arr = explode('@', $user->email);
		$email = substr($email_arr[0], 0, 1) . '***' . substr($email_arr[0], -1) . '@' . $email_arr[1];
		BasicHelper::sendResponse(200, ['status' => 'send-code', 'email' => $email]);
	    }
	    if ($model->login()) {
		BasicHelper::registerLogin();
		return $this->goBack();
	    }
	} else if (!empty($model->errors)) {
	    BasicHelper::sendResponse(200, ['status' => 'error', 'message' => BasicHelper::getErrorString($model->errors)]);
	}
	return $this->render('login', [
		    'model' => $model,
	]);
    }

    public function actionCheckcode() {
	$code = \Yii::$app->request->post('code');
	if ($code && isset(\Yii::$app->session['checkemail']['code']) && \Yii::$app->session['checkemail']['code'] == $code && \Yii::$app->session['checkemail']['fails'] < 5) {
	    $user = User::findByUsername(\Yii::$app->session['checkemail']['user']);
	    if (Yii::$app->user->login($user)) {
		BasicHelper::registerLogin();
		$user->last_login_ip = \Yii::$app->request->userIP;
		$user->last_login_info = \Yii::$app->request->userAgent;
		$user->save();
		return $this->goBack();
	    }
	} else if (!$code) {
	    BasicHelper::sendResponse(200, ['status' => 'error', 'message' => "Confirmation code can not be blank"]);
	} else if (\Yii::$app->session['checkemail']['fails'] >= 5) {
	    \Yii::$app->session['checkemail'] = [];
	    BasicHelper::sendResponse(200, ['status' => 'error', 'message' => "Confirmation code has been blocked. Please re-try " . \yii\helpers\Html::a("login", "/login") . " again"]);
	} else {
	    $fails = ++\Yii::$app->session['checkemail']['fails'];
	    \Yii::$app->session['checkemail'] = ['user' => \Yii::$app->session['checkemail']['user'], 'code' => \Yii::$app->session['checkemail']['code'], 'fails' => $fails];
	    BasicHelper::sendResponse(200, ['status' => 'error', 'message' => "Confirmation code is wrong."]);
	}
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionSignout() {
	$session = \frontend\models\UserLogins::updateAll(['session_finished' => 1], ['user_id' => \Yii::$app->user->id, 'session_id' => \Yii::$app->session->id]);
	Yii::$app->user->logout();
	return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
	$model = new ContactForm();
	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	    $settings = Settings::findOne(1);
	    if ($model->sendEmail($settings->email)) {
		BasicHelper::sendResponse(200, ['status' => 'success', 'title' => 'Message Sent', 'message' => 'Thank you for contacting us. We will respond to you as soon as possible.']);
	    } else {
		BasicHelper::sendResponse(200, ['status' => 'success', 'title' => 'Message Not Sent', 'message' => 'There was an error sending your message.']);
	    }
	} else if (!empty($model->errors)) {
	    BasicHelper::sendResponse(200, ['status' => 'success', 'title' => 'We got an error', 'message' => BasicHelper::getErrorString($model->errors)]);
	}
	return $this->redirect('contact.html');
    }

    public function actionPage($alias) {
	$settings = Settings::findOne(1);
	$menu = Menu::find()->where("url like '{$alias}%'")->one();
	$model = Pages::findOne(['alias' => $alias]);
	if (empty($model)) {
	    throw new NotFoundHttpException('The requested page does not exist.');
	}
	return $this->render(
			'page_view', compact("settings", 'menu', 'model')
	);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
	$model = new SignupForm();
	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	    if ($user = $model->signup()) {
		if (Yii::$app->getUser()->login($user)) {
		    BasicHelper::registerLogin();
		    $this->redirect("/verification?send=1");
		}
	    }
	}

	return $this->render('signup', [
		    'model' => $model,
	]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
	$model = new PasswordResetRequestForm();
	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	    if ($model->sendEmail()) {
		Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

		return $this->goHome();
	    } else {
		Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
	    }
	}

	return $this->render('requestPasswordResetToken', [
		    'model' => $model,
	]);
    }

    public function actionVerification() {
	$id = Yii::$app->request->get("id");
	$key = Yii::$app->request->get("key");
	if ($id && $key) {
	    $user = \common\models\User::find()->where([
			'id' => $id,
			'auth_key' => $key,
		    ])->one();
	    if (!empty($user)) {
		if (!$user->verified) {
		    $user->verified = 1;
		    $user->save();
		    Yii::$app->getSession()->setFlash('success', "Email {$user->email} has been verified successfully!");
		} else {
		    Yii::$app->getSession()->setFlash('warning', "Email {$user->email} is already verified! Please, just use your login data to continue");
		}
	    } else {
		Yii::$app->getSession()->setFlash('danger', "User doesn't found. Please Check your verification link!");
	    }
	    return $this->redirect("/user/dashboard");
	} else if (\Yii::$app->request->get('send')) {
	    SignupForm::sendVerifyEmail();
	    $this->redirect('verification');
	}
	if (\Yii::$app->user->isGuest) {
	    $this->redirect('/login');
	}
	return $this->render('verification');
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
	try {
	    $model = new ResetPasswordForm($token);
	} catch (InvalidParamException $e) {
	    throw new BadRequestHttpException($e->getMessage());
	}

	if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
	    Yii::$app->session->setFlash('success', 'New password saved.');

	    return $this->goHome();
	}

	return $this->render('resetPassword', [
		    'model' => $model,
	]);
    }

}
