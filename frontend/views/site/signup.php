<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign Up';
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
			<h1 class="ng-binding">Sign up</h1>
		    </div>
		    <div class="error-msg alert alert-danger"></div>
		    <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

		    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email address'])->label(false) ?>

		    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>

		    <?=
		    $form->field($model, 'reCaptcha')->widget(
			    \himiklab\yii2\recaptcha\ReCaptcha::className(), ['siteKey' => '6Ledyj0UAAAAAEB9dMQKT8uBZurwT5gY3FtzVjpS']
		    )
		    ?>

		    <div style="color:#999;margin:1em 0">
			By signing up you agree to our <?= Html::a('Terms of Use', '/terms.html') ?> and <?= Html::a('Privacy Policy', '/privacy.html') ?>.
		    </div>

		    <div class="form-group sign-bottons">
			<?= Html::submitButton('Sign Up <i class="fa fa-spinner fa-spin"></i>', ['class' => 'btn btn-primary login-form-btn', 'name' => 'login-button']) ?>
			<br>
			<?= Html::a("SIGN IN", "/login", ['class' => 'sign-links']) ?>
		    </div>		
		    <?php ActiveForm::end(); ?>
		</div>		
	    </div>
	</div>
    </div>
</div>
