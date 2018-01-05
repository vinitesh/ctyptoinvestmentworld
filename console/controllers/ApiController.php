<?php

namespace console\controllers;

use yii\console\Controller;
use backend\models\Currencies;
use backend\models\Currency;
use backend\models\CurrencyRates;
use common\models\BasicHelper;

/**
 * Test controller
 */
class ApiController extends Controller {

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
			    if (isset($data->$code)) {	
				CurrencyRates::deleteAll(['currency_id' => $item->id, 'crypto_id' => $cr->id]);
				$model = new CurrencyRates();
				$model->currency_id = $item->id;
				$model->crypto_id = $cr->id;
				$model->rate = $data->$code;
				$model->datetime = time();
				if (!$model->save()) {
				    echo BasicHelper::getErrorString($model->errors) . PHP_EOL;
				}
			    } else {
				echo "Currency rate for {$code} is missing".PHP_EOL;
			    }
			}
		    }
		}
	    }
	}
	echo 'Cron finished successfully' . PHP_EOL;
    }

}
