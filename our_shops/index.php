<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("���� ��������");
?>
<h1>���� ��������</h1>
<?
$APPLICATION->IncludeComponent("custom:our_shops", "", Array(
	"IBLOCK_TYPE" => "our_shops",	// ��� ����-�����
	"IBLOCK_ID" => "7",	// ����-����
	"CACHE_TYPE" => "N",	// ��� �����������
	"CACHE_TIME" => "3600",	// ����� ����������� (���.)
	"CACHE_FILTER" => "N",	// ���������� ��� ������������� �������
	"CACHE_GROUPS" => "Y",	// ��������� ����� �������
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

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
