<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Currency */

$this->title = 'Create Crypto Currency';
$this->params['breadcrumbs'][] = ['label' => 'Crypto Currency', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currency-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
