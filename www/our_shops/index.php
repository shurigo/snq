<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("���� ��������");
?>
<div style="margin:10px 45px 45px;">
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
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>