<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
  $title = "�������� � �����";
  $APPLICATION->SetTitle($title);
  include_once($_SERVER['DOCUMENT_ROOT'].'/about/vacancies/header.php');
?>
<div id="wrapper">
<?
  $filter = array(
    "NAME"=>$title,
    "ACTIVE"=>"Y",
    "GLOBAL_ACTIVE"=>"Y",
    "IBLOCK_ID"=>"6",
    "IBLOCK_ACTIVE"=>"Y",
  );
  $section_list = CIBlockSection::GetList(array("NAME"=>"ASC"), $filter, false, array('ID', 'NAME'));
  $parent_section = $section_list->GetNext();
  $filter = array(
    "SECTION_ID"=>$parent_section['ID'],
    "ACTIVE"=>"Y",
    "GLOBAL_ACTIVE"=>"Y",
    "IBLOCK_ID"=>"6",
    "IBLOCK_ACTIVE"=>"Y"
  );
  $office_section_list = CIBlockSection::GetList(array("NAME"=>"ASC"), $filter, true, array('ID', 'NAME', 'DESCRIPTION'));
  while($arSection = $office_section_list->GetNext()) {
    if($arSection['ELEMENT_CNT'] == 0) continue; // skip empty sections
    echo '<div class="accordionButton" title="'.$arSection['DESCRIPTION'].'">'.$arSection['NAME'].'<div class="accordionButtonNumber">'.$arSection['ELEMENT_CNT'].'</div></div><div class="accordionContent">';

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
	"SET_TITLE" => "N",	// ������������� ��������� ��������
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