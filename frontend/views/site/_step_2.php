<?php

use common\models\BasicHelper;
use yii\helpers\Html;
use kartik\form\ActiveForm;

$this->title = "Cryptoinvestmentworld - Currency exchange Step 2";

$this->params['breadcrumbs'][] = "Buy {$settings->currency->title}";
?>

<h1>Order Confirmation</h1>
<div class="exchange-form text-center">
    <div class="currency-rate">

    </div>
    <?php $form = ActiveForm::begin(["id" => "buysteptwo", "action" => ["buystepthree"]]); ?>

    <div class="confirm_container">
	<div class="row col-md-12">
	    <div class="center-block upper">Your Email Address</div>
	    <h4 class="center-block confirm-text"><?= Yii::$app->user->identity->email ?></h4>
	</div>
	<div class="row col-md-12">
	    <div class="center-block upper">Your Wallet Address</div>
	    <h4 class="center-block confirm-text"><?= $model->wallet_number ?></h4>
	</div>
	
	    <?php if (Yii::$app->user->identity->first_name) { ?>
	<div class="row">
    	    <div class="col-md-6">
    		<div class="center-block upper">Your Full Name</div>
    		<h4 class="center-block confirm-text"><?= Yii::$app->user->identity->first_name . ' ' . Yii::$app->user->identity->last_name ?></h4>
    	    </div>
    	    <div class="col-md-6">
    		<div class="center-block upper">Order Reference Code</div>
    		<h4 class="center-block confirm-text"><?= $model->number ?></h4>
    	    </div>
	</div>
	    <?php } else { ?>
    	    <div class="row col-md-12">
    		<div class="center-block upper">Order Reference Code</div>
    		<h4 class="center-block confirm-text"><?= $model->number ?></h4>
    	    </div>
	    <?php } ?>
	<div class="row">
	    <div class="col-md-6">
		<div class="center-block upper">Amount in <?= $model->currency->iso_code ?></div>
		<h4 class="center-block confirm-text"><?= $model->summ_out ?></h4>
	    </div>
	    <div class="col-md-6">
		<div class="center-block upper">Amount in <?= $model->crypto->letter ?></div>
		<h4 class="center-block confirm-text"><?= (float) rtrim($model->summ_in, '0') ?></h4>
	    </div>	    
	</div>
	<div class="row col-md-12">
	    <p class="subtitle">You have been sent an email containing a confirmation code/ Please enter it bellow to proceed with your code/ Make sure you check your spam box</p>
	    <div class="form-group">
		<input id="code" class="form-control" name="code" placeholder="Confirmation code" aria-required="true" aria-invalid="true" type="text">
	    </div>
	</div>
	<div class="row">
	    <?= Html::submitButton("Click here to confirm your code <i class='fa fa-spinner fa-spin'></i>", ['class' => 'btn btn-primary exchange-btn']) ?>
	</div>
	<?= $form->field($model, 'number')->hiddenInput()->label(false) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>


