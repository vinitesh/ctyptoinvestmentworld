<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "currency_rates".
 *
 * @property integer $id
 * @property integer $currency_id
 * @property string $rate
 * @property integer $datetime
 */
class CurrencyRates extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
	return 'currency_rates';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['currency_id', 'rate', 'datetime'], 'required'],
	    [['currency_id', 'datetime'], 'integer'],
	    [['rate'], 'number'],
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => 'ID',
	    'currency_id' => 'Currency ID',
	    'rate' => 'Rate',
	    'datetime' => 'Datetime',
	];
    }

    public function getCurrency() {
	return $this->hasOne(Currencies::className(), ['id' => 'currency_id']);
    }

    public function getCrypto() {
	return $this->hasOne(Currency::className(), ['id' => 'crypto_id']);
    }

    public static function getRates($crypto_id = false, $currency_id = false) {
	$settings = Settings::findOne(1);
	$procent = $settings->procent / 100 + 1;
	$params = [];
	if (!$crypto_id && !$currency_id) {
	    $model = self::find()->all();
	} else {
	    if ($crypto_id) {
		$params['crypto_id'] = $crypto_id; 
	    } else if ($currency_id) {
		$params['currency_id'] = $currency_id; 
	    }
	    $model = self::findAll($params);
	}
	$rates = [];	
	if (!empty($model)) {
	    foreach ($model as $item) {
		if (!isset($rates[$item->currency->iso_code])) {
		    $rates[$item->currency->iso_code] = [];
		}
		$rates[$item->currency->iso_code][$item->crypto->letter] = $item->rate * $procent;
	    }
	}
	return $rates;
    }

}
