<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Settings;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sliders';
$this->params['breadcrumbs'][] = $this->title;
$settings = Settings::findOne(1);
?>
<div class="slider-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
	<?= Html::a('Create Slider', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
	    ['class' => 'yii\grid\SerialColumn'],
	    [
		'attribute' => 'image',
		'format' => 'raw',
		'value' => function ($model) use ($settings) {
		    return Html::a(Html::img($settings->main_site_url . $model->image, ['style' => 'max-height:50px;']), \yii\helpers\Url::to(["update", "id" => $model->id]));
		}
	    ],
	    'title',
	    'url:url',
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
