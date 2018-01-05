<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>


<!--Main Table Start-->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#f0f0f0" style="background:#f0f0f0;">
  <tr>
    <td align="center" valign="top">
    
    
    <!--Top Space Start-->
    
    
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
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
    
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
      <tr>
        <td align="center" valign="middle" bgcolor="#18c197" style="-moz-border-radius: 8px 8px 0px 0px; border-radius: 8px 8px 0px 0px;"><table width="490" border="0" align="center" cellpadding="0" cellspacing="0"class="two-left-inner">
          <tr>
           <td height="25" align="center" valign="middle" style="line-height:25px; font-size:25px;">&nbsp;</td>
            </tr>
          <tr>
            <td align="left" valign="top"><table width="165" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
      <td align="center" valign="middle"><span style="font-family:'Open Sans', Verdana, Arial; font-size:36px; color:#FFFFFF; font-weight:normal; line-height:32px;">Password Reset</span></td>
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

<!--Logo Part End-->

<!--Content Part Start-->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
      <tr>
        <td align="center" valign="middle" bgcolor="#FFFFFF" style="-moz-border-radius: 0px 0px 8px 8px; border-radius: 0px 0px 8px 8px;"><table width="490" border="0" cellspacing="0" cellpadding="0" class="two-left-inner">
          <tr>
            <td height="80" align="center" valign="middle" style="line-height:65px; font-size:65px;">&nbsp;</td>
          </tr>

          <tr>
            <td align="center" valign="middle"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

              <tr>
                <td align="center" valign="middle" style="font-family:'Open Sans', Verdana, Arial; font-size:36px; color:#18c197; font-weight:normal;" mc:edit="nm3-02"><multiline>Reset Password</multiline></td>
              </tr>
              <tr>
                <td align="center" valign="middle" style="font-family:'Open Sans', Verdana, Arial; font-size:13px; color:#767676; font-weight:normal; line-height:32px;" mc:edit="nm3-03"><multiline>Few Step Reset your password</multiline></td>
              </tr>
              <tr>
                 <td height="25" align="center" valign="middle" style="line-height:25px; font-size:25px;">&nbsp;</td>
              </tr>
              
               <tr>
                 <td align="center" valign="middle"><table width="85" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
		  <td height="85" align="center" valign="middle" style="background:#18c197; -moz-border-radius: 85px; border-radius: 85px;"><img mc:edit="nm3-04" editable="true" src="<?= Yii::$app->urlManager->createAbsoluteUrl("images/lock-icon.png") ?>" width="45" height="45" alt="" /></td>
              </tr>
            </table></td>
              </tr>
              
               <tr>
                 <td height="25" align="center" valign="middle" style="line-height:25px; font-size:25px;">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="center" valign="middle" style="font-family:'Open Sans', Verdana, Arial; font-size:14px; color:#767676; font-weight:normal; line-height:32px;" mc:edit="nm3-05"><multiline>It is a long established fact that a reader will be distracted by the  of a page when looking at its layout. </multiline></td>
          </tr>
          <tr>
              <td height="20" align="center" valign="middle" style="line-height:20px; font-size:20px;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="middle"><table width="175" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="48" align="center" valign="middle" style="background:#18c197; font-family:'Open Sans', Verdana, Arial; font-size:15px; color:#FFF; font-weight:normal; text-transform:uppercase; line-height:28px; -moz-border-radius: 25px; border-radius: 25px;" mc:edit="nm3-06"><multiline><a href="<?= $resetLink ?>" style="text-decoration:none; color:#FFF;">Reset Password</a></multiline></td>
              </tr>
              </table></td>
          </tr>

          <tr>
            <td height="90" align="center" valign="middle" style="line-height:90px; font-size:90px;">&nbsp;</td>
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
            <td align="center" valign="top"><table width="355" border="0" align="center" cellpadding="0" cellspacing="0" class="two-left-inner">
              <tr>
                <td align="center" valign="top" style="font-family:'Open Sans', Verdana, Arial; font-size:14px; color:#272f3a; font-weight:normal; line-height:24px;" mc:edit="nm3-07"><multiline>copyright &copy; <?= date("Y") ?> feast.marketing</multiline></td>
              </tr>
              <tr>
                <td align="center" valign="top" style="font-family:'Open Sans', Verdana, Arial; font-size:14px; color:#272f3a; font-weight:bold; line-height:28px; text-transform:uppercase;" mc:edit="nm3-08"></td>
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
