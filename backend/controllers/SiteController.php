<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Currencies;
use backend\models\Currency;
use backend\models\CurrencyRates;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'updaterate'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionUpdaterate() {
	$currency = Currencies::find()->all();
	if (!empty($currency)) {
	    $currency_list = [];
	    foreach ($currency as $item) {
		array_push($currency_list, $item->iso_code);
	    }
	    $currecy_string = implode(",", $currency_list);
	    $crypto = Currency::findAll(['status' => 1]);
	    if (!empty($crypto)) {
		foreach ($crypto as $cr) {
		    $url = "https://min-api.cryptocompare.com/data/price?fsym={$cr->short_title}&tsyms={$currecy_string}";
		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    $data = curl_exec($ch);
		    curl_close($ch);
		    $data = json_decode($data);		    
		    if (!empty($data)) {
			foreach ($currency as $item) {
			    $code = $item->iso_code;
			    $model = new CurrencyRates();
			    $model->currency_id = $item->id;
			    $model->crypto_id = $cr->id;
			    $model->rate = $data->$code;
			    $model->datetime = time();
			    $model->save();			    
			}
		    }
		}
	    }
	}
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect("/menu");
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {	    
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
