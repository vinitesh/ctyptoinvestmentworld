<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Content Blocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-blocks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Content Blocks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'show_title:boolean',
            'position',
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
