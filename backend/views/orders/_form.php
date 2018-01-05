<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wallet_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->widget(Select2::className(), ['data' => yii\helpers\ArrayHelper::map(\common\models\User::find()->all(), 'id', 'fullName')]) ?>

    <?= $form->field($model, 'currency_id')->widget(Select2::className(), ['data' => yii\helpers\ArrayHelper::map(\backend\models\Currencies::find()->all(), 'id', 'title')]) ?>
    
    <?= $form->field($model, 'summ_out')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'crypto_id')->widget(Select2::className(), ['data' => yii\helpers\ArrayHelper::map(backend\models\Currency::find()->all(), 'id', 'title')]) ?>    

    <?= $form->field($model, 'summ_in')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->widget(Select2::className(), ['data' => [1 => 'New', 2 => 'Pending', 3 => 'Confirmed', 4 => 'Approved', 5 => 'Cancelled']]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
