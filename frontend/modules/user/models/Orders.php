<?php

namespace frontend\modules\user\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $number
 * @property string $wallet_number
 * @property integer $user_id
 * @property integer $currency_id
 * @property integer $crypto_id
 * @property string $summ_out
 * @property string $summ_in
 * @property string $rate
 * @property integer $date_create
 */
class Orders extends \yii\db\ActiveRecord {

    public $rate_today;
    /**
     * @inheritdoc
     */
    public static function tableName() {
	return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['wallet_number', 'currency_id', 'crypto_id', 'summ_out'], 'required'],
	    [['user_id', 'currency_id', 'crypto_id', 'date_create', 'status'], 'integer'],
	    [['summ_out', 'summ_in', 'rate'], 'number'],
	    [['number', 'wallet_number'], 'string', 'max' => 128],
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => 'ID',
	    'user_id' => 'User',
	    'number' => 'Order Number',
	    'wallet_number' => 'Wallet Number',
	    'user_id' => 'User ID',
	    'currency_id' => 'Currency',
	    'crypto_id' => 'Crypto',
	    'summ_out' => 'Amount',
	    'summ_in' => 'Amount',
	    'rate' => 'Rate',
	    'date_create' => 'Order Date',
	    'status' => 'Status',
	];
    }

    public function generateNumber() {
	while (0 < 1) {
	    $number = strtoupper(\Yii::$app->security->generateRandomString(12));
	    if (!self::find()->where(['number' => $number])->exists()) {
		return $number;
	    }
	}
    }
    
    public function getCurrency() {
	return $this->hasOne(\backend\models\Currencies::className(), ['id' => 'currency_id']);
    }

    public function getCrypto() {
	return $this->hasOne(\backend\models\Currency::className(), ['id' => 'crypto_id']);
    }
    
    public function beforeSave($insert) {
	if (empty(\backend\models\Currency::findOne($this->crypto_id)) || empty(\backend\models\Currencies::findOne($this->currency_id))) {
	    return false;
	}
	return parent::beforeSave($insert);
    }
    
    public function getSumCurrency() {
	return (number_format($this->summ_out, 2, '.', ' ')) . ' ' . $this->currency->iso_code;
    }
    
    public function getSumCrypto() {
	return (float) rtrim(number_format($this->summ_in, 6), '0') .' '. $this->crypto->letter;
    }
    
    public function getFormatRate() {
	return number_format((float) rtrim($this->rate, '0'), 2, '.', ' ');
    }

}
