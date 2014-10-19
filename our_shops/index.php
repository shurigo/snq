<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наши магазины");
?>
<img src="http://e.snowqueen.ru/P?emv_client_id=1101052841&emv_conversionflag=y&emv_pagename=our_shops&emv_currency=rub&emv_value=1&emv_transid=<?=rand()?>&emv_random=<?=rand()?>" border="0" alt="" width="1" height="1">
<h1>Наши магазины</h1>
<?
$APPLICATION->IncludeComponent("custom:our_shops", "", Array(
	"IBLOCK_TYPE" => "our_shops",	// Тип инфо-блока
	"IBLOCK_ID" => "7",	// Инфо-блок
	"CACHE_TYPE" => "N",	// Тип кеширования
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
	"CACHE_FILTER" => "N",	// Кэшировать при установленном фильтре
	"CACHE_GROUPS" => "Y",	// Учитывать права доступа
	),
	false
);?>
<!-- HUBRUS RTB Segments Pixel V2.3 -->
<?if(HUBRUS_ENABLE):?>
<script type="text/javascript" src="http://track.hubrus.com/pixel?id=12850,12846&type=js"></script>
<?endif;?>

<script language="javascript">
var odinkod = {
"type": "transaction",
"order_value":"1",
"transaction_id":"1",
"product_list":"1"
};
var gcb = Math.round(Math.random() * 100000);
document.write('<scr'+'ipt src="'+('https:' == document.location.protocol ? 'https://ssl.' : 'http://') +
'cdn.odinkod.ru/tags/772300-390d07.js?gcb='+ gcb +'"></scr'+'ipt>');
</script>

<!-- Segment Pixel - SQ_segment - DO NOT MODIFY -->
<img src="http://ib.adnxs.com/seg?add=830761&t=2" width="1" height="1" />
<!-- End of Segment Pixel -->

<!--  AdRiver code START. Type:counter(zeropixel) Site: snowqueen PZ: 0 BN: 0 -->
<script type="text/javascript">
(function(n){
    var l = window.location, a = l.hostname.split('.');
    a.splice(a.length-2, 2);
    window[n] = (a.length ? '/' + a.join('/') : '') + l.pathname + escape(l.search);
})('sz');

var RndNum4NoCash = Math.round(Math.random() * 1000000000);
var ar_Tail='unknown'; if (document.referrer) ar_Tail = escape(document.referrer);
document.write('<img src="' + ('https:' == document.location.protocol ? 'https:' : 'http:') + '//ad.adriver.ru/cgi-bin/rle.cgi?' + 'sid=196960&bt=21&pz=0&sz=' + sz +'&rnd=' + RndNum4NoCash + '&tail256=' + ar_Tail + '" border=0 width=1 height=1>')
</script>
<noscript><img src="//ad.adriver.ru/cgi-bin/rle.cgi?sid=196960&bt=21&pz=0&rnd=1655705000" border=0 width=1 height=1></noscript>
<!--  AdRiver code END  -->

<!--
Start of DoubleClick Floodlight Tag: Please do not remove
Activity name of this tag: RU - Snowqueen - Our shops - 2014 - CV
URL of the webpage where the tag is expected to be placed: http://www.snowqueen.ru
This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
Creation Date: 04/21/2014
-->
<script type="text/javascript">
var axel = Math.random() + "";
var a = axel * 10000000000000;
document.write('<img src="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=6zxaJpoL;ord=' + a + '?" width="1" height="1" alt=""/>');
</script>
<noscript>
<img src="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=6zxaJpoL;ord=1?" width="1" height="1" alt=""/>
</noscript>
<!-- End of DoubleClick Floodlight Tag: Please do not remove -->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
