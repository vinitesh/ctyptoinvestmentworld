<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\ContactForm;

$model = new ContactForm();
?>

<?php $form = ActiveForm::begin(['id' => 'contact-form', 'action' => '/contact']); ?>

<?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'email') ?>

<?= $form->field($model, 'subject') ?>

<?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

<?=
$form->field($model, 'reCaptcha')->widget(
	\himiklab\yii2\recaptcha\ReCaptcha::className(), ['siteKey' => '6Ledyj0UAAAAAEB9dMQKT8uBZurwT5gY3FtzVjpS']
)
?>

<div class="form-group pull-right">
    <?= Html::submitButton('<i class="fa fa-envelope-o"></i> Submit <i class="fa fa-spinner fa-spin"></i>', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
</div>

<?php ActiveForm::end(); ?>
