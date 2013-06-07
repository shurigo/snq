<?
//include mailing lib
require_once($_SERVER["DOCUMENT_ROOT"]."/modules/phpmailer/class.phpmailer.php");
$code = $APPLICATION->CaptchaGetCode();

// if send button was push
if (isset($send))
{
//validate conditions
//����������� ���
if (isset($_POST["captcha_word"]) && strlen($_POST["captcha_word"]) == 0)
	{
		$error_array['captcha_word_error'] = "��� � �������� �� �����!";
	}
elseif(!$APPLICATION->CaptchaCheckCode($_POST["captcha_word"], $_POST["captcha_sid"]))
	{
		$error_array['captcha_word_error'] = "�� ������ ��� � ��������!";
	}

//check last name is correct
if (!isset($last_name) || $last_name == "")    $error_array['last_name_error'] = "��������� �������!";
if (!isset($first_name) || $first_name == "")    $error_array['first_name_error'] = "��������� �������!";
if (!isset($middle_name) || $middle_name == "")    $error_array['middle_name_error'] = "��������� �������!";
if (!isset($birthday) || $birthday == "")    $error_array['birthday_error'] = "��������� �������!";

if (count($error_array) == 0)
{
//prepare message body$body='<html>
           <head>
           </head>
           <body>
             <table width="800" align="left" bgcolor="#eeeeee" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
             <tr>
                <td>'.$vacancy.'</td>
             </tr>
             </table>
           </body>
      </html>';

//send message
$mail           = new PHPMailer();
$mail->CharSet = 'windows-1251';
$mail->From     = $email;
$mail->FromName = $last_name." ".$first_name;
$mail->Subject  = "������ �� ��������";

$mail->MsgHTML($body);
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->AddAddress($hr_email, "HR Snowqueen.ru");
//$mail->AddEmbeddedImage('images/card_left.bmp', 'card_left');
//$mail->AddEmbeddedImage('images/card_right.bmp', 'card_right');
$mail->AddAttachment($cv);

if(!$mail->Send()) {
    echo "Mailer Error! ".$mail->ErrorInfo."<br />";
  } else {
    echo "���� ������ ����������.";
  }
}
}
//draw anceta form
?>
<script>
$(function() {
    $( "#birthday" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
    });
</script>
<br id="anketa_form">
<br>
<hr>
<h1>������</h1>
<?
if (count($error_array) != 0)
{	echo "�� ��� ������������ ���� ��������� ��� ��������� �� �����!";
}
?>
<form method="post" action="detail.php?id=<?=$id?>#anketa_form">
<input type="hidden" name="hr_email" value="<?=$hr_email?>">

<fieldset>
<table cellpadding="10" border=0>
<tr bgcolor="#EDE8EA"><td width="25%">�������:*</td><td width="70%"><input type="text" name="last_name" size="70" value="<?=(isset($last_name))?($last_name):("")?>">&nbsp;<?if(strlen($error_array['last_name_error']) > 0) echo "<font color=\"red\">".$error_array['last_name_error']."</font>";?></td></tr>
<tr><td width="25%">���:*</td><td width="70%"><input type="text"   name="first_name" size="70" value="<?=(isset($first_name))?($first_name):("")?>">&nbsp;<?if(strlen($error_array['first_name_error']) > 0) echo "<font color=\"red\">".$error_array['first_name_error']."</font>";?></td></tr>
<tr bgcolor="#EDE8EA"><td width="25%">��������:*</td><td width="70%"><input type="text"   name="middle_name" size="70" value="<?=(isset($middle_name))?($middle_name):("")?>">&nbsp;<?if(strlen($error_array['middle_name_error']) > 0) echo "<font color=\"red\">".$error_array['middle_name_error']."</font>";?></td></tr>
<tr><td width="25%">���� ��������:*</td><td width="70%"><input type="text" id="birthday" name="birthday" value="<?=(isset($birthday))?($birthday):("")?>">&nbsp;<?if(strlen($error_array['birthday_error']) > 0) echo "<font color=\"red\">".$error_array['birthday_error']."</font>";?></td></tr>
<tr bgcolor="#EDE8EA"><td width="25%">�����������:*</td><td width="70%"><input type="text"   name="citizenship" size="70" value="<?=(isset($citizenship))?($citizenship):("")?>"></td></tr>
<tr><td width="25%">����� ������������ ����������:</td><td width="70%"><input type="text" name="address" size="70" value="<?=(isset($address))?($address):("")?>"></td></tr>
<tr bgcolor="#EDE8EA"><td width="25%">���������� ��������:*</td><td width="70%">���������: +7 <input type="text" name="mobile_phone" size="10" value="<?=(isset($mobile_phone))?($mobile_phone):("")?>">&nbsp;&nbsp;&nbsp;&nbsp;��� ��������: +7 <input type="text"   name="home_phone" size="10" value="<?=(isset($home_phone))?($home_phone):("")?>"></td></tr>
<tr><td width="25%">Email:*</td><td width="70%"><input type="text" name="email" size="70" value="<?=(isset($email))?($email):("")?>"></td></tr>
<tr bgcolor="#EDE8EA"><td width="25%">�����������:*</td><td width="70%"><select name="education"><option>������</option><option>������������� ������</option><option>�������</option><option>�������-�����������</option><option>�������</option></select></td></tr>
<tr><td width="25%">��������� ����� ������:</td><td width="70%"></td></tr>
<tr bgcolor="#EDE8EA"><td width="30%" align="right">�������� ��������:</td><td width="70%"><input type="text" name="company_name" size="70" value="<?=(isset($company_name))?($company_name):("")?>"></td></tr>
<tr><td width="30%" align="right">���������:</td><td width="70%"><input type="text"   name="job" size="70" value="<?=(isset($job))?($job):("")?>"></td></tr>
<tr bgcolor="#EDE8EA"><td width="30%" align="right">���������� �����������:</td><td width="70%"><textarea  name="duties" cols="72" rows="5"><?=(isset($duties))?($duties):("")?></textarea></td></tr>
<tr><td width="30%" align="right">������ ������:</td><td width="70%"><input type="text"  name="duties" size="70" maxlength="40"></td></tr>
<tr bgcolor="#EDE8EA"><td width="30%" align="right">���� �� � ��� �����������?</td><td width="70%"><input type="radio" name="management" value="���" checked> ���<input type="radio" name="management" value="��"> ��</td></tr>
<tr><td width="25%">���������� ����� �� ���������� ����� ������:</td>
<td width="70%">
<input type="checkbox"  name="soc_package" value="���">��� (������������ ����������� �����������)<br />
<input type="checkbox"  name="soc_package" value="����������� �����">����������� �����<br />
<input type="checkbox"  name="soc_package" value="������ ����� ������� �����">������ ����� ������� �����<br />
<input type="checkbox"  name="soc_package" value="������ ������">������ ������<br />
<input type="checkbox"  name="soc_package" value="��������">��������<br />
<input type="checkbox"  name="soc_package" value="������">������� <input type="text" name="soc_package_other" size="55" maxlength="40"><br />
</td></tr>
<tr bgcolor="#EDE8EA"><td width="25%">������� ����������</td><td width="70%">����������� ������� �� &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="passport" value="���"> ���<input type="radio" name="passport" value="��" checked> ��<br />������� ����� (��������� �������������) <input type="radio" name="svidet" value="���"> ���<input type="radio" name="cvidet" value="��" checked> ��</td></tr>
<tr><td width="25%">���������������� ��������</td><td width="70%"><input type="text" name="vacancy" size="70" value="<?=$vacancy_name?>" disabled></td></tr>
<tr bgcolor="#EDE8EA"><td width="25%">��� �� ������ � ��������:</td><td width="70%"><input type="text" name="info" size="70" value="<?=(isset($info))?($info):("")?>"></td></tr>
<tr><td width="25%">�������������� ����������:</td><td width="70%"><textarea  name="additional_info" cols="72" rows="5"><?=(isset($additional_info))?($additional_info):("")?></textarea></td></tr>
<tr bgcolor="#EDE8EA"><td width="25%">����� �� ������ ���������� ���� ������:</td><td width="70%"><input type="file"  name="cv" size="70" maxlength="40"></td></tr>
<input type="hidden" name="captcha_sid" value="<?=$code;?>" />
<tr><td width="25%">������� ��� � �������� � ���� ����:</td><td width="70%">
<img src="../../bitrix/tools/captcha.php?captcha_sid=<?=$code;?>" width="180" height="40" alt="������� ��� � ���� �������� � ���� ����" title="������� ��� � ���� �������� � ���� ����" />
<br /><input type="input" name="captcha_word" value="" />&nbsp;<?if(strlen($error_array['captcha_word_error']) > 0) echo $error_array['captcha_word_error'];?>
</td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="send" value="���������"></td></tr>
</table>
</fieldset>
</form>
</table>