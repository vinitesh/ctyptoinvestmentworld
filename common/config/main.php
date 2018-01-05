<?php

return [
    'aliases' => [
	'@bower' => '@vendor/bower-asset',
	'@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
	'cache' => [
	    'class' => 'yii\caching\FileCache',
	],
	'reCaptcha' => [
	    'name' => 'reCaptcha',
	    'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
	    'siteKey' => '6Ledyj0UAAAAAEB9dMQKT8uBZurwT5gY3FtzVjpS',
	    'secret' => '6Ledyj0UAAAAADfflZZ1w6uKjOZ0bhg3u2fzPVvt',
	],
    ],
];
