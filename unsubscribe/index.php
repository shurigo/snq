<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отписаться от SMS рассылки");
$APPLICATION->AddHeadString('<link rel="stylesheet" type="text/css" href="styles.css" />');
?><a name="unsubscribe"></a>
<div style="margin:10px 45px 45px;">
<h1>Отказаться от SMS рассылки</h1>
<?
$mail_to = "snowqueen@conmarkmail.ru, str@snq.ru";
$site_name = "snowqueen.ru";

$error_array = array();
if (isset($_POST['unsubscribeform']))
{
	//Телефон
	if (isset($_POST["phone_prefix"]) && is_numeric($_POST["phone_prefix"]) && $_POST["phone_prefix"] > 0)
	{
		$phone_prefix = $_POST["phone_prefix"];
	}
	if (isset($_POST["phone_block1"]) && is_numeric($_POST["phone_block1"]) && $_POST["phone_block1"] > 0)
	{
		$phone_block1 = $_POST["phone_block1"];
	}
	if (isset($_POST["phone_block2"]) && is_numeric($_POST["phone_block2"]) && $_POST["phone_block2"] > 0)
	{
		$phone_block2 = $_POST["phone_block2"];
	}
	if (isset($_POST["phone_block3"]) && is_numeric($_POST["phone_block3"]) && $_POST["phone_block3"] > 0)
	{
		$phone_block3 = $_POST["phone_block3"];
	}
	$phone_full_number = trim(strip_tags($phone_prefix . $phone_block1 . $phone_block2 . $phone_block3));
	if (strlen($phone_full_number) > 0)
	{
		if (!is_numeric($phone_full_number))
		{
			$error_array['phone_error'] = "Ошибка: при вводе используйте только цифры!";
		}
		elseif (strlen($phone_full_number) < 10)
		{
			$error_array['phone_error'] = "Ошибка: номер телефона должен состоять из 10 цифр!";
		}
		$phone = "7".$phone_full_number;
	}
	else
	{
		$error_array['phone_error'] = "Ошибка: номер телефона не ввведён!";
	}
	//Код с картинки
	if (isset($_POST["captcha_word"]) && strlen($_POST["captcha_word"]) == 0)
	{
		$error_array['captcha_word_error'] = "Ошибка: код с картинки не введён!";
	}
	elseif(!$APPLICATION->CaptchaCheckCode($_POST["captcha_word"], $_POST["captcha_sid"]) || !isset($_POST["captcha_word"]))
	{
		$error_array['captcha_word_error'] = "Ошибка: не верный код с картинки!";
	}
}

if(isset($_POST['unsubscribeform']) && count($error_array) == 0)
{
	$to = $mail_to;
	$subject  = 'Отказ от SMS рассылки';
	$message  = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1251" /><title>Отказ от SMS рассылки</title></head><body>';
	
	//echo "<pre>"; print_r(); echo "</pre>";
	$message .= '<strong>Заполнена форма отказа от SMS рассылки на сайте snowqueen.ru</strong><br>';
	if (strlen($phone) > 0)
	{
		$message .= 'Мобильный телефон: +'.$phone[0].'('.$phone[1].$phone[2].$phone[3].')'.$phone[4].$phone[5].$phone[6].'-'.$phone[7].$phone[8].'-'.$phone[9].$phone[10];
		$message .= '<br>';
	}
	
	$message .= '</body></html>';
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=windows-1251' . "\r\n";

	$headers .= 'From: noreply@snowqueen.ru' . "\r\n" .
				'Reply-To: noreply@snowqueen.ru' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
	if (mail($to, $subject, $message, $headers))
	{
		?>
		<div style="font-size:14px; margin:17px 0 0 0;"><span style="white-space:nowrap;">Спасибо, ваше сообщение принято!</span></div>
		<div style="font-size:12px; margin:10px 0 0 0;">Через 5 секунд вы будете перенаправлены на главную страницу сайта.</div>
		<script>
			setTimeout( 'location="/";', 5000);
		</script>
		<?
	}
}
else
{
	$code = $APPLICATION->CaptchaGetCode(); 
	?>
    <p>Для того, чтобы отписаться от SMS рассылки, пожалуйста, введите номер телефона и проверочный код.</p>
	<form action="<?=$_SERVER['PHP_SELF']?>#unsubscribe" method="post" enctype="multipart/form-data" id="unsubscribe">
        <input type="hidden" name="unsubscribeform" value="1" />
        <input type="hidden" name="captcha_sid" value="<?=$code;?>" />
        <div style="width:800px;">
			<script>
            function autoFocus(fieldValue, fieldMaxLength, nextFieldID)
            {
                if (fieldValue.length == fieldMaxLength)
                {
                    //alert(fieldValue);
                    document.getElementById(nextFieldID).focus();
                }
            }
            </script>
            <div class="form_name">Мобильный телефон:</div>
            <div class="form_field<?=(strlen($error_array['phone_error']) > 0)?" error":"";?>">
                <div style="float:left; margin:6px 4px 0 0;">+7</div>
                <div style="float:left; font-size:18px; margin:0 5px 0 0; vertical-align:middle;">(<input type="text" name="phone_prefix" id="phone_prefix" value="<?=(isset($phone_prefix))?$phone_prefix:'';?>" maxlength="3" style="width:23px; padding:0 4px;" onkeyup="javascript:autoFocus(this.value, 3, 'phone_block1');" />)</div>
                <div style="float:left; font-size:18px; margin:0 5px 0 0; vertical-align:middle;"><input type="text" name="phone_block1" id="phone_block1" maxlength="3" value="<?=(isset($phone_block1))?$phone_block1:'';?>" style="float:left; width:23px; padding:0 4px; margin:0 5px 0 0;" onkeyup="javascript:autoFocus(this.value, 3, 'phone_block2');" /> - </div>
                <div style="float:left; font-size:18px; margin:0 5px 0 0; vertical-align:middle;"><input type="text" name="phone_block2" id="phone_block2" maxlength="2" value="<?=(isset($phone_block2))?$phone_block2:'';?>" style="float:left; width:15px; padding:0 4px; margin:0 5px 0 0;" onkeyup="javascript:autoFocus(this.value, 2, 'phone_block3');" /> - </div>
                <div style="float:left; font-size:18px; margin:0 5px 0 0; vertical-align:middle;"><input type="text" name="phone_block3" id="phone_block3" maxlength="2" value="<?=(isset($phone_block3))?$phone_block3:'';?>" style="float:left; width:15px; padding:0 4px; margin:0 5px 0 0;" /></div>
            </div>
            <div style="clear:both;"></div>
            <?
            if(strlen($error_array['phone_error']) > 0)
            {
                ?><div class="form_error"><?=$error_array['phone_error']?></div><?
            }
            ?>
            <div class="form_name">Пожалуйста, введите цифры, указанные на картинке<span>*</span>:</div>
            <div class="form_name captcha_descr"><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$code;?>" width="180" height="40" alt="Введите код с этой картинки в поле ниже" title="Введите код с этой картинки в поле ниже" /></div>
            <div class="form_field captcha_input<?=(strlen($error_array['captcha_word_error']) > 0)?' error':'';?>">
                <input type="input" name="captcha_word" value="" />
            </div>
            <div class="clear_both"></div>
            <?
            if(strlen($error_array['captcha_word_error']) > 0)
            {
                ?><div class="form_error"><?=$error_array['captcha_word_error']?></div><?
            }
            ?>
        </div>
        <div class="form_submit"><input type="submit" name="submit" value="Отписаться от SMS рассылки" /></div>
    </form>
	<?
}
?>



</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>