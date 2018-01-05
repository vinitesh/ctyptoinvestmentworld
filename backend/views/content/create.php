<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ContentBlocks */

$this->title = 'Create Content Blocks';
$this->params['breadcrumbs'][] = ['label' => 'Content Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-blocks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
