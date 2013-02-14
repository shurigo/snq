<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");?>
<?
CModule::IncludeModule('iblock');
echo '111';
  $arFilter = Array(
	  'IBLOCK_ID' => '13',
	  'ACTIVE' => 'Y',
		//'SECTION_ID' => 132,
		//'SECTION' => 'woman',//"{$_GET['sec']}",
		//'SUBSECTION' => 'wfurs'//"{$_GET['sub']}",
		//"INCLUDE_SUBSECTIONS" => "Y"
	  //'PROPERTY' => Array('<=col_range_start' => $ip_long, '>=col_range_end' => $ip_long)
	);
$arNavStartParams = array("nPageSize" => "1", "iNumPage" => "1");
print_r($arFilter);
	$select = Array('ID', 'NAME', 'IBLOCK_ID');
  $res = CIBlockElement::GetList();
 echo '222'; 
	$select = Array('ID', 'NAME', 'IBLOCK_ID');
	$elements = CIBlockElement::GetList(
	  Array(),
	  $filter, 
	  false,
	  $arNavStartParams,
	  $select
	);
	echo '1';
	$element = $elements->GetNextElement();
print_r($element);
	$props = $element->GetFields();
	echo '<pre>';print_r($props);echo '</pre>';
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");?>
