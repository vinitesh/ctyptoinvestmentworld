<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
	'css/font-awesome.css',
	'css/customizatiion.css',
	'css/slick.css',
        'css/site.css',	
    ];
    public $js = [
	'/js/sweetalert2.all.min.js',
	'js/slick.min.js',
	'js/functions.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
