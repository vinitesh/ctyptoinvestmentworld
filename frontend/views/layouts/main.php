<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use backend\models\Settings;
use backend\models\Menu;
use common\models\BasicHelper;

AppAsset::register($this);
$settings = Settings::findOne(1);
$menu = Menu::find()->where("visible_type IN (" . Menu::SHOW_FOR_ALL . "," . (Yii::$app->user->isGuest ? Menu::SHOW_FOR_GUESTS : Menu::SHOW_FOR_REGISTERED) . ") AND status = 1")->orderBy("order_number ASC")->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Lato:200,300,400,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">
	<link rel="icon" href="<?= $settings->favicon ?>" type="image/x-icon" />
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
    </head>
    <body>
	<?php $this->beginBody() ?>

	<div class="wrap">
	    <?php
	    NavBar::begin([
		'brandLabel' => $settings->logo ? Html::img($settings->logo, ['alt' => $settings->default_meta_title]) . ($settings->logo_text ? "<span class='brand-text'>{$settings->logo_text}</span>" : "") : $settings->logo_text,
		'brandUrl' => Yii::$app->homeUrl,
		'options' => [
		    'class' => 'navbar-inverse navbar-fixed-top',
		],
	    ]);
	    $menuItems = [];
	    if (!empty($menu)) {
		foreach ($menu as $item) {
		    $menuItems[] = ['label' => $item->title, 'url' => ["/$item->url"]];
		}
	    }
	    echo Nav::widget([
		'options' => ['class' => 'navbar-nav navbar-right'],
		'items' => $menuItems,
	    ]);
	    NavBar::end();
	    ?>

	    <?php if (isset($this->params['breadcrumbs'])) { ?>
    	    <div class="container">
		    <?=
		    Breadcrumbs::widget([
			'links' => $this->params['breadcrumbs'],
		    ])
		    ?>		    
    	    </div>
	    <?php } ?>	    
	    <?= $content ?>

	</div>
	<div class="footer-above-container">
	    <div class="container">
		<?= BasicHelper::getContentBlock("above-footer") ?>
	    </div>
	</div>
	<footer class="footer">
	    <?= BasicHelper::getContentBlock("footer") ?>
	</footer>
	<?=
	\ibrarturi\scrollup\ScrollUp::widget([
	    'theme' => 'pill', // pill, link, image, tab
	]);
	?>
	<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
