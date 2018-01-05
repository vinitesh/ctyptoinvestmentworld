<?php
use common\widgets\Alert;

$this->title = $menu->meta_title ?: $menu->title;
$this->registerMetaTag(['name' => 'description', 'content' => $menu->meta_desc ?: $settings->default_meta_description]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $menu->meta_keywords ?: $settings->default_meta_keywords]);
$this->params['breadcrumbs'][] = $menu->title;

$text = str_replace('{contact_form}', Yii::$app->controller->renderPartial('contact'), $model->text );
?>
<div class="container nopadding">
    <?= Alert::widget(); ?>
    <h1><?= $model->title ?></h1>
    <div class="page-container">
	<?= $text ?>
    </div>
</div>