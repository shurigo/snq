<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("������");
?>
<div>
<table style="width:100%;">
    <tr>
        <td style="width:auto; padding:10px 29px 0 16px;" valign="top">
<?$APPLICATION->IncludeComponent("bitrix:news", "brands", Array(
	"DISPLAY_DATE" => "Y",	// �������� ���� ��������
	"DISPLAY_PICTURE" => "Y",	// �������� ����������� ��� ������
	"DISPLAY_PREVIEW_TEXT" => "Y",	// �������� ����� ������
	"SEF_MODE" => "N",	// �������� ��������� ���
	"AJAX_MODE" => "N",	// �������� ����� AJAX
	"IBLOCK_TYPE" => "collection",	// ��� ����-�����
	"IBLOCK_ID" => "2",	// ����-����
	"NEWS_COUNT" => "10000",	// ���������� �������� �� ��������
	"USE_SEARCH" => "N",	// ��������� �����
	"USE_RSS" => "N",	// ��������� RSS
	"USE_RATING" => "N",	// ��������� �����������
	"USE_CATEGORIES" => "N",	// �������� ��������� �� ����
	"USE_REVIEW" => "N",	// ��������� ������
	"USE_FILTER" => "N",	// ���������� ������
	"SORT_BY1" => "NAME",	// ���� ��� ������ ���������� ��������
	"SORT_ORDER1" => "ASC",	// ����������� ��� ������ ���������� ��������
	"SORT_BY2" => "SORT",	// ���� ��� ������ ���������� ��������
	"SORT_ORDER2" => "ASC",	// ����������� ��� ������ ���������� ��������
	"CHECK_DATES" => "Y",	// ���������� ������ �������� �� ������ ������ ��������
	"PREVIEW_TRUNCATE_LEN" => "",	// ������������ ����� ������ ��� ������ (������ ��� ���� �����)
	"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",	// ������ ������ ����
	"LIST_FIELD_CODE" => "",	// ����
	"LIST_PROPERTY_CODE" => "",	// ��������
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// �������� ������, ���� ��� ���������� ��������
	"DISPLAY_NAME" => "Y",	// �������� �������� ��������
	"META_KEYWORDS" => "-",	// ���������� �������� ����� �������� �� ��������
	"META_DESCRIPTION" => "-",	// ���������� �������� �������� �� ��������
	"BROWSER_TITLE" => "-",	// ���������� ��������� ���� �������� �� ��������
	"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",	// ������ ������ ����
	"DETAIL_FIELD_CODE" => "",	// ����
	"DETAIL_PROPERTY_CODE" => "",	// ��������
	"DETAIL_DISPLAY_TOP_PAGER" => "N",	// �������� ��� �������
	"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",	// �������� ��� �������
	"DETAIL_PAGER_TITLE" => "��������",	// �������� ���������
	"DETAIL_PAGER_TEMPLATE" => "",	// �������� �������
	"DETAIL_PAGER_SHOW_ALL" => "Y",	// ���������� ������ "���"
	"DISPLAY_PANEL" => "N",	// ��������� � �����. ������ ������ ��� ������� ����������
	"SET_TITLE" => "Y",	// ������������� ��������� ��������
	"SET_STATUS_404" => "N",	// ������������� ������ 404, ���� �� ������� ������� ��� ������
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// �������� �������� � ������� ���������
	"ADD_SECTIONS_CHAIN" => "Y",	// �������� ������ � ������� ���������
	"USE_PERMISSIONS" => "N",	// ������������ �������������� ����������� �������
	"CACHE_TYPE" => "A",	// ��� �����������
	"CACHE_TIME" => "3600",	// ����� ����������� (���.)
	"CACHE_FILTER" => "N",	// ���������� ��� ������������� �������
	"CACHE_GROUPS" => "Y",	// ��������� ����� �������
	"DISPLAY_TOP_PAGER" => "N",	// �������� ��� �������
	"DISPLAY_BOTTOM_PAGER" => "Y",	// �������� ��� �������
	"PAGER_TITLE" => "������",	// �������� ���������
	"PAGER_SHOW_ALWAYS" => "Y",	// �������� ������
	"PAGER_TEMPLATE" => "",	// �������� �������
	"PAGER_DESC_NUMBERING" => "N",	// ������������ �������� ���������
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// ����� ����������� ������� ��� �������� ���������
	"PAGER_SHOW_ALL" => "Y",	// ���������� ������ "���"
	"VARIABLE_ALIASES" => array(
		"SECTION_ID" => "SECTION_ID",
		"ELEMENT_ID" => "ELEMENT_ID",
	),
	"AJAX_OPTION_SHADOW" => "Y",	// �������� ���������
	"AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
	"AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
	"AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
	),
	false
);?></td>
        <td style="width:237px; padding:30px 0 0 0;" valign="top">
</td>
    </tr>
</table>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>