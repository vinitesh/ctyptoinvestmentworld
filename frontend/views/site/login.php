<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\widgets\Alert;

$this->title = 'Sign In';
?>
<div class="site-login">
    <div class="container">
	<div class="row">
	    <div class="col-md-4 col-md-offset-4 login-container">
		<div class="phishing-warning ln-account-inner">
		    <h3 class="ng-binding">Beware Phishing</h3>
		    <p ng-bind-html="vm.messages.msgCorrectWebsite | trustedHtml" class="ng-binding"><b>Always</b> ensure you're on the correct website</p>
		    <img src="/images/img_url-bar.png" class="">
		    <div class="learn-more-wrapper">
			<a  target="_blank" class="ng-binding pull-right upper" href="/google-ads-phishing-scams-identify-avoid.html">Learn more</a>
		    </div>
		</div>
	    </div>
	    <div class="col-md-4 col-md-offset-4 login-container">
		<div class="login-step-1">
		    <div class="login-header">
			<h1 class="ng-binding">Welcome back</h1>
			<img src="/images/email.svg" class="" width="58" height="60">
		    </div>
		    <?= Alert::widget();  ?>
		    <div class="error-msg alert alert-danger"></div>
		    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

		    <?= $form->field($model, 'username')->textInput(['placeholder' => 'Email address'])->label(false) ?>

		    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>

		    <?=
		    $form->field($model, 'reCaptcha')->widget(
			    \himiklab\yii2\recaptcha\ReCaptcha::className(), ['siteKey' => '6Ledyj0UAAAAAEB9dMQKT8uBZurwT5gY3FtzVjpS']
		    )
		    ?>

		    <div class="checkbox">
			<?= $form->field($model, 'rememberMe')->checkbox(['template' => "{input}\n{label}\n{hint}\n{error}"]) ?>
		    </div>

		    <div style="color:#999;margin:1em 0">
			If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
		    </div>

		    <div class="form-group sign-bottons">
			<?= Html::submitButton('Login <i class="fa fa-spinner fa-spin"></i>', ['class' => 'btn btn-primary login-form-btn', 'name' => 'login-button']) ?>
			<br>
			<?= Html::a("SIGN UP", "/signup", ['class' => 'sign-links']) ?>
		    </div>		
		    <?php ActiveForm::end(); ?>
		</div>
		<div class="login-step-2" style="display: none">
		    <div class="error-msg alert alert-danger"></div>
		    <div class="login-header">
			<h1 class="ng-binding">Sign in confirmation</h1>
			<div class="login-icon"><i class="fa fa-comment"></i></div>
			<div class="confirmation-code-container">
			    <div class="confirmation-text">
				Please enter the 4-digit code that was sent to <strong></strong>
			    </div>
			    <?php ActiveForm::begin(['id' => 'login-form-code', 'action' => '/checkcode']); ?>
			    <div class="form-group field-loginform-username required">
				<input id="loginform-code" class="form-control" name="code" placeholder="Code" aria-required="true" type="text">
				<p class="help-block help-block-error"></p>
			    </div>
			    <div class="form-group sign-bottons">
				<?= Html::submitButton('Next <i class="fa fa-spinner fa-spin"></i>', ['class' => 'btn btn-primary confirm-form-btn', 'name' => 'send-code']) ?>
				<br>
				<?= Html::a("RESEND CODE", "/resend", ['class' => 'sign-links resendcode']) ?>
			    </div>
			    <?php ActiveForm::end(); ?>
			</div>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</div>
