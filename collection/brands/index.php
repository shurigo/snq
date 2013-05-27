<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Бренды");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news",
	"brands",
	Array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"SEF_MODE" => "N",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "collection",
		"IBLOCK_ID" => "2",
		"NEWS_COUNT" => "10000",
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_REVIEW" => "N",
		"USE_FILTER" => "N",
		"SORT_BY1" => "NAME",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => "",
		"LIST_PROPERTY_CODE" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_NAME" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_FIELD_CODE" => "",
		"DETAIL_PROPERTY_CODE" => "",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DISPLAY_PANEL" => "N",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"USE_PERMISSIONS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_NOTES" => "",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Бренды",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"VARIABLE_ALIASES" => Array(
			"SECTION_ID" => "SECTION_ID",
			"ELEMENT_ID" => "BRAND_ID"
		)
	)
);?>


<?
	if(!empty($_REQUEST['BRAND_ID'])) {

	   echo "<h1>Все вещи бренда</h1><hr>";

		$arFilter = Array(
			'IBLOCK_ID' => '1',
			Array(
				'LOGIC' => 'OR',
				'PROPERTY_col_availability' => '1',
				'PROPERTY_col_city_id' => strval($_SESSION['city_id'])
		),
			'PROPERTY_col_brand' => $_REQUEST['BRAND_ID']
		);
		$APPLICATION->IncludeComponent(
			"custom:catalog.section",
			"",
			Array(
				"AJAX_MODE" => "N",
				"SEF_MODE" => "Y",
				"IBLOCK_TYPE" => "collection",
				"IBLOCK_ID" => "1",
				"USE_FILTER" => "Y",
				"FILTER_NAME" => "arFilter",
				"INCLUDE_BRANDS" => "N",
				"USE_REVIEW" => "N",
				"USE_COMPARE" => "N",
				"USE_SORT" => "N",
				"VIEW_MODE" => "brands",
				"DISCOUNT_ONLY" => "N",
				"BY_LINK" => "Y",
				"SHOW_TOP_ELEMENTS" => "N",
				"PAGE_ELEMENT_COUNT" => "32",
				"LINE_ELEMENT_COUNT" => "4",
				"ELEMENT_SORT_FIELD" => 'sort',
				"ELEMENT_SORT_ORDER" => 'asc',
				"PROPERTY_CODE" => array(0=>"col_model_code",1=>"col_price",2=>"col_sizes",3=>"col_brand",4=>"col_price_origin",5=>"add_pic_1",6=>"add_pic_2"),
				"INCLUDE_SUBSECTIONS" => "Y",
				"LIST_META_KEYWORDS" => "UF_SEC_KEYWORDS",
				"LIST_META_DESCRIPTION" => "UF_SEC_DESCRIPTON",
				"LIST_BROWSER_TITLE" => "UF_SEC_TITLE",
				"PROPERTY_CODE" => array(0=>"col_model_code",1=>"col_price",2=>"col_sizes",3=>"col_brand",4=>"col_price_origin",5=>"add_pic_1",6=>"add_pic_2"),
				"DETAIL_META_KEYWORDS" => "col_keywords",
				"DETAIL_META_DESCRIPTION" => "col_description",
				"DETAIL_BROWSER_TITLE" => "col_title",
				"ACTION_VARIABLE" => "action",
				"PRODUCT_ID_VARIABLE" => "id",
				"SECTION_ID_VARIABLE" => "SECTION_ID",
				"DISPLAY_PANEL" => "N",
				"CACHE_TYPE" => "N",
				"CACHE_TIME" => "3600",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"SET_TITLE" => "Y",
				"SET_STATUS_404" => "Y",
				"PRICE_CODE" => array(0=>"col_price",),
				"USE_PRICE_COUNT" => "N",
				"SHOW_PRICE_COUNT" => "1",
				"PRICE_VAT_INCLUDE" => "Y",
				"PRICE_VAT_SHOW_VALUE" => "N",
				"LINK_IBLOCK_TYPE" => "",
				"LINK_IBLOCK_ID" => "",
				"LINK_PROPERTY_SID" => "",
				"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_ELEMENT_SELECT_BOX" => "N",
				"ELEMENT_SORT_FIELD_BOX" => "id",
				"ELEMENT_SORT_ORDER_BOX" => "asc",
				"COMPARE_ELEMENT_SORT_FIELD" => "sort",
				"COMPARE_ELEMENT_SORT_ORDER" => "asc",
				"AJAX_OPTION_SHADOW" => "Y",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"SEF_FOLDER" => "/collection/",
				"SEF_URL_TEMPLATES" => Array(
					"section" => "#SECTION_CODE#/",
					"element" => "#SECTION_CODE#/#ELEMENT_ID#/",
				),
				"VARIABLE_ALIASES" => Array(
					"section" => Array(),
					"element" => Array(),
				),
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"JSON" => "n"
			)
		);
	}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
