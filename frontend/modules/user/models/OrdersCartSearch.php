<?php

namespace frontend\modules\user\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\user\models\Orders;
use kartik\daterange\DateRangeBehavior;

/**
 * OrdersCartSearch represents the model behind the search form about `frontend\modules\user\models\Orders`.
 */
class OrdersCartSearch extends Orders {

    public $createTimeStart;
    public $createTimeEnd;

    /**
     * @inheritdoc
     */
    public function behaviors() {
	return [
	    [
		'class' => DateRangeBehavior::className(),
		'attribute' => 'date_create',
		'dateStartAttribute' => 'createTimeStart',
		'dateEndAttribute' => 'createTimeEnd',
	    ]
	];
    }

    public function rules() {
	return [
	    [['id', 'user_id', 'currency_id', 'crypto_id', 'status'], 'integer'],
	    [['number', 'wallet_number', 'date_create'], 'safe'],
	    [['summ_out', 'summ_in', 'rate'], 'number'],
	    [['date_create'], 'match', 'pattern' => '/^.+\s\-\s.+$/'],
	];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
	// bypass scenarios() implementation in the parent class
	return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
	$query = Orders::find();

	// add conditions that should always apply here

	$dataProvider = new ActiveDataProvider([
	    'query' => $query,
	]);

	$this->load($params);

	if (!$this->validate()) {
	    // uncomment the following line if you do not want to return any records when validation fails
	    // $query->where('0=1');
	    return $dataProvider;
	}

	// grid filtering conditions
	$query->andFilterWhere([
	    'id' => $this->id,
	    'user_id' => Yii::$app->user->id,
	    'currency_id' => $this->currency_id,
	    'crypto_id' => $this->crypto_id,
	    'summ_out' => $this->summ_out,
	    'summ_in' => $this->summ_in,
	    'rate' => $this->rate,
	    'status' => $this->status,
	]);
	
	$query->andFilterWhere(['>=', 'date_create', $this->createTimeStart])
              ->andFilterWhere(['<', 'date_create', $this->createTimeEnd]);

	$query->andFilterWhere(['like', 'number', $this->number])
		->andFilterWhere(['like', 'wallet_number', $this->wallet_number]);

	return $dataProvider;
    }

}
