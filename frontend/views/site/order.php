<?php

use common\models\BasicHelper;
use yii\helpers\Html;
use kartik\form\ActiveForm;

$this->title = "Cryptoinvestmentworld - Buy {$settings->currency->title}";
$this->registerMetaTag(['name' => 'description', 'content' => $settings->default_meta_description]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $settings->default_meta_keywords]);

$this->params['breadcrumbs'][] = "Buy {$settings->currency->title}";

?>
<div class="exchange-container">
    <div class="container page-container">
	<div class="col-md-6">
	    <div class="currency-info">
		<?= Html::img($crypto->logo, ['alt' => $crypto->title]) ?>
		<h3><?= $crypto->title ?></h3>
		<div class="currency-text">
		    <?= $crypto->title ?> via bank transfer Step 1/3
		</div>
	    </div>
	    <?= BasicHelper::getContentBlock("exchange") ?>
	</div>
	<div class="col-md-6 exchange-replace">
	    <h1>Buy <?= $crypto->title ?></h1>
	    <div class="exchange-form text-center">
		<div class="currency-rate">

		</div>
		<div class="text-form">
		    <h4>Select currency for purchase</h4>
		</div>
		<?php $form = ActiveForm::begin(["id" => "order-form", "action" => ['buysteptwo']]); ?>

		<div class="btn-group" role="group" aria-label="Select Currencuy">
		    <?php
		    if (!empty($currency)) {
			foreach ($currency as $item) {
			    ?>
		    <button type="button" data-letter="<?= $item->letter ?>" data-currency="<?= $item->iso_code ?>" data-rate="<?= number_format($rates[$item->iso_code][$crypto->letter], 2, '.', '') ?>" data-id="<?= $item->id ?>" class="btn btn-secondary btn-primary select-currency"><?= $item->letter . " (" . $item->iso_code . ")" ?></button>
			    <?php
			}
		    }
		    ?>		    
		</div>
		<div class="clearfix"></div>		
		<div class="exchange_container" style="display: none">
		    
		    <h3><span class="c-letter"></span><span class="c-rate"></span> / 1 <span class="c-crypto"><?= $crypto->letter ?></span></h3>
		    
		    <br>

		    <?= $form->field($model, 'wallet_number')->textInput(['placeholder' => $model->getAttributeLabel('wallet_number')])->label(FALSE) ?>    

		    <?= $form->field($model, 'crypto_id')->hiddenInput()->label(false) ?>

		    <?= $form->field($model, 'summ_out', ['addon' => ['append' => ['content'=>'']]])->textInput(['placeholder' => ''])->label(FALSE) ?>  

		    <?= $form->field($model, 'summ_in', ['addon' => ['append' => ['content'=>$crypto->letter]]])->textInput(['maxlength' => true, 'disabled' => TRUE, 'placeholder' => $crypto->letter])->label(FALSE) ?>

		    <?= $form->field($model, 'rate')->hiddenInput()->label(FALSE) ?>

		    <?= $form->field($model, 'currency_id')->hiddenInput()->label(FALSE) ?>

		    <?= Html::submitButton("Click here to place your order <i class='fa fa-spinner fa-spin'></i>", ['class' => 'btn btn-primary exchange-btn']) ?>

		</div>

		<?php ActiveForm::end(); ?>
	    </div>
	</div>
    </div>
</div>


