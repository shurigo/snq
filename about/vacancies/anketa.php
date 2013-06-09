<?
//include mailing lib
require_once($_SERVER["DOCUMENT_ROOT"]."/modules/phpmailer/class.phpmailer.php");
$code = $APPLICATION->CaptchaGetCode();

// if send button was push
if (isset($send)) {
//validate conditions
//Проверочный код
if(isset($_POST["captcha_word"]) && strlen($_POST["captcha_word"]) == 0) {
  $error_array['captcha_word_error'] = "код с картинки не введён!";
} elseif(!$APPLICATION->CaptchaCheckCode($_POST["captcha_word"], $_POST["captcha_sid"])) {
  $error_array['captcha_word_error'] = "неверный код с картинки!";
}

//check last name is correct
$msg_invalid_string = "заполнено неверно";
if(empty($last_name))                           $error_array['last_name_error']   = $msg_invalid_string;
if(empty($first_name))                          $error_array['first_name_error']  = $msg_invalid_string;
if(empty($middle_name))                         $error_array['middle_name_error'] = $msg_invalid_string;
if(empty($birthday))                            $error_array['birthday_error']    = $msg_invalid_string;
if(empty($citizenship))                         $error_array['citizenship_error'] = $msg_invalid_string;
if(empty($mobile_phone) && empty($home_phone))  $error_array['phone_error']       = $msg_invalid_string;
if(empty($email))                               $error_array['email_error']       = $msg_invalid_string;

if (count($error_array) == 0) {
  //prepare message body
  switch ($education) {
    case 1: $education_name = "Высшее";               break;
    case 2: $education_name = "Незаконченное высшее"; break;
    case 3: $education_name = "Студент";              break;
    case 4: $education_name = "Среднне-специальное";  break;
    case 5: $education_name = "Средннее";             break;
  }
$body='
<html>
<head></head>
<body>
<table cellpadding="10" border=1 width="100%">
<tr><td width="25%">Фамилия:</td><td width="70%">'.$last_name.'</td></tr>
<tr><td width="25%">Имя:</td><td width="70%">'.$first_name.'</td></tr>
<tr><td width="25%">Отчество:</td><td width="70%">'.$middle_name.'</td></tr>
<tr><td width="25%">Дата рождения:</td><td width="70%">'.$birthday.'</td></tr>
<tr><td width="25%">Гражданство:</td><td width="70%">'.$citizenship.'</td></tr>
'.((isset($address)&&($address != ""))?('<tr><td width="25%">Адрес фактического проживания:</td><td width="70%">'.$address.'</td></tr>'):("")).'
'.((isset($mobile_phone)&&($mobile_phone != ""))?('<tr><td width="25%">Мобильный телефон:*</td><td width="70%">мобильный: +7'.$mobile_phone.'</td></tr>'):("")).'
'.((isset($home_phone)&&($home_phone != ""))?('<tr><td width="25%">Домашний телефон:*</td><td width="70%">мобильный: +7'.$home_phone.'</td></tr>'):("")).'
<tr><td width="25%">Email:</td><td width="70%">'.$email.'</td></tr>
<tr><td width="25%">Образование:</td><td width="70%">'.$education_name.'</td></tr>
'.((isset($company_name)&&($company_name != ""))?('<tr><td width="25%">Последнее место работы:</td><td width="70%"></td></tr><tr><td width="30%" align="right">название компании:</td><td width="70%">'.$company_name.'</td></tr><tr><td width="30%" align="right">должность:</td><td width="70%">'.$job.'</td></tr><tr><td width="30%" align="right">должносные обязанности:</td><td width="70%">'.$duties.'</td></tr><tr><td width="30%" align="right">период работы:</td><td width="70%">c&nbsp;'.$sdate.'&nbsp;по&nbsp;'.$edate.'</td></tr><tr><td width="30%" align="right">были ли у вас подчененные?</td><td width="70%">'.$management.'</td></tr>'):("")).'
<tr><td width="25%">Социальный пакет на предыдущем месте работы:</td><td width="70%">ДМС (добровольное медецинское страхование):&nbsp;'.((isset($soc_package_d))?("Да"):("Нет")).'<br />страхование жизни:&nbsp;'.((isset($soc_package_li))?("Да"):("Нет")).'<br />оплата услуг сотовой связи:&nbsp;'.((isset($soc_package_m))?("Да"):("Нет")).'<br />оплата обедов:&nbsp;'.((isset($soc_package_l))?("Да"):("Нет")).'<br />обучение:&nbsp;'.((isset($soc_package_e))?("Да"):("Нет")).'<br />другое:&nbsp;'.((isset($soc_package_other)&&($soc_package_other != ""))?($soc_package_other):("Нет")).'</td></tr>
<tr><td width="25%">Наличие документов</td><td width="70%">действующий паспорт РФ:'.$passport.'<br />военный билет (приписное свидетельство):'.$cvidet.'</td></tr>
<tr><td width="25%">Заинтересовавшая вакансия</td><td width="70%">'.$vacancy_name.'</td></tr>
'.((isset($info)&&($info != ""))?('<tr><td width="25%">Как вы узнали о вакансии:</td><td width="70%">'.$info.'</td></tr>'):("")).'
'.((isset($additional_info)&&($additional_info != ""))?('<tr><td width="25%">Дополнительная информация:</td><td width="70%">'.$additional_info.'</td></tr>'):("")).'
'.(isset($shops)?('<tr><td width="25%">Магазины в г. '.$city_name.':</td><td width="70%">'.implode(', ', $shops).'</td></tr>'):("")).'
</body>
</html>';
echo $body;

//send message
/*
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
    echo "Ваша анкета отправлена.";
  }
*/
}

}
//draw anceta form
?>
<script>
$(function() {
    $( "#birthday" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1920:2013"
    });
    $( "#sdate" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
    $( "#edate" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
        });
</script>
<br id="anketa_form">
<br>
<hr>
<h1>Анкета</h1>
<?
if (count($error_array) != 0)
{	echo "Не все обязательные поля заполнены или заполнены не верно!";
}
?>
<form method="post" action="detail.php?id=<?=$id?><?=(isset($c) ? '&c='.$c : '')?>#anketa_form">
<input type="hidden" name="hr_email" value="<?=$hr_email?>">

<fieldset>
<table cellpadding="10" border=0>
<tr bgcolor="#EDE8EA"><td width="25%">Фамилия:*</td><td width="70%"><input type="text" name="last_name" size="70" value="<?=(isset($last_name))?($last_name):("")?>">&nbsp;<?if(strlen($error_array['last_name_error']) > 0) echo "<font color=\"red\">".$error_array['last_name_error']."</font>";?></td></tr>
<tr><td width="25%">Имя:*</td><td width="70%"><input type="text"   name="first_name" size="70" value="<?=(isset($first_name))?($first_name):("")?>">&nbsp;<?if(strlen($error_array['first_name_error']) > 0) echo "<font color=\"red\">".$error_array['first_name_error']."</font>";?></td></tr>
<tr bgcolor="#EDE8EA"><td width="25%">Отчество:*</td><td width="70%"><input type="text"   name="middle_name" size="70" value="<?=(isset($middle_name))?($middle_name):("")?>">&nbsp;<?if(strlen($error_array['middle_name_error']) > 0) echo "<font color=\"red\">".$error_array['middle_name_error']."</font>";?></td></tr>
<tr><td width="25%">Дата рождения:*</td><td width="70%"><input type="text" id="birthday" name="birthday" value="<?=(isset($birthday))?($birthday):("")?>">&nbsp;<?if(strlen($error_array['birthday_error']) > 0) echo "<font color=\"red\">".$error_array['birthday_error']."</font>";?></td></tr>
<tr bgcolor="#EDE8EA"><td width="25%">Гражданство:*</td><td width="70%"><input type="text"   name="citizenship" size="70" value="<?=(isset($citizenship))?($citizenship):("")?>">&nbsp;<?if(strlen($error_array['citizenship_error']) > 0) echo "<font color=\"red\">".$error_array['citizenship_error']."</font>";?></td></tr>
<tr><td width="25%">Адрес фактического проживания:</td><td width="70%"><input type="text" name="address" size="70" value="<?=(isset($address))?($address):("")?>"></td></tr>
<tr bgcolor="#EDE8EA"><td width="25%">Контактные телефоны:*</td><td width="70%">мобильный: +7 <input type="text" name="mobile_phone" size="10" value="<?=(isset($mobile_phone))?($mobile_phone):("")?>">&nbsp;&nbsp;&nbsp;&nbsp;или домашний: +7 <input type="text"   name="home_phone" size="10" value="<?=(isset($home_phone))?($home_phone):("")?>">&nbsp;<?if(strlen($error_array['phone_error']) > 0) echo "<font color=\"red\">".$error_array['phone_error']."</font>";?></td></tr>
<tr><td width="25%">Email:*</td><td width="70%"><input type="text" name="email" size="70" value="<?=(isset($email))?($email):("")?>">&nbsp;<?if(strlen($error_array['email_error']) > 0) echo "<font color=\"red\">".$error_array['email_error']."</font>";?></td></tr>
<tr bgcolor="#EDE8EA"><td width="25%">Образование:*</td><td width="70%"><select name="education"><option <?=($education == 1)?("selected"):("")?> value="1">Высшее</option><option <?=($education == 2)?("selected"):("")?> value="2">Незаконченное высшее</option><option <?=($education == 3)?("selected"):("")?> value="3">Студент</option><option <?=($education == 4)?("selected"):("")?> value="4">Среднне-специальное</option><option <?=($education == 5)?("selected"):("")?> value="5">Среднне</option></select></td></tr>
<tr><td width="25%">Последнее место работы:</td><td width="70%"></td></tr>
<tr bgcolor="#EDE8EA"><td width="30%" align="right">название компании:</td><td width="70%"><input type="text" name="company_name" size="70" value="<?=(isset($company_name))?($company_name):("")?>"></td></tr>
<tr><td width="30%" align="right">должность:</td><td width="70%"><input type="text"   name="job" size="70" value="<?=(isset($job))?($job):("")?>"></td></tr>
<tr bgcolor="#EDE8EA"><td width="30%" align="right">должносные обязанности:</td><td width="70%"><textarea  name="duties" cols="72" rows="5"><?=(isset($duties))?($duties):("")?></textarea></td></tr>
<tr><td width="30%" align="right">период работы:</td><td width="70%">c <input type="text"  name="sdate" size="28" id="sdate" value="<?=(isset($sdate))?($sdate):("")?>">&nbsp;по <input type="text"  name="edate" id="edate" value="<?=(isset($edate))?($edate):("")?>"size="28"></td></tr>
<tr bgcolor="#EDE8EA"><td width="30%" align="right">были ли у вас подчененные?</td><td width="70%"><input type="radio" name="management" value="нет" <?=((!isset($management)) || ($management == "нет"))?("checked"):("")?>> нет<input type="radio" name="management" value="да" <?=((isset($management)) && ($management == "да"))?("checked"):("")?>> да</td></tr>
<tr><td width="25%">Социальный пакет на предыдущем месте работы:</td>
<td width="70%">
<input type="checkbox"  name="soc_package_d" <?=(isset($soc_package_d))?("checked"):("") ?>>ДМС (добровольное медецинское страхование)<br />
<input type="checkbox"  name="soc_package_li" <?=(isset($soc_package_li))?("checked"):("") ?>>страхование жизни<br />
<input type="checkbox"  name="soc_package_m" <?=(isset($soc_package_m))?("checked"):("") ?>>оплата услуг сотовой связи<br />
<input type="checkbox"  name="soc_package_l" <?=(isset($soc_package_l))?("checked"):("") ?>>оплата обедов<br />
<input type="checkbox"  name="soc_package_e" <?=(isset($soc_package_e))?("checked"):("") ?>>обучение<br />
<input type="checkbox"  name="soc_package_o" <?=(isset($soc_package_0))?("checked"):("") ?>>впишите <input type="text" name="soc_package_other" size="55" value="<?=(isset($soc_package_other))?($soc_package_other):("")?>"><br />
</td></tr>
<tr bgcolor="#EDE8EA"><td width="25%">Наличие документов</td><td width="70%">действующий паспорт РФ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="passport" value="нет" <?=((isset($passport)) || ($passport == "нет"))?("checked"):("")?>> нет<input type="radio" name="passport" value="да" <?=((!isset($passport)) || ($passport == "да"))?("checked"):("")?>> да<br />военный билет (приписное свидетельство) <input type="radio" name="svidet" value="нет" <?=((isset($svidet)) || ($svidet == "нет"))?("checked"):("")?>> нет<input type="radio" name="cvidet" value="да" <?=((!isset($svidet)) || ($svidet == "да"))?("checked"):("")?>> да</td></tr>
<tr><td width="25%">Заинтересовавшая вакансия</td><td width="70%"><input type="text" name="vacancy" size="70" value="<?=$vacancy_name?>" disabled></td></tr>
<tr bgcolor="#EDE8EA"><td width="25%">Как вы узнали о вакансии:</td><td width="70%"><input type="text" name="info" size="70" value="<?=(isset($info))?($info):("")?>"></td></tr>
<tr><td width="25%">Дополнительная информация:</td><td width="70%"><textarea  name="additional_info" cols="72" rows="5"><?=(isset($additional_info))?($additional_info):("")?></textarea></td></tr>
<tr bgcolor="#EDE8EA"><td width="25%">Здесь вы можите прикрепить свое резюме:</td><td width="70%"><input type="file"  name="cv" size="70" maxlength="40"></td></tr>
<input type="hidden" name="captcha_sid" value="<?=$code;?>" />
<? // Append a shop list for the current city ?>
<?if(isset($_GET['c']) && is_numeric($_GET['c'])):?>
<?
  $city_res = CIBlockSection::GetList(Array(), Array('IBLOCK_ID'=>7, 'ID'=>$_GET['c']), false, Array('ID', 'NAME'), Array());
  $city = $city_res->GetNext();
?>

<input type="hidden" name="city_name" value="<?=$city['NAME']?>"/>
<tr>
  <td>Магазины в г. <?=$city['NAME']?>:</td>
  <td>    
<?  $shops = CIBlockElement::GetList(
      Array('NAME'=>'ASC'),
      Array('ACTIVE'=>'Y', 7, 'SECTION_ID' => $_GET['c']),
      false, 
      false, 
      Array('ID', 'NAME', 'IBLOCK_ID'));
    while($shop = $shops->GetNext()):?>
      <label><input type="checkbox" name="shops[]" id="shop_<?$shop['ID']?>" value="<?=trim($shop['NAME'])?>"/><?=trim($shop['NAME'])?></label><br/>
    <?endwhile;?>
  </td>
</tr>
<?endif;?>
<tr <?=isset($_GET['c']) ? 'bgcolor="#EDE8EA"' : ''?>><td width="25%">Введите код с картинки в поле ниже:</td><td width="70%">
<img src="../../bitrix/tools/captcha.php?captcha_sid=<?=$code;?>" width="180" height="40" alt="Введите код с этой картинки в поле ниже" title="Введите код с этой картинки в поле ниже" />
<br /><input type="input" name="captcha_word" value="" />&nbsp;<?if(strlen($error_array['captcha_word_error']) > 0) echo "<font color=\"red\">".$error_array['captcha_word_error']."</font>";?>
</td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="send" value="отправить"></td></tr>
</table>
</fieldset>
</form>
