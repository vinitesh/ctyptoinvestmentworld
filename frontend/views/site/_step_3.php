<?php
use yii\helpers\Html;

$this->title = "Cryptoinvestmentworld - Currency exchange Step 3";

$this->params['breadcrumbs'][] = "Buy {$settings->currency->title}";
?>

<h1>PAYMENT</h1>
<div class="exchange-form text-center">
    
    <div class="text-form">
	<h4>Make your payment</h4>
    </div>
    <div class="subtitle">
	Remember to include the reference code when making your bank transfer otherwise your order may be delayed or canceled 
    </div>
    <div class="congradulation">
	<p class="big">Congratulation!</p>
	<p>
	    Your order <?= $model->number ?> has been confirmed successfully. Please click Finish button to continue
	</p>
    </div>
    <div class="button">
	<?= Html::a('Finish', ['/user/orders'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>


