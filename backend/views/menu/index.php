<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Menu;
use backend\models\Settings;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
$settings = Settings::findOne(1);
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
	<?= Html::a('Create Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
	    ['class' => 'yii\grid\SerialColumn'],
	    'title',
	    [
		'attribute' => 'url',
		'format' => 'raw',
		'value' => function($model) use ($settings) {
		    return Html::a($model->url, $settings->main_site_url.$model->url);
		}
	    ],
	    [
		'attribute' => 'visible_type',
		'value' => function ($model) {
		    switch ($model->visible_type) {
			case Menu::SHOW_FOR_ALL: return "Show for all";
			case Menu::SHOW_FOR_GUESTS: return "Show for guests only";
			case Menu::SHOW_FOR_REGISTERED: return "Show for registered only";
		    }
		},
		'filter' => [Menu::SHOW_FOR_ALL => 'Show for all', Menu::SHOW_FOR_GUESTS => 'Show for guests only', Menu::SHOW_FOR_REGISTERED => 'Show for registered only']
	    ],
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
