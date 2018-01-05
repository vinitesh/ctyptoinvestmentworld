<?php

use yii\helpers\Html;

$this->title = 'Confirm Email';
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
		<div class="login-step-2">
		    <div class="error-msg alert alert-danger"></div>
		    <div class="login-header">
			<h1 class="ng-binding">Confirm email</h1>
			<div class="icon-signup text-center">
			    <i class="fa fa-envelope"></i>
			</div>
			<div class="confirmation-code-container">
			    <div class="confirmation-text">
				We have sent an email to <strong><?= Yii::$app->user->identity->email ?></strong>. Click on the link in the email to confirm your email address.
			    </div>
			    <div class="sign-up-block">
				<?= Html::a("I HAVE CONFIRMED MY EMAIL", "/user/dashboard", ['class' => 'btn btn-primary confirmed-button']) ?>
			    </div>
			    <div class="sign-up-block">
				<?= Html::a("RESEND CONFIRMATION EMAIL", "/verification?send=1", ['class' => 'sign-links']) ?>
			    </div>
			</div>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</div>
