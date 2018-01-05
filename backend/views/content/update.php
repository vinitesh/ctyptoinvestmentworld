<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ContentBlocks */

$this->title = 'Update Content Blocks: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Content Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-blocks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
