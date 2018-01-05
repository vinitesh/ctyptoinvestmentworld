<?php

namespace frontend\modules\user\controllers;

use Yii;
use frontend\modules\user\models\Orders;
use frontend\modules\user\models\OrdersCartSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
	return [
	    'verbs' => [
		'class' => VerbFilter::className(),
		'actions' => [
		    'delete' => ['POST'],
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
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex() {
	$searchModel = new OrdersCartSearch();
	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	$orders_count = Orders::find()->where(['user_id' => \Yii::$app->user->id])->count();
	$total_orders = Orders::find()->where(['user_id' => \Yii::$app->user->id])->sum('summ_out');

	return $this->render('index', [
		    'searchModel' => $searchModel,
		    'dataProvider' => $dataProvider,
		    'orders_count' => $orders_count,
		    'total_orders' => $total_orders,
	]);
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
	/* $model = $this->findModel($id);

	  if ($model->load(Yii::$app->request->post()) && $model->save()) {
	  return $this->redirect(['view', 'id' => $model->id]);
	  } else {
	  return $this->render('update', [
	  'model' => $model,
	  ]);
	  } */
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
	/*  $this->findModel($id)->delete();

	  return $this->redirect(['index']); */
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
	if (($model = Orders::findOne($id)) !== null) {
	    return $model;
	} else {
	    throw new NotFoundHttpException('The requested page does not exist.');
	}
    }

}
