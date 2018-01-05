<?php

use yii\helpers\Html;
use common\models\BasicHelper;
use yii\helpers\Url;

$this->title = $menu->meta_title ?: $menu->title;
$this->registerMetaTag(['name' => 'description', 'content' => $menu->meta_desc ?: $settings->default_meta_description]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $menu->meta_keywords ?: $settings->default_meta_keywords]);
?>
<?php
if (!empty($slides)) {
    $this->registerJs("$('.crypto-slider').slick({
    autoplay: true,
    autoplaySpeed: 5000,
    speed: 1000
  });");
    ?>
    <div class="crypto-slider">
	<?php
	foreach ($slides as $slide) {
	    ?>
	    <div class="slick-slide">
		<?= Html::img($slide->image, ['alt' => $slide->title]) ?>
		<div class="container">
		    <div class="slide-text">
			<h3><?= $slide->title ?></h3>
			<div class="slide-description">
			    <?= $slide->description ?>
			</div>
			<?php if ($slide->show_button) { ?>
	    		<div class="slide-button">
				<?= Html::a($slide->button_text, $slide->url, ['class' => 'btn btn-primary']) ?>
	    		</div>
			<?php } ?>
		    </div>
		</div>
	    </div>
	<?php }
	?>
    </div>
<?php }
?>
<div class="crypto-header">
    <div class="container">
	<?= BasicHelper::getContentBlock('curency_header') ?>
    </div>
</div>
<div class="slider-bottom">
    <div class="container">
	<div class="row">
	    <div class="col-md-12 easy-steps">
		<h2>
		    <?= BasicHelper::getContentBlock('steps_header') ?>		    
		</h2>

		<div class="steps2 owl-carousel ln-steps-wrapper owl-theme" style="opacity: 1; display: block;">
		    <div class="owl-wrapper-outer">
			<div class="owl-wrapper">
			    <div class="col-md-4 item">
				<a href="<?= Url::to('/signup') ?>">
				    <div class="ln-step">
					<span class="step-number">1</span>
					<?= BasicHelper::getContentBlock('steps_1') ?>					
				    </div>
				</a>
			    </div>

			    <div class="col-md-4 owl-item">
				<div class="item">
				    <a href="<?= Url::to('/login') ?>">
					<div class="ln-step">
					    <span class="step-number">2</span>
					    <?= BasicHelper::getContentBlock('steps_2') ?>					    
					</div>
				    </a>
				</div>
			    </div>

			    <div class="col-md-4 owl-item synced">
				<div class="item">
				    <a href="<?= Url::to('#coints') ?>">
					<div class="ln-step">
					    <span class="step-number">3</span>
					    <?= BasicHelper::getContentBlock('steps_3') ?>					    
					</div>
				    </a>
				</div>
			    </div>
			</div>
		    </div>
		</div>

		<div class="steps-cta text-center"><a class="btn btn-primary ln-btn-primary" href="#coins">Buy Now</a>
		    <?php // BasicHelper::getContentBlock('steps_4') ?>
		</div>
	    </div>
<!--	    <div class="col-md-6">
		<div class="images-block-slider">
		    <img alt="CryptoInwestmentWord" src="/images/device.png" />
		</div>
	    </div>-->
	</div>	
    </div>
</div>
<div class="connts-container">
    <div class="container" id="coins">
	<?php if (!empty($crypto)) { ?>
    	<div class="currency-block row">
		<?php foreach ($crypto as $c_item) { ?>
		    <div class="col-md-3">
			<div class="currency-item">
			    <h4><?= $c_item->title ?></h4>
			    <?= Html::img($c_item->logo, ['alt' => $c_item->title]) ?>
			    <div class="currency-price">
				<label>Current price:</label><br> 
				<?php
				if (!empty($currency)) {
				    foreach ($currency as $c) {
					?>
					<span><?= $c->letter . ' ' . (float) rtrim($rates[$c->iso_code][$c_item->letter], '0') ?></span><br>					
				    <?php } ?>
	    			Per 1 <?= $c_item->short_title ?>
				<?php }
				?>				
			    </div>
			    <div class="buy-currency">
				<?= Html::a("Buy Now", BasicHelper::getCurrencyUrl($c_item->title), ['class' => 'btn btn-success btn-buy-now']) ?>
			    </div>
			</div>
		    </div>
		<?php } ?>
    	</div>   
	<?php } ?>
    </div>
</div>
