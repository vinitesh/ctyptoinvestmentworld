<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\helpers\Json;
use backend\models\ContentBlocks;

/**
 * Login form
 */
class BasicHelper extends Model {    

    public static function sendResponse($httpCode, $response = [], $end = true) {
        $serverTime = Yii::$app->db->createCommand('SELECT NOW()')->queryScalar();
        http_response_code($httpCode);
        header('Server-Time: ' . strtotime($serverTime));

        if (!empty($response) && is_array($response)) {
            header('Content-Type: application/json');
            echo Json::encode($response);
        }
        if ($end) {
            Yii::$app->end();
        }
    }    

    public static function getErrorString($errors) {
        $errstring = "";
        if (!empty($errors)) {
            foreach ($errors as $item) {
                $errstring .= $item[0] . "<br />";
            }
        }
        return $errstring;
    }  
    
    public static function getContentBlock($position) {
	$model = ContentBlocks::findOne(['position' => $position, 'status' => 1]);
	if ($model) {
	    $content = "<div id='content-block-{$model->id}' class='content-block block-{$model->position}'>";
	    if ($model->show_title == 1) {
		$content .= "<h3>{$model->title}</h3>";
	    }
	    $content .= $model->text;
	    $content .= "</div>";
	    return $content;
	} else {
	    return "";
	}
    }
    
    public static function getCurrencyUrl($title) {
	$url = 'buy-';
	$url .= strtolower(str_replace(" ", "-", $title));
	return \yii\helpers\Url::to("/$url");
    }
    
    public static function registerLogin() {
	$session = new \frontend\models\UserLogins();
	$session->user_id = \Yii::$app->user->id;
	$session->ip = \Yii::$app->request->userIP;
	$session->os = \Yii::$app->request->userAgent;
	$session->session_start = time();
	$session->session_finished = 0;
	$session->session_id = \Yii::$app->session->id;
	$session->save();
    }

}
