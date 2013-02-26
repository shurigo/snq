<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
require_once($_SERVER["DOCUMENT_ROOT"].'/modules/smsimple/functions.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/modules/smsimple/smsimple.config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/modules/smsimple/smsimple.class.php');
$APPLICATION->SetTitle("Купон на скидку");

mb_internal_encoding('windows-1251');
$active_coupones_file="active_coupones.txt";
$activated_coupones_file="activated_coupones.csv";

// if ref page is not defined et it to none
if (!isset($utm_source)) $utm_source="none";



if (!isset($send_sms))
{

//get the first availible coupon for active coupones file
$handle = @fopen($active_coupones_file, "r");
if ($handle) {
               $coupon = str_replace(PHP_EOL,'',fgets($handle, 4096));
               fclose($handle);
             }
//print form
?><script type="text/javascript">
		$(document).ready(function(){
			PopUp($('#obj'), $('#trigg'));
		});
</script>
<table border=0 cellspacing=0 cellpadding=0>
<tr>
    <td background="images/slice_0_0.png" width="562" height="324"></td>
    <td background="images/slice_0_1.png" width="51"  height="324"></td>
    <td background="images/slice_0_2.png" width="49"  height="324"></td>
    <td background="images/slice_0_3.png" width="336"  height="324"></td>
</tr><tr>
    <td background="images/slice_1_0.png" width="562"  height="48"></td>
<!--    <td bgcolor="#00acda" width="51" height="48"><a href="print.php?coupon=<?=$coupon?>&utm_source=<?=$utm_source?>" target="_blank" title="РАСПЕЧАТАТЬ КУПОН"><img src="images/slice_1_1.png"  width="51" height="48"></a></td>
    <td bgcolor="#00acda" width="49" height="48"><a id="trigg" href="javascript:void(0);" title="ПОЛУЧИТЬ КОД ПО СМС"><img src="images/slice_1_2.png" width="49" height="48"></a></td>
-->
<td bgcolor="#00acda" width="51" height="48"><a href="print.php?coupon=<?=$coupon?>&utm_source=<?=$utm_source?>" target="_blank" title="РАСПЕЧАТАТЬ КУПОН"><img src="images/slice_1_1.png" width="51"  height="45"></a></td>
<td background="images/slice_1_2.png" width="49"  height="48"><a id="trigg" href="javascript:void(0);" title="ПОЛУЧИТЬ КОД ПО СМС"><img src="images/slice_1_2.png" width="49" height="45"></a></td>
    <td background="images/slice_1_3.png" width="336"  height="48"></td>
</tr><tr>
    <td background="images/slice_2_0.png" width="562" height="378"></td>
    <td background="images/slice_2_1.png" width="51" height="378"></td>
    <td background="images/slice_2_2.png" width="49" height="378"></td>
    <td background="images/slice_2_3.png" width="336" height="378"></td>
</tr>
</table>
<!-- pop-up window -->
<div id="obj">
<div class="sample">
<form method="post">
<fieldset>
<p>
<input type="text" name="phone"><label>Мобильный телефон (Например: 913 284 1190 - <b>без +7</b>)</label><font color="red"><sup>*</sup></font><br><br>
<input type="text" name="lastname"><label>Фамилия</label><font color="red"><sup>*</sup></font><br><br>
<input type="text" name="firstname"><label>Имя</label><font color="red"><sup>*</sup></font><br><br>
<input type="text" name="midname"><label>Отчество</label><font color="red"><sup>*</sup></font><br><br>
<input type="text" name="email"><label>e-mail</label><font color="red"><sup>*</sup></font><br><br>
<input type="checkbox" id="agree" name="agree" checked><label>Я, согласен на обработку ООО «СК Трейд» без ограничения по сроку моих персональных данных, с целью получения мною информации об акциях в магазинах сети «Снежная Королева»  посредством СМС и e-mail - рассылки.</label><br><br>
<input type="hidden" name="coupon" value="<?=$coupon?>">
<input type="hidden" name="utm_source" value="<?=$utm_source?>">
<input type="submit" name="send_sms" value="отправить"></p>
</fieldset>
</form>
<p><font color="red"><sup>*</sup></font> Поля обязятельные для заполнения</p>
</div>
</div>

<?
}
else
{
   //set main parameters
   $sms = new SMSimple(array('url' => 'http://api.smsimple.ru','username' => 'snowqueen', 'password' => 'snq11', ));

   try {
	    $sms->connect();
        $origin_id = 55772;

        //prepare a message
	    $message = mb_convert_encoding($coupon." код купона на скидку 10% на новую коллекцию в магазине \"Снежная Королева\". Код действует до 13 марта 2013. Подробнее snowqueen.ru/services/coupon/","utf8");

        //recive or not future sms
        $recive_future_sms="N";
        if (isset($agree)) $recive_future_sms="Y";

        if ($recive_future_sms=="Y")

        {

        //send sms message
        $message_id = $sms->send($origin_id, $phone, $message);

        //put data into result file
        $handle = @fopen($activated_coupones_file, "a");

        $str=$coupon.";".date('d.m.Y').";".$utm_source.";".trim($phone).";".$lastname.";".$firstname.";".$midname.";".$recive_future_sms.";".$email.";\n";

        if ($handle) {
                       fwrite($handle, $str);
                       fclose($handle);
                     }
        //remove coupone (deactivate)
 	    $arr = file($active_coupones_file);
	    unset($arr[0]);
        $arr = array_values($arr);
        file_put_contents($active_coupones_file,implode($arr));

        //print message
        echo 'Сообщение с уникальным кодом на скидку отправлено на ваш мобильный телефон! <a href="/collection/woman/"">Перейти в раздел с новой коллекцией.</a>';
        }  else
        {
           //print message
           echo 'Для того, чтобы получить промо-код на смс, Вы должны согласиться с условиями рассылки установив соответствующий "флажок" на форме отправки сообщения. <br><a href="/services/coupon/?utm_source='.$utm_source.'">Запросить промо-код еще раз.</a>';

        }

   	    }
	catch (SMSimpleException $e) {
	    print $e->getMessage();
	}

}


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");

?>