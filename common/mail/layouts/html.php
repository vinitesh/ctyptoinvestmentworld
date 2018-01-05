<?php

use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
	<title><?= Html::encode($this->title) ?></title>

	<style type="text/css">

	    body{width: 100%; background-color: #f0f0f0; margin:0; padding:0; -webkit-font-smoothing: antialiased;mso-margin-top-alt:0px; mso-margin-bottom-alt:0px; mso-padding-alt: 0px 0px 0px 0px;}

	    p,h1,h2,h3,h4{margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;}

	    span.preheader{display: none; font-size: 1px;}

	    html{width: 100%;}

	    table{font-size: 12px;border: 0;}

	    .menu-space{padding-right:25px;}

	    a,a:hover { text-decoration:none; color:#000;}


	    @media only screen and (max-width:640px)

	    {
		body{width:auto!important;}
		table[class=main] {width:440px !important;}
		table[class=two-left] {width:420px !important; margin:0px auto;}
		table[class=full] {width:100% !important; margin:0px auto;}
		table[class=alaine] { text-align:center;}
		table[class=menu-space] {padding-right:0px;}
		table[class=banner] {width:438px !important;}
		table[class=menu] {width:438px !important; margin:0px auto; border-bottom:#e1e0e2 solid 1px;}
		table[class=date] {width:438px !important; margin:0px auto; text-align:center;}
		table[class=two-left-inner] {width:400px !important; margin:0px auto;}
		table[class=menu-icon] { display:block;}
		table[class=two-left-menu] {text-align:center;}

	    }

	    @media only screen and (max-width:479px)
	    {
		body{width:auto!important;}
		table[class=main]  {width:310px !important;}
		table[class=two-left] {width:300px !important; margin:0px auto;}
		table[class=full] {width:100% !important; margin:0px auto;}
		table[class=alaine] { text-align:center;}
		table[class=menu-space] {padding-right:0px;}
		table[class=banner] {width:308px !important;}
		table[class=menu] {width:308px !important; margin:0px auto; border-bottom:#e1e0e2 solid 1px;}
		table[class=date] {width:308px !important; margin:0px auto; text-align:center;}
		table[class=two-left-inner] {width:280px !important; margin:0px auto;}
		table[class=menu-icon] { display:none;}
		table[class=two-left-menu] {width:310px !important; margin:0px auto;}


	    }
	</style>
    </head>

    <body yahoo="fix" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

	<!--Main Table Start-->

	<?php $this->beginBody() ?>

	<?= $content ?>

	<?php $this->endBody() ?>


	<!--Main Table End-->

    </body>
</html>
<?php $this->endPage() ?>