<?php

use yii\bootstrap\Html
?>

<!--Main Table Start-->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#f0f0f0" style="background:#f0f0f0;">
    <tr>
	<td align="center" valign="top">


	    <!--Top Space Start-->

	    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" mc:repeatable="Note Mail" mc:variant="nm10-1-Top Space">
		<tr>
		    <td align="center" valign="top"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
			    <tr>
				<td height="60" align="center" valign="middle" style="line-height:60px; font-size:60px;">&nbsp;</td>
			    </tr>
			</table></td>
		</tr>
	    </table>

	    <!--Top Space End-->

	    <!--Logo Part Start-->

	    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" mc:repeatable="Note Mail" mc:variant="nm10-2-Logo Part">
		<tr>
		    <td align="center" valign="top"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
			    <tr>
				<td align="center" valign="middle" bgcolor="#18c197" style="-moz-border-radius: 8px 8px 0px 0px; border-radius: 8px 8px 0px 0px;"><table width="490" border="0" align="center" cellpadding="0" cellspacing="0"class="two-left-inner">
					<tr>
					    <td height="20" align="center" valign="middle" style="line-height:20px; font-size:20px;">&nbsp;</td>
					</tr>
					<tr>
					    <td align="left" valign="top">




						<table width="165" border="0" align="left" cellpadding="0" cellspacing="0" class="two-left-inner">

						    <tr>
							<td height="5" align="center" valign="middle" style="line-height:5px; font-size:5px;">&nbsp;</td>
						    </tr>
						    <tr>
							<td style="font-family:'Open Sans', Verdana, Arial; font-size:18px; color:#FFF; font-weight:normal; line-height:30px;" mc:edit="nm20-02" align="center" valign="middle">Confirmation code</td>
						    </tr>
						</table>

						<table  border="0" align="right" cellpadding="0" cellspacing="0" class="two-left-inner">

						    <tr>
							<td height="10" align="center" valign="middle" style="line-height:10px; font-size:10px;">&nbsp;</td>
						    </tr>

						    <tr>
							<td align="center" valign="top" style="font-family:'Open Sans', Verdana, Arial; font-size:18px; color:#FFF; font-weight:normal; line-height:30px;" mc:edit="nm20-02"><multiline><?= date("F d, Y") ?></multiline></td>
					</tr>

				    </table>

				</td>
			    </tr>
			    <tr>
				<td height="25" align="center" valign="middle" style="line-height:25px; font-size:25px;">&nbsp;</td>
			    </tr>
			</table></td>
		</tr>
	    </table></td>
    </tr>
</table>

<!--Banner Image Part End-->

<!--Text Part Start-->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" mc:repeatable="Note Mail" mc:variant="nm10-4-Text Part">
    <tr>
	<td align="center" valign="top"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
		<tr>
		    <td align="center" valign="middle" bgcolor="#FFFFFF" style="-moz-border-radius: 0px 0px 8px 8px; border-radius: 0px 0px 8px 8px;"><table width="490" border="0" cellspacing="0" cellpadding="0" class="two-left-inner">
			    <tr>
				<td height="60" align="center" valign="middle" style="line-height:60px; font-size:60px;">&nbsp;</td>
			    </tr>

			    <tr>
				<td align="left" valign="top" style="font-family:'Open Sans', Verdana, Arial; font-size:30px; color:#121212; font-weight:normal;" mc:edit="nm20-04"><multiline>Hi, <?= $model->first_name ? $model->first_name . " " . $model->last_name : $model->username ?></multiline></td>
		</tr>
		<tr>
		    <td height="20" align="center" valign="middle" style="line-height:20px; font-size:20px;">&nbsp;</td>
		</tr>
		<tr>
		    <td align="left" valign="top" style="font-family:'Open Sans', Verdana, Arial; font-size:14px; color:#767676; font-weight:normal; line-height:28px;" mc:edit="nm20-05"><multiline>Your confirmation code is: <strong><?= $code ?></strong><br> </multiline>
		<multiline>Regards,<br></multiline>
		<multiline>Team CryptoInvestmentWorld<br></multiline>

		Questions? <?= Html::a("Visit the Help Centre", Yii::$app->urlManager->createAbsoluteUrl("/faq.html")) ?>
	</td>
    </tr>
    <tr>
	<td height="50" align="center" valign="middle" style="line-height:50px; font-size:50px;">&nbsp;</td>
    </tr>    

    <tr>
	<td height="50" align="center" valign="middle" style="line-height:50px; font-size:50px;">&nbsp;</td>
    </tr>

</table></td>
</tr>
</table></td>
</tr>
</table>

<!--Text Part End-->

<!--Copyright Part Start-->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" mc:repeatable="Note Mail" mc:variant="nm10-5-Copyright Part">
    <tr>
	<td align="center" valign="top"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
		<tr>
		    <td align="center" valign="middle"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			    <tr>
				<td height="40" align="center" valign="middle" style="line-height:40px; font-size:40px;">&nbsp;</td>
			    </tr>
			    <tr>
				<td align="center" valign="top"><table width="490" border="0" align="center" cellpadding="0" cellspacing="0" class="two-left-inner">
					<tr>
					    <td align="left" valign="top" style="font-family:'Open Sans', Verdana, Arial; font-size:14px; color:#272f3a; font-weight:normal; line-height:24px;" mc:edit="nm20-09"><multiline>copyright &copy; <?= date("Y") ?> <?= Html::a(Yii::$app->request->serverName, Yii::$app->urlManager->createAbsoluteUrl("/")) ?> &nbsp; </multiline> </td>
			    </tr>

			</table></td>
		</tr>
		<tr>
		    <td height="40" align="center" valign="middle" style="line-height:40px; font-size:40px;">&nbsp;</td>
		</tr>
	    </table></td>
    </tr>
</table></td>
</tr>
</table>

<!--Copyright Part End-->

</td>
</tr>
</table>

<!--Main Table End-->