<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/modules/phpmailer/class.phpmailer.php");

$APPLICATION->SetTitle("��������� ��������");
$body='<html>
           <head>
           </head>
           <body>
             <table width="800" align="left" bgcolor="#eeeeee" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
             <tr>
                <td rowspan=2 bgcolor="#0090bf">
                <img src="cid:card_left" width="310" height="568" border="0" style="display:block;" >
                </td>
                <td height="145" width="490" align="center" valign="middle" bgcolor="#0090bf">
                   <font color="#ffffff" size="6">'.$name.'</font>
                </td>
             </tr>
             <tr>
                <td bgcolor="#0090bf"><img src="cid:card_right" width="490" height="423" border="0" style="display:block;" ></td>
             </tr>
             </table>
           </body>
      </html>';


if (isset($send))
{
//send message
$mail           = new PHPMailer();
$mail->CharSet = 'windows-1251';
$mail->From     = $sender_email;
$mail->FromName = $sender;
$mail->Subject  = "������������ �� �������� �������� ��������";

$mail->MsgHTML($body);
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->AddAddress($email, $name);
$mail->AddEmbeddedImage('images/card_left.bmp', 'card_left');
$mail->AddEmbeddedImage('images/card_right.bmp', 'card_right');
//$mail->AddAttachment('images/card.jpg');

if(!$mail->Send()) {
    echo "Mailer Error! ".$mail->ErrorInfo."<br />";
  } else {
    echo "������������ ���������� ! ���������� :" . $name . ' (' . $email . ')<br /><a href="/services/send_card/">��������� ���</a>';
  }
}
else
{
?>
<h1>��������� ������������</h1>
<form method="post">
<fieldset>
<p>
<input type="text"   name="email" size="40" maxlength="40"><label>E-mail ���������� (��������: ipetrova@yandex.ru)</label><font color="red"><sup>*</sup></font><br><br>
<input type="text"   name="name" size="40" maxlength="40"><label>��� ���������� (��������: ����� ������� ��� ������� �����)</label><font color="red"><sup>*</sup></font><br><br>
<input type="text"   name="sender_email" size="40" maxlength="40"><label>E-mail ����������� (��������: spopova@snowqueen.ru)</label><font color="red"><sup>*</sup></font><br><br>
<input type="text"   name="sender" size="40" maxlength="40"><label>��� ����������� (��������: �������� ������)</label><font color="red"><sup>*</sup></font><br><br>
<input type="submit" name="send" value="���������"></p>
</fieldset>
</form>
<p><font color="red"><sup>*</sup></font> ���� ������������ ��� ����������</p>
<?
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>