<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pages', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'alias',
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
    ]); ?>
</div>
