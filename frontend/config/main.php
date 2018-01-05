<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'urlManager' => [
	    'enablePrettyUrl' => true,
	    'showScriptName' => false,
	    'suffix' => '',
	    'rules' => [
		'' => 'site/index',
		'login' => 'site/login',
		'logout' => 'site/logout',
		'signup' => 'site/signup',
		'signout' => 'site/signout',
		'contact' => 'site/contact',
		'checkcode' => 'site/checkcode',
		'verification' => 'site/verification',
		'request-password-reset' => 'site/request-password-reset',
		'buy-<currency:[\w\-]+>' => 'site/buycurrency',
		'user/settings' => 'user/site/settings',
		'<alias:[\w\-]+>.html' => 'site/page',
		'<alias:[\w\-]+>.htm' => 'site/page',
		'<controller>' => '<controller>/index',
                '<controller>/<action>' => '<controller>/<action>'
	    ],
	],
	'authManager' => [
	    'class' => 'yii\rbac\DbManager',
	    'defaultRoles' => ['guest'],
	],
        'user' => [
	    'identityClass' => 'common\models\User',
	    'enableAutoLogin' => true,
	],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
