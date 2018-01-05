<?php

use yii\bootstrap\Html;
use backend\models\Currencies;
use common\models\BasicHelper;

$this->title = 'Dashboard - Cryptoinvestmentworld.com';
?>
<!-- top tiles -->
<div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
	<span class="count_top"><i class="fa fa-user"></i> Total Orders</span>
	<div class="count"><?= $orders_count ?></div>
<!--	<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
	<span class="count_top"><i class="fa fa-clock-o"></i> Total Portfolio Value</span>
	<div class="count"><?= number_format($total_orders, 2, '.', ' ') ?></div>
<!--	<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>-->
    </div>    
</div>
<!-- /top tiles -->
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
	<div class="x_panel">
	    <div class="x_title">
		<h2>Your Portfolio</h2>
		<ul class="nav navbar-right panel_toolbox">
		    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		    </li>		    
		</ul>
		<div class="clearfix"></div>
	    </div>
	    <div class="x_content">
		<br>
		<?php
		if (!empty($crypto_table)) {
		    $currency = Currencies::findAll(['status' => 1]);
		    ?>
    		<table class="table table-bordered table-responsive">
    		    <thead>
    			<tr>
    			    <th style="vertical-align: middle; text-align: center" rowspan="2">Crypto currency</th>
    			    <th style="vertical-align: middle; text-align: center" rowspan="2">Total Value</th>
    			    <th style="text-align: center" colspan="<?= count($currency) + 1 ?>">Current price</th>
    			</tr>
    			<tr>
				<?php foreach ($currency as $item) { ?>
				    <th style=" text-align: center"><?= $item->letter ?></th>
				    <?php } ?>
    			    <th></th>
    			</tr>
    		    </thead>
    		    <tbody>
			    <?php foreach ($crypto_table as $ct) { ?>
				<tr>
				    <td><?= Html::img($ct->crypto->logo, ['alt' => $ct->crypto->title]) . " {$ct->crypto->title}" ?></td>
				    <td><?= $ct->sumCrypto ?></td>
				    <?php foreach ($currency as $item) { ?>
				    <td><?= isset($currant_rates[$ct->crypto_id][$item->id]) ? number_format($currant_rates[$ct->crypto_id][$item->id], 2, '.', ' ') : '' ?></td>
				    <?php } ?>
				    <td width='50'><?= Html::a('Buy More', BasicHelper::getCurrencyUrl($ct->crypto->title), ['class' => 'btn btn-primary', 'target' => '_blank']) ?></td>
				</tr>
			    <?php } ?>
    		    </tbody>
    		</table>
		    <?php
		} else {
		    echo '<p>No results found</p>';
		}
		?>
	    </div>
	</div>
    </div>
</div>
