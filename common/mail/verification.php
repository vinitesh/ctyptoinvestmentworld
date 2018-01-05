<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#f0f0f0" style="background:#f0f0f0;">
    <tr>
	<td align="center" valign="top">


	    <!--Logo Part Start-->


	    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
		    <td align="center" valign="top"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
			    <tr>
				<td height="80" align="center" valign="middle" style="line-height:80px; font-size:80px;">&nbsp;</td>
			    </tr>
			</table></td>
		</tr>
	    </table>

	    <!--Logo Part End-->

	    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
		    <td align="center" valign="top"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
			    <tr>
				<td align="center" valign="middle" bgcolor="#18c197" style="-moz-border-radius: 8px 8px 0px 0px; border-radius: 8px 8px 0px 0px;"><table width="490" border="0" align="center" cellpadding="0" cellspacing="0"class="two-left-inner">
					<tr>
					    <td height="25" align="center" valign="middle" style="line-height:25px; font-size:25px;">&nbsp;</td>
					</tr>
					<tr>
					    <td align="left" valign="top">

						<table  border="0" align="left" cellpadding="0" cellspacing="0" class="full">
						    <tr>
							<td align="center" valign="top" style="font-family:'Open Sans', Verdana, Arial; font-size:30px; color:#FFF; font-weight:normal; line-height:40px;" mc:edit="nm2-01"><multiline>Confirmation</multiline></td>
					</tr>

				    </table>


				    <table width="165" border="0" align="right" cellpadding="0" cellspacing="0" class="full">

					<tr>
					    <td height="5" align="center" valign="middle" style="line-height:5px; font-size:5px;">&nbsp;</td>
					</tr>
					<tr>
					    <td align="center" valign="middle"><a href="#"><img mc:edit="nm2-02" editable="true" src="images/logo2.png" width="165" height="35" alt="" /></a></td>
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

<!--Content Part Start-->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
	<td align="center" valign="top"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
		<tr>
		    <td align="center" valign="middle" bgcolor="#FFFFFF" style="-moz-border-radius: 0px 0px 8px 8px; border-radius: 0px 0px 8px 8px;"><table width="490" border="0" cellspacing="0" cellpadding="0" class="two-left-inner">
			    <tr>
				<td height="60" align="center" valign="middle" style="line-height:60px; font-size:60px;">&nbsp;</td>
			    </tr>
			    <tr>
				<td align="left" valign="top"><table width="365" border="0" align="left" cellpadding="0" cellspacing="0" class="two-left-inner">
					<tr>
					    <td align="left" valign="top">	
						<table width="365" border="0" align="right" cellpadding="0" cellspacing="0" class="full">
						    <tr>
							<td align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
								<tr>
								    <td align="left" valign="top" style="font-family:'Open Sans', Verdana, Arial; font-size:20px; color:#18c197; font-weight:normal; line-height:34px;" mc:edit="nm2-05"><multiline>Welcome to Cryptoinvestmentworld</multiline></td>
						    </tr>
						    <tr>
							<td height="7" align="center" valign="middle" style="line-height:7px; font-size:7px;">&nbsp;</td>
						    </tr>
						    <tr>
							<td align="left" valign="top" style="font-family:'Open Sans', Verdana, Arial; font-size:24px; color:#312e2e; font-weight:normal; line-height:36px;" mc:edit="nm2-04"><multiline>Hi, <?= \Yii::$app->user->identity->username ?></multiline></td>
					</tr>						    
					<tr>
					    <td height="5" align="center" valign="middle" style="line-height:5px; font-size:5px;">&nbsp;</td>
					</tr>
				    </table></td>
			    </tr>
			</table>



		    </td>
		</tr>
            </table></td>
    </tr>
    <tr>
	<td height="30" align="center" valign="middle" style="line-height:30px; font-size:30px;">&nbsp;</td>
    </tr>
    <tr>
	<td align="left" valign="top" style="font-family:'Open Sans', Verdana, Arial; font-size:16px; color:#767676; font-weight:normal; line-height:32px;" mc:edit="nm2-06"><multiline>To complete the registration of an cryptoinvestmentworld account,  <br />
	you must verify your email address.</multiline></td>
</tr>
<tr>
    <td height="30" align="center" valign="middle" style="line-height:30px; font-size:30px;">&nbsp;</td>
</tr>
<tr>
    <td align="left" valign="top"><table width="335" border="0" align="left" cellpadding="0" cellspacing="0" class="two-left-inner">
	    <tr>
                <td align="left" valign="top">

		    <table width="320" border="0" align="left" cellpadding="0" cellspacing="0" class="two-left-inner">
			<tr>
			    <td height="48" align="center" valign="middle" style="background:#18c197; font-family:'Open Sans', Verdana, Arial; font-size:14px; color:#FFF; font-weight:normal; text-transform:uppercase; line-height:28px; -moz-border-radius: 25px; border-radius: 25px;" mc:edit="nm2-07">
			<multiline><a href="<?=
			    \Yii::$app->urlManager->createAbsoluteUrl(
				    ['verification', 'id' => \Yii::$app->user->id, 'key' => \Yii::$app->user->identity->auth_key]
			    )
			    ?>" style="text-decoration:none; color:#FFF;">Confirm Email</a>
			</multiline>
		</td>
	    </tr>
	    <tr>
		<td height="20" align="center" valign="middle" style="line-height:20px; font-size:20px;">&nbsp;</td>
	    </tr>
	</table>  
    </td>
</tr>
</table></td>
</tr>
<tr>
    <td height="60" align="center" valign="middle" style="line-height:60px; font-size:60px;">&nbsp;</td>
</tr>

</table></td>
</tr>
</table></td>
</tr>
</table>


<!--Content Part End-->

<!--Copyright Part Start-->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
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
					    <td align="left" valign="top" style="font-family:'Open Sans', Verdana, Arial; font-size:14px; color:#272f3a; font-weight:normal; line-height:24px;" mc:edit="nm2-09"><multiline>copyright &copy; <?= date('Y') ?>  cryptoinvestmentworld.com &nbsp; </multiline></td>
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