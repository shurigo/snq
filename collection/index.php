<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

	$arFilter =	Array(
		'IBLOCK_ID' => '1',
		Array(
			'LOGIC' => 'OR',
			'PROPERTY_col_availability' => '1',
			'PROPERTY_col_city_id' => strval($_SESSION['city_id'])
		)
	);

	if(empty($_SESSION['discount_only'])) {
		$_SESSION['discount_only'] = 'N'; 
	}
  if(!empty($_GET['d'])) {
    if(strtolower($_GET['d'])==='y' || strtolower($_GET['d']) === 'on') {
      $_SESSION['discount_only'] = 'Y';
    } else {
      $_SESSION['discount_only'] = 'N';
		}
	}
	
	// actions mode
	if(!empty($_GET['m']) && strtolower($_GET['m']) === 'a') {
		if(!empty($_GET['sid'])) {
			parse_str($_GET['sid']);
			$arFilter['SECTION_ID'] = $sid;
		}
	}

	// search query
	if(!empty($_GET['q'])) {
		$name_filter_raw = htmlspecialchars($_GET['q'], ENT_QUOTES | ENT_HTML5 | ENT_DISALLOWED | ENT_SUBSTITUTE, 'UTF-8');
		$name_filter_raw = iconv('UTF-8', 'cp1251', $name_filter_raw);
		$name_filter_raw = mysql_real_escape_string($name_filter_raw);
		$name_filter_array = explode(' ', $name_filter_raw);
		if(is_array($name_filter_array)) {
			if(count($name_filter_array) > 0) {
				$filter_search = Array();
				foreach($name_filter_array as $key => $value) {
					$arFilter[] = array('?PROPERTY_col_title' => $value);
				}
			}
		}
	}

   // filter only items with discount
	if($_SESSION['discount_only'] === 'Y') {
    $arFilter[] = Array('PROPERTY_col_discount' => 1);
	}

	// process the brand filter (left menu)
	$filter_brand = Array();
  foreach($_GET as $key=>$value) {
		if(preg_match('/brand\d+/', $key)) {
			$filter_brand[] = Array('PROPERTY_col_brand' => $value);
		}
	}
	if(count($filter_brand) > 0) {
		$arFilter[] = array_merge(array('LOGIC' => 'OR'), $filter_brand);
	}
	// brand ID filter
	if(!empty($_GET['BRAND_ID'])) {
		$arFilter[] = Array('PROPERTY_col_brand' => $_GET['BRAND_ID']);
	}
	// process price
	if(isset($_GET['min'])) {
		$price_min = str_replace(' ', '', $_GET['min']);
		if(is_numeric(intval($price_min))) {
			$arFilter[] = Array('>=PROPERTY_col_price' => $price_min);
		}
	}
	if(isset($_GET['max'])) {
		$price_max = str_replace(' ', '', $_GET['max']);
		if(is_numeric(intval($price_max))) {
			$arFilter[] = Array('<=PROPERTY_col_price' => $price_max);
		}
	}
  $url_array = explode("/", $APPLICATION->GetCurPage());
	require($_SERVER['DOCUMENT_ROOT'].'/collection/init.php');
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

	// Collection root / idem id undefined -> redirect to Woman collection
	if($url_array[1] == 'collection'
		&& count($url_array) == 2
		&& (empty($url_array[2]) || strtolower($url_array[2]) !== 'q' || !is_numeric($url_array[2]))) {
    LocalRedirect('/collection/woman/', true);
	}

	$APPLICATION->IncludeComponent(
		"custom:catalog",
		"",
		Array(
				"AJAX_MODE" => "N",
				"SEF_MODE" => "Y",
				"IBLOCK_TYPE" => "collection",
				"IBLOCK_ID" => "1",
				"USE_FILTER" => "Y",
				"FILTER_NAME" => "arFilter",
				"INCLUDE_BRANDS" => "Y",
				"USE_REVIEW" => "N",
				"USE_COMPARE" => "N",
				"USE_SORT" => "Y",
				"DISCOUNT_ONLY" => $_SESSION['discount_only'],
				"NOT_SHOW_NAV_CHAIN" => "N",
				"SHOW_TOP_ELEMENTS" => "N",
				"PAGE_ELEMENT_COUNT" => "12",
				"LINE_ELEMENT_COUNT" => "4",
				"ELEMENT_SORT_FIELD" => $sort_field,
				"ELEMENT_SORT_ORDER" => $sort_order,
				"LIST_PROPERTY_CODE" => array(0=>"col_model_code",1=>"col_price",2=>"col_sizes",3=>"col_brand",4=>"col_price_origin",5=>"add_pic_1",6=>"add_pic_2"),
				"INCLUDE_SUBSECTIONS" => "Y",
				"LIST_META_KEYWORDS" => "UF_SEC_KEYWORDS",
				"LIST_META_DESCRIPTION" => "UF_SEC_DESCRIPTON",
				"LIST_BROWSER_TITLE" => "UF_SEC_TITLE",
				"DETAIL_PROPERTY_CODE" => array(0=>"col_model_code",1=>"col_price",2=>"col_sizes",3=>"col_brand",4=>"col_price_origin",5=>"add_pic_1",6=>"add_pic_2",7=>"col_im_link"),
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
				"JSON" => $json
			)
		);
		if(empty($url_array[3]))
		{
			$dbSec = CIBlockSection::GetList(
				array(),
				array(
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"CODE" => $url_array[2],
				)
			);
			if ($arSec = $dbSec->GetNext()) {
?>
	<aside class="aside">
<?
				$APPLICATION->IncludeComponent(
					"custom:catalog.section.list",
					"collection_mainpage",
					Array(
						"IBLOCK_TYPE" => "collection",
						"IBLOCK_ID" => "1",
						"SECTION_ID" => $arSec["ID"],
						"DISPLAY_PANEL" => "N",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "3600",
						"CACHE_GROUPS" => "Y",
						"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
						"TOP_DEPTH" => 4,
						"LEFT_MENU_FLAG" => 1,
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N"
					)
				);
	$filter_brand =	Array(
		Array(
			'LOGIC' => 'OR',
			'PROPERTY_col_availability' => '1',
			'PROPERTY_col_city_id' => strval($_SESSION['city_id'])
		)
	);
	$APPLICATION->IncludeComponent(
		"custom:catalog.section",
		"menu_checkbox",
		Array(
			"IBLOCK_ID" => "1",
			"SECTION_ID" => $arSec["ID"],
			"USE_FILTER" => "Y",
			"INCLUDE_BRANDS" => "Y", // retrieve a brand list specific to the selected elements (see $arResult['BRANDS'] array)
			"INCLUDE_PRICE_MIN_MAX" => "Y",
			"FILTER_NAME" => "filter_brand",
			"PAGE_ELEMENT_COUNT" => "1000",
			"IBLOCK_TYPE" => "collection",
			"SECTION_ID_VARIABLE" => "SECTION_ID",
			"DISPLAY_PANEL" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "3600",
			"CACHE_GROUPS" => "Y",
			"LEFT_MENU_FLAG" => 1,
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N"
		)
	);
?>
	</aside>
	<!-- end .aside-->
<?
		}
	}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>
