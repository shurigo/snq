<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
{
	ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
	return;
}
/*************************************************************************
	Processing of received parameters
*************************************************************************/
if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 3600;

unset($arParams["IBLOCK_TYPE"]); //was used only for IBLOCK_ID setup with Editor
$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);
if (is_numeric($_REQUEST["city_select"]) && ($arIBlockSection = GetIBlockSection($_REQUEST["city_select"], "our_shops")))
{
	$arParams["SECTION_ID"] = $arIBlockSection["ID"];
}
else
{
	$arParams["SECTION_ID"] = 16;
}


/*************************************************************************
			Work with cache
*************************************************************************/
//echo "<pre>"; print_r($arParams); echo "</pre>";
if($this->StartResultCache(false, array($arrFilter, $arParams["SECTION_ID"], ($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups()))))
{
	$arFilter = array(
		"ACTIVE"=>"Y",
		"GLOBAL_ACTIVE"=>"Y",
		"IBLOCK_ID"=>$arParams["IBLOCK_ID"],
		"IBLOCK_ACTIVE"=>"Y",
	);
	$arSections = array();
	$rsSections = CIBlockSection::GetList(array(), $arFilter, false, array("UF_*"));
	while($arSection = $rsSections->GetNext())
	{
		$arSections[$arSection["ID"]] = $arSection;
		if ($arSection["ID"] == $arParams["SECTION_ID"])
		{
			$arSort = array(
				"SORT" => "ASC"
			);
			$arrFilter = array(
				"ACTIVE"=>"Y",
				"GLOBAL_ACTIVE"=>"Y",
				"IBLOCK_ID"=>$arParams["IBLOCK_ID"],
				"IBLOCK_ACTIVE"=>"Y",
				"SECTION_ID" => $arSection["ID"],
			);
			$arSelect = array(
				"ID",
				"NAME",
				"PREVIEW_TEXT",
				"PROPERTY_*",
			);
			$rsElements = CIBlockElement::GetList($arSort, $arrFilter, false, false, $arSelect);
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
	//echo "<pre>"; print_r($arSection); echo "</pre>";
	$this->SetResultCacheKeys(array(
	));
	$this->IncludeComponentTemplate();
}

?>
