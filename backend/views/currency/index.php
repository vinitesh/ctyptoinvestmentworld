<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Settings;

$settings = Settings::findOne(1);

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CurrencySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Crypto currency';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currency-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
	<?= Html::a('Create Currency', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
	    ['class' => 'yii\grid\SerialColumn'],
	    [
		'attribute' => 'logo',
		'format' => 'raw',
		'value' => function ($model) use ($settings) {
		    return Html::a(Html::img($settings->main_site_url . $model->logo, ['style' => 'max-height:50px;']), \yii\helpers\Url::to(["update", "id" => $model->id]));
		}
	    ],
	    'title',
	    'letter',
	    'short_title',
	    'rate',
	    'order_number',
	    [
		'attribute' => 'status',
		'format' => 'raw',
		'value' => function ($model) {
		    return $model->status ? "<i class='glyphicon glyphicon-check'></i>" : "<i class='glyphicon glyphicon-minus'></i>";
		},
		'filter' => [1 => 'Enabled', 0 => 'Disabled']
	    ],
	    ['class' => 'yii\grid\ActionColumn',
		'template' => '{update}'],
	    ['class' => 'yii\grid\ActionColumn',
		'template' => '{delete}'],
	],
    ]);
    ?>
</div>
