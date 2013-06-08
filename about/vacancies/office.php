<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("�������� � �����");
?>

<h1>�������� � �����</h1>
<div id="wrapper">
<?
  $filter = array(
    "NAME"=>"�������� � �����",
    "ACTIVE"=>"Y",
    "GLOBAL_ACTIVE"=>"Y",
    "IBLOCK_ID"=>6,
    "IBLOCK_ACTIVE"=>"Y",
  );
  $ofice_section_list = CIBlockSection::GetList(array("NAME"=>"ASC"), $arFilter, false, array('ID', 'NAME'));
  $ofice_section = $ofice_section_list->GetNext();

  $res = CIBlockSection::GetList(
     Array(),
     Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y","SECTION_ID"=>$ofice_section['ID']),
     true,
     Array("ID", "NAME", "DESCRIPTION")
  );
  while($arSection = $res->GetNext())
  {
    echo '<div class="accordionButton" title="'.$arSection['DESCRIPTION'].'">'.$arSection['NAME'].'-'.$arSection['ELEMENT_CNT'].'</div><div class="accordionContent">';

    /*
    $APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"office_vacancies",
	Array(
		"IBLOCK_TYPE" => "vacancies",
		"IBLOCK_ID" => "6",
		"SECTION_ID" => $arSection['ID'],
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"COUNT_ELEMENTS" => "N",
		"TOP_DEPTH" => "2",
		"DISPLAY_PANEL" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y"
	)
);*/

   $APPLICATION->IncludeComponent("bitrix:catalog.section", "office_vacancies", Array(
	"AJAX_MODE" => "N",	// �������� ����� AJAX
	"IBLOCK_TYPE" => "vacancies",	// ��� ����-�����
	"IBLOCK_ID" => "6",	// ����-����
	"SECTION_ID" => $arSection['ID'],	// ID �������
	"SECTION_CODE" => "",	// ��� �������
	"ELEMENT_SORT_FIELD" => "sort",	// �� ������ ���� ��������� ��������
	"ELEMENT_SORT_ORDER" => "asc",	// ������� ���������� ���������
	"FILTER_NAME" => "arrFilter",	// ��� ������� �� ���������� ������� ��� ���������� ���������
	"INCLUDE_SUBSECTIONS" => "Y",	// ���������� �������� ����������� �������
	"SHOW_ALL_WO_SECTION" => "N",	// ���������� ��� ��������, ���� �� ������ ������
	"SECTION_URL" => "",	// URL, ������� �� �������� � ���������� �������
	"DETAIL_URL" => "",	// URL, ������� �� �������� � ���������� �������� �������
	"BASKET_URL" => "/personal/basket.php",	// URL, ������� �� �������� � �������� ����������
	"ACTION_VARIABLE" => "action",	// �������� ����������, � ������� ���������� ��������
	"PRODUCT_ID_VARIABLE" => "id",	// �������� ����������, � ������� ���������� ��� ������ ��� �������
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// �������� ����������, � ������� ���������� ���������� ������
	"PRODUCT_PROPS_VARIABLE" => "prop",	// �������� ����������, � ������� ���������� �������������� ������
	"SECTION_ID_VARIABLE" => "SECTION_ID",	// �������� ����������, � ������� ���������� ��� ������
	"META_KEYWORDS" => "-",	// ���������� �������� ����� �������� �� ��������
	"META_DESCRIPTION" => "-",	// ���������� �������� �������� �� ��������
	"BROWSER_TITLE" => "-",	// ���������� ��������� ���� �������� �� ��������
	"DISPLAY_PANEL" => "N",	// ��������� � �����. ������ ������ ��� ������� ����������
	"ADD_SECTIONS_CHAIN" => "N",	// �������� ������ � ������� ���������
	"DISPLAY_COMPARE" => "N",	// �������� ������ ���������
	"SET_TITLE" => "Y",	// ������������� ��������� ��������
	"SET_STATUS_404" => "N",	// ������������� ������ 404, ���� �� ������� ������� ��� ������
	"PAGE_ELEMENT_COUNT" => "30",	// ���������� ��������� �� ��������
	"LINE_ELEMENT_COUNT" => "1",	// ���������� ��������� ��������� � ����� ������ �������
	"PROPERTY_CODE" => "",	// ��������
	"PRICE_CODE" => "",	// ��� ����
	"USE_PRICE_COUNT" => "N",	// ������������ ����� ��� � �����������
	"SHOW_PRICE_COUNT" => "1",	// �������� ���� ��� ����������
	"PRICE_VAT_INCLUDE" => "Y",	// �������� ��� � ����
	"PRODUCT_PROPERTIES" => "",	// �������������� ������
	"USE_PRODUCT_QUANTITY" => "N",	// ��������� �������� ���������� ������
	"CACHE_TYPE" => "A",	// ��� �����������
	"CACHE_TIME" => "3600",	// ����� ����������� (���.)
	"CACHE_FILTER" => "N",	// ���������� ��� ������������� �������
	"CACHE_GROUPS" => "Y",	// ��������� ����� �������
	"DISPLAY_TOP_PAGER" => "N",	// �������� ��� �������
	"DISPLAY_BOTTOM_PAGER" => "N",	// �������� ��� �������
	"PAGER_TITLE" => "��������",	// �������� ���������
	"PAGER_SHOW_ALWAYS" => "N",	// �������� ������
	"PAGER_TEMPLATE" => "",	// �������� �������
	"PAGER_DESC_NUMBERING" => "N",	// ������������ �������� ���������
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// ����� ����������� ������� ��� �������� ���������
	"PAGER_SHOW_ALL" => "Y",	// ���������� ������ "���"
	"AJAX_OPTION_SHADOW" => "Y",	// �������� ���������
	"AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
	"AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
	"AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
	),
	false
);

      echo '</div>';
  };
?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>