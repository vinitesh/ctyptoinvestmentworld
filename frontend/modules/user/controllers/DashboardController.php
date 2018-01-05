<?php

namespace frontend\modules\user\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use frontend\modules\user\models\Orders;
use backend\models\Settings;

/**
 * Default controller for the `user` module
 */
class DashboardController extends Controller {

    public function behaviors() {
	return [
	    'access' => [
		'class' => AccessControl::className(),
		'only' => ['index'],
		'rules' => [
		    [
			'actions' => ['index'],
			'allow' => true,
			'roles' => ['@'],
		    ],
		],
	    ],
	];
    }

    public function beforeAction($action) {	
	if (!Yii::$app->user->identity->verified) {
	    $this->redirect('/verification');
	    return FALSE;
	}
	return parent::beforeAction($action);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
	
	$orders_count = Orders::find()->where(['user_id' => \Yii::$app->user->id])->count();
	$total_orders = Orders::find()->where(['user_id' => \Yii::$app->user->id])->sum('summ_out');
	$crypto_table = Orders::find()->select("*, SUM(summ_in) as summ_in")->where(['user_id' => \Yii::$app->user->id])->groupBy('crypto_id')->all();
	$rates = \backend\models\CurrencyRates::find()->all();
	$settings = Settings::findOne(1);
	$procent = $settings->procent / 100 + 1;
	$currant_rates = [];
	foreach ($rates as $item) {
	    if (!isset($currant_rates[$item->crypto_id])) {
		$currant_rates[$item->crypto_id] = [];
	    }
	    $currant_rates[$item->crypto_id][$item->currency_id] = $item->rate*$procent;
	}
        return $this->render('index', [
	    'crypto_table' => $crypto_table,
	    'orders_count' => $orders_count,
	    'total_orders' => $total_orders,
	    'currant_rates' => $currant_rates
        ]);
    }

}
