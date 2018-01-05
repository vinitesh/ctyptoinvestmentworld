<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Currency */

$this->title = 'Update Crypto Currency: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Crypto Currency', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="currency-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
