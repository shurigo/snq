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
if (!isset($place)) $place="none";



if (!isset($send_sms))
{

//get the first availible coupon for active coupones file
$handle = @fopen($active_coupones_file, "r");
if ($handle) {
               $coupon = str_replace(PHP_EOL,'',fgets($handle, 4096));
               fclose($handle);
             }
//print form
?>
<script type="text/javascript">
		$(document).ready(function(){
			PopUp($('#obj'), $('#trigg'));
		});
</script>

<table border=0 cellspacing=0 cellpadding=0>
<tr>
<td background="images/landing_page_top_1.bmp" height=330 width=578></td>
<td background="images/landing_page_top_2.bmp" height=330 width=35></td>
<td background="images/landing_page_top_3.bmp" height=330 width=7></td>
<td background="images/landing_page_top_4.bmp" height=330 width=34></td>
<td background="images/landing_page_top_5.bmp" height=330 width=344></td>
</tr><tr>
<td background="images/landing_page_mid_1.bmp" height=35 width=578></td>
<td height=35 width=35 bgcolor="#00acda"><a href="print.php?coupon=<?=$coupon?>&place=<?=$place?>" target="_blank" title="РАСПЕЧАТАТЬ КУПОН"><img src="images/landing_page_print.bmp" height=32 width=32></a></td>
<td background="images/landing_page_mid_2.bmp" height=35 width=7></td>
<td height=35 width=34 bgcolor="#00acda"><a id="trigg" href="javascript:void(0);" title="ПОЛУЧИТЬ КОД ПО СМС"><img src="images/landing_page_sms.bmp" height=32 width=32></a></td>
<td background="images/landing_page_mid_3.bmp" height=35 width=344></td>
</tr><tr>
<td background="images/landing_page_down_1.bmp" height=385 width=578></td>
<td background="images/landing_page_down_2.bmp" height=385 width=35></td>
<td background="images/landing_page_down_3.bmp" height=385 width=7></td>
<td background="images/landing_page_down_4.bmp" height=385 width=34></td>
<td background="images/landing_page_down_5.png" height=385 width=344></td>
</tr>
</table>

<!-- pop-up window -->
<div id="obj">
<div class="sample">
<form method="post">
<fieldset>
<p>
<input type="text" name="phone"><label>Мобильный телефон (Например: 913 284 1190 - <b>без +7</b>)</label><br><br>
<input type="text" name="lastname"><label>Фамилия</label><br><br>
<input type="text" name="firstname"><label>Имя</label><br><br>
<input type="text" name="midname"><label>Отчество</label><br><br>
<input type="checkbox" id="agree" name="agree"><label>Я, согласен на обработку ООО «СК Трейд» без ограничения по сроку моих персональных данных, с целью получения мною информации об акциях в магазинах сети «Снежная Королева»  посредством смс - рассылки.</label><br><br>
<input type="hidden" name="coupon" value="<?=$coupon?>">
<input type="hidden" name="place" value="<?=$place?>">
<input type="submit" name="send_sms" value="отправить"></p>
</fieldset>
</form>
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

        //send sms message
        $message_id = $sms->send($origin_id, $phone, $message);

        //put data into result file
        $handle = @fopen($activated_coupones_file, "a");
        //recive or not future sms
        $recive_future_sms="N";
        if (isset($agree)) $recive_future_sms="Y";

        $str=$coupon.";".date('d.m.Y').";".$place.";".trim($phone).";".$lastname.";".$firstname.";".$midname.";".$recive_future_sms.";\n";

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
        echo 'Сообщение с уникальным кодом на скидку отправлено на ваш мобильный телефон! <a href="/collection/woman/"">Перейти в раздел с новой коллекцией.';

   	    }
	catch (SMSimpleException $e) {
	    print $e->getMessage();
	}

}


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");

?>