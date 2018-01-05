<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\user\models\OrdersCartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <?php
    echo GridView::widget([
	'id' => 'orders-grid',
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
	'headerRowOptions' => ['class' => 'kartik-sheet-style'],
	'filterRowOptions' => ['class' => 'kartik-sheet-style'],
	'pjax' => true, // pjax is set to always true for this demo
	// set your toolbar
	'toolbar' => [
	    ['content' =>
		Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['/orders/index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset Grid'])
	    ],
	    '{export}',
	    '{toggleData}',
	],
	// set export properties
	'export' => [
	    'fontAwesome' => true
	],
	// parameters from the demo form
	'bordered' => TRUE,
	'striped' => TRUE,
	'condensed' => TRUE,
	'responsive' => TRUE,
	'hover' => TRUE,
	//'showPageSummary' => TRUE,
	'panel' => [
	    'type' => GridView::TYPE_SUCCESS,
	    'heading' => '<i class="fa fa-shopping-cart"></i>  Orders',
	],
	'persistResize' => false,
	'toggleDataOptions' => ['minCount' => 10],
	//'exportConfig' => $exportConfig,
	'itemLabelSingle' => 'order',
	'itemLabelPlural' => 'orders',
	'columns' => [
	    [
		'class' => 'kartik\grid\SerialColumn',
		'contentOptions' => ['class' => 'kartik-sheet-style'],
		'width' => '36px',
		'header' => '',
		'headerOptions' => ['class' => 'kartik-sheet-style']
	    ],
	    /* [
	      'class' => 'kartik\grid\ExpandRowColumn',
	      'width' => '40px',
	      'header' => '',
	      'value' => function ($model, $key, $index, $column) {
	      return GridView::ROW_COLLAPSED;
	      },
	      'detail' => function ($model, $key, $index, $column) {
	      return Yii::$app->controller->renderPartial('_expand-order-details', ['model' => $model]);
	      },
	      'headerOptions' => ['class' => 'kartik-sheet-style'],
	      'expandOneOnly' => true
	      ], */
	    [
		'attribute' => 'user_id',
		'value' => function ($model) {
		    return $model->user->fullName;
		},
		'filter' => yii\helpers\ArrayHelper::map(\common\models\User::find()->all(), 'id', 'fullName')
	    ],
	    'number',
	    'wallet_number',
	    [
		'attribute' => 'summ_out',
		'value' => function ($model) {
		    return $model->sumCurrency;
		}
	    ],
	    [
		'attribute' => 'summ_in',
		'value' => function ($model) {
		    return $model->sumCrypto;
		}
	    ],
	    [
		'attribute' => 'rate',
		'value' => function ($model) {
		    return $model->formatRate;
		}
	    ],
	    [
		'attribute' => 'status',
		'format' => 'raw',
		'hAlign' => 'center',
		'value' => function ($model) {
		    switch ($model->status) {
			case 1: return '<span class="label label-default">New</span>';
			case 2: return '<span class="label label-primary">Pending</span>';
			case 3: return '<span class="label label-success">Confirmed</span>';
			case 4: return '<span class="label label-warning">Approved</span>';
			case 5: return '<span class="label label-danger">Cancelled</span>';
		    }
		},
		'filter' => [1 => 'New', 2 => 'Pending', 3 => 'Confirmed', 4 => 'Approved', 5 => 'Cancelled']
	    ],
	    [
		'attribute' => 'date_create',
		'value' => function ($model) {
		    return date('d F, Y', $model->date_create);
		},
		'headerOptions' => ['style' => 'min-width:200px'],
		'filterType' => \kartik\grid\GridView::FILTER_DATE_RANGE,
		'filterWidgetOptions' => [
		    'convertFormat' => true,
		    //'presetDropdown' => true,
		    'pluginOptions' => [
			'format' => 'd-m-Y',
			'separator' => ' - ',
			//'opens' => 'right',
			'locale' => [
			    'format' => 'd-m-Y',
			],
		    ],
		],
	    ],
	    ['class' => 'yii\grid\ActionColumn',
		'template' => '{update}'],
	    ['class' => 'yii\grid\ActionColumn',
		'template' => '{delete}'],
	],
    ]);
    ?>    
</div>
