<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

CPageOption::SetOptionString("main", "nav_page_in_session", "N");

/*************************************************************************
	Processing of received parameters
*************************************************************************/

$arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);
$arParams["ELEMENT_ID"] = intval($arParams["ELEMENT_ID"]);
if(!is_array($arParams["PRODUCT_PROPERTIES"]))
	$arParams["PRODUCT_PROPERTIES"] = array();

$arParams["PAGE_ELEMENT_COUNT"] = intval($arParams["PAGE_ELEMENT_COUNT"]);
if($arParams["PAGE_ELEMENT_COUNT"]<=0)
	$arParams["PAGE_ELEMENT_COUNT"]=4;
$arParams["LINE_ELEMENT_COUNT"] = intval($arParams["LINE_ELEMENT_COUNT"]);
if($arParams["LINE_ELEMENT_COUNT"]<=0)
	$arParams["LINE_ELEMENT_COUNT"]=4;
$arParams["VIEW_ELEMENT_COUNT"] = intval($arParams["VIEW_ELEMENT_COUNT"]);
if($arParams["VIEW_ELEMENT_COUNT"]<=0)
	$arParams["VIEW_ELEMENT_COUNT"]=4;


if (count($_SESSION["LAST_VIEW"]) > 0)
{
	$last_view_array = array_reverse($_SESSION["LAST_VIEW"]);
	$arResult["ITEMS"] = array();
	$cnt = 0;
	foreach($last_view_array as $item_key=>$item_value)
	{
		
		$arSort = false;
		$arFilter = array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ID" => $item_value
		);
		$arNavParams = array(
			"nPageSize" => $arParams["PAGE_ELEMENT_COUNT"],
		);
		$arSelect = array(
			"ID",
			"NAME",
			"CODE",
			"DATE_CREATE",
			"ACTIVE_FROM",
			"CREATED_BY",
			"IBLOCK_ID",
			"IBLOCK_SECTION_ID",
			"DETAIL_PAGE_URL",
			"DETAIL_TEXT",
			"DETAIL_TEXT_TYPE",
			"DETAIL_PICTURE",
			"PREVIEW_TEXT",
			"PREVIEW_TEXT_TYPE",
			"PREVIEW_PICTURE",
			"PROPERTY_*",
		);
		
		$rsElements = CIBlockElement::GetList($arSort, $arFilter, false, $arNavParams, $arSelect);
		while($obElement = $rsElements->GetNextElement())
		{
			$arItem = $obElement->GetFields();
			
			if ($arItem["ID"] == $arParams["ELEMENT_ID"] && $cnt == 0) continue;
			
			$cnt++;
			
			if($arResult["ID"])
				$arItem["IBLOCK_SECTION_ID"] = $arResult["ID"];
		
			$arItem["PREVIEW_PICTURE"] = CFile::GetFileArray($arItem["PREVIEW_PICTURE"]);
			$arItem["DETAIL_PICTURE"] = CFile::GetFileArray($arItem["DETAIL_PICTURE"]);
		
			if(count($arParams["PROPERTY_CODE"]))
				$arItem["PROPERTIES"] = $obElement->GetProperties();
			elseif(count($arParams["PRODUCT_PROPERTIES"]))
				$arItem["PROPERTIES"] = $obElement->GetProperties();
		
			$arItem["DISPLAY_PROPERTIES"] = array();
			foreach($arParams["PROPERTY_CODE"] as $pid)
			{
				$prop = &$arItem["PROPERTIES"][$pid];
				if(
					(is_array($prop["VALUE"]) && count($prop["VALUE"]) > 0)
					|| (!is_array($prop["VALUE"]) && strlen($prop["VALUE"]) > 0)
				)
				{
					$arItem["DISPLAY_PROPERTIES"][$pid] = CIBlockFormatProperties::GetDisplayValue($arItem, $prop, "catalog_out");
				}
			}
		
			$arItem["PRODUCT_PROPERTIES"] = CIBlockPriceTools::GetProductProperties(
				$arParams["IBLOCK_ID"],
				$arItem["ID"],
				$arParams["PRODUCT_PROPERTIES"],
				$arItem["PROPERTIES"]
			);
		
			if($arParams["USE_PRICE_COUNT"])
			{
				if(CModule::IncludeModule("catalog"))
				{
					$arItem["PRICE_MATRIX"] = CatalogGetPriceTableEx($arItem["ID"]);
					foreach($arItem["PRICE_MATRIX"]["COLS"] as $keyColumn=>$arColumn)
						$arItem["PRICE_MATRIX"]["COLS"][$keyColumn]["NAME_LANG"] = htmlspecialcharsex($arColumn["NAME_LANG"]);
				}
				else
				{
					$arItem["PRICE_MATRIX"] = false;
				}
				$arItem["PRICES"] = array();
			}
			else
			{
				$arItem["PRICE_MATRIX"] = false;
				$arItem["PRICES"] = CIBlockPriceTools::GetItemPrices($arParams["IBLOCK_ID"], $arResult["PRICES"], $arItem, $arParams['PRICE_VAT_INCLUDE']);
			}
			
			$dbItemSection = CIBlockSection::GetById($arItem["IBLOCK_SECTION_ID"]);
			if ($arItemSection = $dbItemSection->GetNext())
			{
				$arItem["DETAIL_PAGE_URL"] = "/collection/" . $arItemSection["CODE"] . "/" . $arItem["ID"] . "/";
			}
			
			$arResult["ITEMS"][]=$arItem;
			
		}
		if ($cnt >= $arParams["VIEW_ELEMENT_COUNT"])
		{
			break;
		}
	}
	//echo "<pre>"; print_r($_SESSION); echo "</pre>";
	$this->IncludeComponentTemplate();
}
?>
