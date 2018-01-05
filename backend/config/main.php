<?php

$params = array_merge(
	require __DIR__ . '/../../common/config/params.php', require __DIR__ . '/../../common/config/params-local.php', require __DIR__ . '/params.php', require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'controllerMap' => [
	'elfinder' => [
	    'class' => 'mihaildev\elfinder\Controller',
	    'access' => ['@'], //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
	    'disabledCommands' => ['netmount'], //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
	    'roots' => [
		[
		    'baseUrl' => $params['siteURL'],
		    'basePath' => '@frontend/web',
		    'path' => 'images',
		    'name' => 'Images gallery'
		],
	    ],
	]
    ],
    'components' => [
	'request' => [
	    'csrfParam' => '_csrf-backend',
	],
	'urlManager' => [
	    'enablePrettyUrl' => true,
	    'showScriptName' => false,
	    'suffix' => '',
	    'rules' => [
		'' => 'site/index',
		'<controller>' => '<controller>/index',
		'<controller>/<action>' => '<controller>/<action>'
	    ],
	],	
	'user' => [
	    'identityClass' => 'common\models\User',
	    'enableAutoLogin' => true,
	],
	'authManager' => [
	    'class' => 'yii\rbac\DbManager',
	    'defaultRoles' => ['guest'],
	],
	'session' => [
	    // this is the name of the session cookie used for login on the backend
	    'name' => 'advanced-backend',
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
