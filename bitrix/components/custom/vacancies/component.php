<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
require($_SERVER['DOCUMENT_ROOT'].'/ipgeo/geohelper.php');

if(!CModule::IncludeModule("iblock"))
{
	ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
	return;
}

//  Processing of received parameters
if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 3600;

unset($arParams["IBLOCK_TYPE"]); //was used only for IBLOCK_ID setup with Editor
$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);
$arParams["IBLOCK_SHOPS_ID"] = intval($arParams["IBLOCK_SHOPS_ID"]);
$city_select = get_city_by_name($_SESSION['city_name'], $arParams['IBLOCK_ID']);
if (is_numeric($city_select) && ($arIBlockSection = GetIBlockSection($city_select, "vacancies"))) {
	$arParams["SECTION_ID"] = $arIBlockSection["ID"];
} else {
	$arParams["SECTION_ID"] = 183;
}

// Work with cache
if($this->StartResultCache(false, array($arrFilter, $arParams["SECTION_ID"], ($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups()))))
{
	$arFilter = array(
		"ACTIVE"=>"Y",
		"GLOBAL_ACTIVE"=>"Y",
		"IBLOCK_ID"=>$arParams["IBLOCK_SHOPS_ID"],
		"IBLOCK_ACTIVE"=>"Y",
	);
	$arSections = array();
	$rsSections = CIBlockSection::GetList(array("NAME"=>"ASC"), $arFilter, false, array("UF_*"));
	while($arSection = $rsSections->GetNext()) {
		$arSections[$arSection["ID"]] = $arSection;
		if ($arSection["NAME"] == $arParams["SECTION_NAME"]) {
			$arSort = array(
				"NAME" => "ASC"
			);
			$arrFilter = array(
				"ACTIVE"=>"Y",
				"GLOBAL_ACTIVE"=>"Y",
				"IBLOCK_ID"=>$arParams["IBLOCK_ID"],
				"IBLOCK_ACTIVE"=>"Y",
				"NAME" => $arParams["SECTION_NAME"],
			);
			$arSelect = array(
				"ID",
				"NAME",
				"PREVIEW_TEXT",
				"PROPERTY_*",
			);
			$sections = CIBlockSection::GetList($arSort, $arrFilter, false, false, $arSelect);
      $section = $sections->GetNext();
			$rsElements = CIBlockElement::GetList(
        $arSort, 
        Array(
          'ACTIVE'=>'Y', 
          'IBLOCK_ID'=>$arParams['IBLOCK_ID'],
          'SECTION_ID' => $section['ID']
        ),
        false, 
        Array(
          "ID",
          "NAME",
          "PREVIEW_TEXT",
          "PROPERTY_*"
        ),
        Array()
      );
      $rsElements->SetUrlTemplates($arParams["DETAIL_URL"]);
			$rsElements->SetSectionContext($arSection);
			$arSection["ITEMS"] = array();
			while($obElement = $rsElements->GetNext())
			{
				$arSections[$arSection["ID"]]["ITEMS"][] = $obElement;
			}
		}
	}
	$arResult = $arSections;
	$this->SetResultCacheKeys(array());
	$this->IncludeComponentTemplate();
}

?>
