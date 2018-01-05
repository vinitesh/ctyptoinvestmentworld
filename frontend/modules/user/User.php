<?php

namespace frontend\modules\user;

/**
 * user module definition class
 */
class User extends \yii\base\Module
{
    public $layout = 'main';
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\user\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
