<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div>
<table style="width:100%;">
    <tr>
        <td style="width:auto; padding:10px 0 0 0px;" valign="top">
        <div style="padding:0 0 15px 16px;"><h1>Коллекция Весна - Лето `12</h1></div>
        	<table style="width:100%;">
            	<tr>
                	<td style="width:50%; padding:0 2px 0 0;" valign="top">
                    	<div><img src="/images/wcollection_headerpic.jpg" width="201" height="27" alt="Женская коллекция" title="Женская коллекция" /></div>
                        <div style="height:4px; background:url(/images/wcollection_underline_bg.jpg) repeat-x; margin:0 12px 0 0;"></div>
                    	<table style="width:100%;">
                        	<tr>
                                <td valign="top" style="width:200px;"><img src="/images/collection_aw_11_12/woman.jpg" width="200" height="558" alt="Женская коллекция" title="Женская коллекция" /></td>
                                <td valign="top" style="padding:0 40px 0 0; width:100%;"><?$APPLICATION->IncludeComponent(
                                    "custom:catalog.section.list",
                                    "collection_mainpage",
                                    Array(
                                        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                                        "SECTION_ID" => 284,
                                        "SECTION_CODE" => "woman_ss12",
                                        "DISPLAY_PANEL" => "N",
                                        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                                        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                                        "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
                                
                                        "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                                    ),
                                    $component
                                );?></td>
                            </tr>
						</table>
                    </td>
                    <td style="width:50%; padding:0 0 0 2px;" valign="top">
                    	<div style="margin:0 0 0 13px;" align="right"><img src="/images/mcollection_headerpic.jpg" width="201" height="27" alt="Мужская коллекция" title="Мужская коллекция" /></div>
                        <div style="height:4px; background:url(/images/wcollection_underline_bg.jpg) repeat-x; margin:0 0 0 12px;"></div>
                    	<table style="width:100%;">
                            <tr>
                                <td valign="top" style="padding:0 0 0 0px; width:100%;"><?$APPLICATION->IncludeComponent(
                                    "custom:catalog.section.list",
                                    "collection_mainpage",
                                    Array(
                                        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                                        "SECTION_ID" => 306,
                                        "SECTION_CODE" => "man_ss12",
                                        "DISPLAY_PANEL" => "N",
                                        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                                        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                                        "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
                                
                                        "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                                    ),
                                    $component
                                );?></td>
                                <td valign="top" style="width:200px;"><img src="/images/collection_aw_11_12/man.jpg" width="200" height="558" alt="Мужская коллекция" title="Мужская коллекция" /></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
                
                        
			</td>
    </tr>
</table>
</div>

<?if($arParams["USE_COMPARE"]=="Y"):?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.compare.list",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NAME" => $arParams["COMPARE_NAME"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		"COMPARE_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
	),
	$component
);?>
<br />
<?endif?>


<?if($arParams["SHOW_TOP_ELEMENTS"]!="N"):?>
<hr />
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.top",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ELEMENT_SORT_FIELD" => $arParams["TOP_ELEMENT_SORT_FIELD"],
		"ELEMENT_SORT_ORDER" => $arParams["TOP_ELEMENT_SORT_ORDER"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
		"ELEMENT_COUNT" => $arParams["TOP_ELEMENT_COUNT"],
		"LINE_ELEMENT_COUNT" => $arParams["TOP_LINE_ELEMENT_COUNT"],
		"PROPERTY_CODE" => $arParams["TOP_PROPERTY_CODE"],
		"PRICE_CODE" => $arParams["PRICE_CODE"],
		"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
		"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
		"PRICE_VAT_SHOW_VALUE" => $arParams["PRICE_VAT_SHOW_VALUE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
	),
$component
);?>
<?endif?>