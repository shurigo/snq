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
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
