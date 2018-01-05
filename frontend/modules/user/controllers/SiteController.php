<?php

namespace frontend\modules\user\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use frontend\modules\user\models\User;

/**
 * Default controller for the `user` module
 */
class SiteController extends Controller {

    public function behaviors() {
	return [
	    'access' => [
		'class' => AccessControl::className(),
		'rules' => [
		    [
			'actions' => ['settings'],
			'allow' => true,
			'roles' => ['@'],
		    ],
		],
	    ],
	];
    }

    public function beforeAction($action) {
	if (!Yii::$app->user->identity->verified) {
	    $this->redirect('/verification');
	    return FALSE;
	}
	return parent::beforeAction($action);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionSettings() {
	$model = User::findOne(Yii::$app->user->id);
	$old_pass = $model->password_hash;
	if ($model->load(Yii::$app->request->post())) {
	    if ($_POST['User']['password_hash'] != '')
		$model->password_hash = Yii::$app->security->generatePasswordHash($_POST['User']['password_hash']);
	    else
		$model->password_hash = $old_pass;
	    if ($model->save()) {
		Yii::$app->session->setFlash('success', 'Your account settings has been updated successfully');
		return $this->redirect(['settings']);
	    }
	}
	return $this->render('settings', ['model' => $model]);
    }

}
