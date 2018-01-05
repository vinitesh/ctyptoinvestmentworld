<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */
use yii\helpers\Html;
use common\models\User;
use common\widgets\Alert;
use yii\helpers\Url;
use backend\models\Settings;

$bundle = yiister\gentelella\assets\Asset::register($this);
$user = User::findOne(Yii::$app->user->id);
$settings = Settings::findOne(1);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="<?= Yii::$app->charset ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
	<link href="/css/user.css" rel="stylesheet" />
	<link rel="icon" href="<?= $settings->favicon ?>" type="image/x-icon" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    </head>
    <body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >
	<?php $this->beginBody(); ?>
	<div class="container body">

	    <div class="main_container">

		<div class="col-md-3 left_col">
		    <div class="left_col scroll-view">

			<div class="navbar nav_title" style="border: 0;">
			    <a href="<?= Url::to('/user/dashboard') ?>" class="site_title"><?= Html::img($settings->logo, ['height' => '30']) ?> <span>CryptoInvestment</span></a>
			</div>
			<div class="clearfix"></div>

			<!-- menu prile quick info -->
			<div class="profile">
			    <div class="profile_pic">
				<img src="http://placehold.it/128x128" alt="..." class="img-circle profile_img">
			    </div>
			    <div class="profile_info">
				<span>Welcome,</span>
				<h2><?= $user->fullName ?></h2>
			    </div>
			</div>
			<!-- /menu prile quick info -->

			<br />

			<!-- sidebar menu -->
			<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

			    <div class="menu_section">
				<h3>General</h3>
				<?=
				\yiister\gentelella\widgets\Menu::widget(
					[
					    "items" => [
						["label" => "Dashboard", "url" => "/user/dashboard", "icon" => "dashboard"],
						["label" => "My Orders", "url" => ["/user/orders"], "icon" => "shopping-cart"],
					    ],
					]
				)
				?>
			    </div>

			</div>
			<!-- /sidebar menu -->

			<!-- /menu footer buttons -->
			<div class="sidebar-footer hidden-small">
			    <a href="<?= Url::to("/user/settings") ?>" data-toggle="tooltip" data-placement="top" title="Settings">
				<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			    </a>
			    <a data-toggle="tooltip" data-placement="top" href="javascript:void(0);" data-action="launchFullscreen"  title="FullScreen">
				<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
			    </a>
			    <a data-toggle="tooltip" data-placement="top" title="Lock">
				<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
			    </a>
			    <a href="<?= Yii::$app->urlManager->createUrl('/signout') ?>" data-toggle="tooltip" data-placement="top" title="Logout">
				<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			    </a>
			</div>
			<!-- /menu footer buttons -->
		    </div>
		</div>

		<!-- top navigation -->
		<div class="top_nav">

		    <div class="nav_menu">
			<nav class="" role="navigation">
			    <div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			    </div>

			    <ul class="nav navbar-nav navbar-right">
				<li class="">
				    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<img src="http://placehold.it/128x128" alt=""><?= $user->fullName ?>
					<span class=" fa fa-angle-down"></span>
				    </a>
				    <ul class="dropdown-menu dropdown-usermenu pull-right">                                
					<li>
					    <a href="<?= Yii::$app->urlManager->createUrl("/user/settings") ?>">
						<?php if (!$user->first_name) { ?>
    						<span class="badge bg-red pull-right">50%</span>
						<?php } else { ?>
    						<span class="badge bg-success pull-right">100%</span>
						<?php } ?>
						<span>Settings</span>
					    </a>
					</li>
					<li>
					    <a href="<?= Yii::$app->urlManager->createUrl("/faq.html") ?>">Help</a>
					</li>
					<li><a href="<?= Yii::$app->urlManager->createUrl('/signout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
					</li>
				    </ul>
				</li>

				<li role="presentation" class="dropdown">
				    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
					<i class="fa fa-envelope-o"></i>
					<span class="badge bg-green">1</span>
				    </a>
				    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
					<li>
					    <a>
						<span class="image">
						    <img src="http://placehold.it/128x128" alt="Profile Image" />
						</span>
						<span>
						    <span>John Smith</span>
						    <span class="time">3 mins ago</span>
						</span>
						<span class="message">
						    Film festivals used to be do-or-die moments for movie makers. They were where...
						</span>
					    </a>
					</li>
				    </ul>
				</li>

			    </ul>
			</nav>
		    </div>

		</div>
		<!-- /top navigation -->

		<!-- page content -->
		<div class="right_col" role="main">
		    <?php if (isset($this->params['h1'])): ?>
    		    <div class="page-title">
    			<div class="title_left">
    			    <h1><?= $this->params['h1'] ?></h1>
    			</div>
    			<div class="title_right">
    			    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
    				<div class="input-group">
    				    <input type="text" class="form-control" placeholder="Search for...">
    				    <span class="input-group-btn">
    					<button class="btn btn-default" type="button">Go!</button>
    				    </span>
    				</div>
    			    </div>
    			</div>
    		    </div>
		    <?php endif; ?>
		    <div class="clearfix"></div>
		    <?= Alert::widget() ?>
		    <?= $content ?>
		</div>
		<!-- /page content -->
		<!-- footer content -->
		<footer>
		    <div class="pull-right">
			<a href="/" rel="nofollow" target="_blank"> &copy; Crypto Investment World 2018</a>
		    </div>
		    <div class="clearfix"></div>
		</footer>
		<!-- /footer content -->
	    </div>

	</div>

	<div id="custom_notifications" class="custom-notifications dsp_none">
	    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
	    </ul>
	    <div class="clearfix"></div>
	    <div id="notif-group" class="tabbed_notifications"></div>
	</div>
	<!-- /footer content -->
	<?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>
