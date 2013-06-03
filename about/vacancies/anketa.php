<?
if (isset($send))
{require_once($_SERVER["DOCUMENT_ROOT"]."/modules/phpmailer/class.phpmailer.php");
$body='<html>
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
$mail->Subject  = "Отклик на вакансию";

$mail->MsgHTML($body);
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->AddAddress($hr_email, "HR Snowqueen.ru");
//$mail->AddEmbeddedImage('images/card_left.bmp', 'card_left');
//$mail->AddEmbeddedImage('images/card_right.bmp', 'card_right');
$mail->AddAttachment($cv);

if(!$mail->Send()) {
    echo "Mailer Error! ".$mail->ErrorInfo."<br />";
  } else {
    echo "Отклик отправлен!";
  }

}
else
{
?>
<script>
$(function() {
    $( "#birthday" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
    });
</script>
<br>
<hr>
<?
$code = $APPLICATION->CaptchaGetCode();
?>
<h1>Анкета</h1>
<form method="post">
<input type="hidden" name="hr_email" value="<?=$hr_email?>">
<fieldset>
<table>
<tr><td width="30%">Фамилия:*</td><td width="70%"><input type="text" name="last_name" size="40" maxlength="40" value="<?=(isset($last_name))?($last_name):("")?>"></td></tr>
<tr><td width="30%">Имя:*</td><td width="70%"><input type="text"   name="first_name" size="40" maxlength="40" value="<?=(isset($first_name))?($first_name):("")?>"></td></tr>
<tr><td width="30%">Отчество:*</td><td width="70%"><input type="text"   name="middle_name" size="40" maxlength="40" value="<?=(isset($middle_name))?($middle_name):("")?>"></td></tr>
<tr><td width="30%">Дата рождения:*</td><td width="70%"><input type="text" id="birthday" value="<?=(isset($birthday))?($birthday):("")?>"></td></tr>
<tr><td width="30%">Гражданство:*</td><td width="70%"><input type="text"   name="citizenship" size="40" maxlength="40" value="<?=(isset($citizenship))?($citizenship):("")?>"></td></tr>
<tr><td width="30%">Адрес фактического проживания:</td><td width="70%"><input type="text" name="address" size="40" maxlength="40" value="<?=(isset($address))?($address):("")?>"></td></tr>
<tr><td width="30%">Контактные телефоны:*</td><td width="70%">мобильный:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+7<input type="text" name="mobile_phone" size="10" maxlength="40" value="<?=(isset($mobile_phone))?($mobile_phone):("")?>"><br /><br />&nbsp;или домашний: +7<input type="text"   name="home_phone" size="10" maxlength="40" value="<?=(isset($home_phone))?($home_phone):("")?>"></td></tr>
<tr><td width="30%">Email:*</td><td width="70%"><input type="text" name="email" size="40" maxlength="40" value="<?=(isset($email))?($email):("")?>"></td></tr>
<tr><td width="30%">Образование:*</td><td width="70%"><select name="education"><option>Высшее</option><option>Незаконченное высшее</option><option>Студент</option><option>Среднне-специальное</option><option>Среднне</option></select></td></tr>
<tr><td width="30%">Последнее место работы:</td><td width="70%"></td></tr>
<tr><td width="30%" align="right">название компании:</td><td width="70%"><input type="text" name="company_name" size="40" maxlength="40" value="<?=(isset($company_name))?($company_name):("")?>"></td></tr>
<tr><td width="30%" align="right">должность:</td><td width="70%"><input type="text"   name="job" size="40" maxlength="40" value="<?=(isset($job))?($job):("")?>"></td></tr>
<tr><td width="30%" align="right">должносные обязанности:</td><td width="70%"><textarea  name="duties" cols="42" rows="5"><?=(isset($duties))?($duties):("")?></textarea></td></tr>
<tr><td width="30%" align="right">период работы:</td><td width="70%"><input type="text"  name="duties" size="40" maxlength="40"></td></tr>
<tr><td width="30%" align="right">были ли у вас подчененные?</td><td width="70%"><input type="radio" name="management" value="нет" checked> нет<input type="radio" name="management" value="да"> да</td></tr>
<tr><td width="30%">Социальный пакет на предыдущем месте работы:</td>
<td width="70%">
<input type="checkbox"  name="soc_package" value="ДМС">ДМС (добровольное медецинское страхование)<br />
<input type="checkbox"  name="soc_package" value="страхование жизни">страхование жизни<br />
<input type="checkbox"  name="soc_package" value="оплата услуг сотовой связи">оплата услуг сотовой связи<br />
<input type="checkbox"  name="soc_package" value="оплата обедов">оплата обедов<br />
<input type="checkbox"  name="soc_package" value="обучение">обучение<br />
<input type="checkbox"  name="soc_package" value="другое">впишите <input type="text"   name="soc_package_other" size="40" maxlength="40"><br />
</td></tr>
<tr><td width="30%">Наличие документов</td><td width="70%">действующий паспорт РФ <input type="radio" name="passport" value="нет"> нет<input type="radio" name="passport" value="да" checked> да<br />военный билет (приписное свидетельство)<input type="radio" name="svidet" value="нет"> нет<input type="radio" name="cvidet" value="да" checked> да</td></tr>
<tr><td width="30%">Заинтересовавшая вакансия</td><td width="70%"><input type="text" name="vacancy" size="40" maxlength="40" value="<?=$vacancy_name?>" disabled></td></tr>
<tr><td width="30%">Как вы узнали о вакансии:</td><td width="70%"><input type="text" name="info" size="40" maxlength="40" value="<?=(isset($info))?($info):("")?>"></td></tr>
<tr><td width="30%">Здесь вы можите прикрепить свое резюме:</td><td width="70%"><input type="file"  name="cv" size="40" maxlength="40"></td></tr>

<tr><td width="30%">Введите код с картинки в поле ниже:</td><td width="70%">
							<div class="form_field"><img src="../../bitrix/tools/captcha.php?captcha_sid=<?=$code;?>" width="180" height="40" alt="Введите код с этой картинки в поле ниже" title="Введите код с этой картинки в поле ниже" /></div>
							<div class="form_field<?=(strlen($error_array['captcha_word_error']) > 0)?' error':'';?>">
								<input type="input" name="captcha_word" value="" />
							</div>
							<?
							if(strlen($error_array['captcha_word_error']) > 0)
							{
								?><div class="form_error"><?=$error_array['captcha_word_error']?></div><?
							}
							?>
</td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="send" value="отправить"></td></tr>
</table>
</fieldset>
</form>
</table>
<?
}
?>