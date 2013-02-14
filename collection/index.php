<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
  $APPLICATION->SetTitle("Коллекция");

  $data_string = "component_url=".$APPLICATION->GetCurPage(true);
  $_POST['component_url']=$APPLICATION->GetCurPage(true);
  $url_array = explode("/", $APPLICATION->GetCurPage());

  // Collection root undefined -> redirect to Woman collection
  if($url_array[1] == 'collection' && empty($url_array[2])) {
    LocalRedirect('/collection/woman/', true);
  }
  if ($url_array[1] == "collection")
	{
		//$page = (empty($_GET['page']) || !is_numeric($_GET['page'])) ? 1 : $_GET['page'];
		//CModule::IncludeModule('iblock');

        if (isset($_GET["PAGEN_1"])) {
    $data_string .= "&PAGEN_1=".$_GET["PAGEN_1"];
  }

  if (isset($_GET["SHOWALL_1"])) {
    $data_string .= "&SHOWALL_1=".$_GET["SHOWALL_1"];
  }

		$arFilter = Array(
		    'PROPERTY' => Array(
		      //'!col_availability' => false,
		      //'!col_availability' => 0,
		      //Array('LOGIC' => 'OR',
		      //  'col_availability' => 1,
				//Array('col_availability' => 2, 'col_city_id' => $_SESSION['city_id'])
		      //)
		    )
		  );

		$APPLICATION->IncludeComponent(
			"custom:catalog",
			"",
			Array(
				"AJAX_MODE" => "N",
				"SEF_MODE" => "Y",
				"IBLOCK_TYPE" => "collection",
				"IBLOCK_ID" => "1",
				"USE_FILTER" => "N",
				"FILTER_NAME" => "arFilter",
				"USE_REVIEW" => "N",
				"USE_COMPARE" => "N",
				"SHOW_TOP_ELEMENTS" => "N",
				"PAGE_ELEMENT_COUNT" => "32",
				"LINE_ELEMENT_COUNT" => "3",
				"ELEMENT_SORT_FIELD" => "sort",
				"ELEMENT_SORT_ORDER" => "asc",
				"LIST_PROPERTY_CODE" => array(0=>"col_model_code",1=>"col_price",2=>"col_sizes",3=>"col_brand",4=>"col_price_new",5=>"add_pic_1",6=>"add_pic_2"),
				"INCLUDE_SUBSECTIONS" => "Y",
				"LIST_META_KEYWORDS" => "UF_SEC_KEYWORDS",
				"LIST_META_DESCRIPTION" => "UF_SEC_DESCRIPTON",
				"LIST_BROWSER_TITLE" => "UF_SEC_TITLE",
				"DETAIL_PROPERTY_CODE" => array(0=>"col_model_code",1=>"col_price",2=>"col_sizes",3=>"col_brand",4=>"col_price_new",5=>"add_pic_1",6=>"add_pic_2"),
				"DETAIL_META_KEYWORDS" => "col_keywords",
				"DETAIL_META_DESCRIPTION" => "col_description",
				"DETAIL_BROWSER_TITLE" => "col_title",
				"BASKET_URL" => "/personal/basket.php",
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
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"PAGER_TITLE" => "Модели",
				"PAGER_SHOW_ALWAYS" => "Y",
				"PAGER_TEMPLATE" => "collection",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "Y",
				"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
				"COMPARE_FIELD_CODE" => array(0=>"ID",1=>"NAME",2=>"PREVIEW_TEXT",3=>"PREVIEW_PICTURE",4=>"DETAIL_TEXT",5=>"DETAIL_PICTURE",),
				"COMPARE_PROPERTY_CODE" => array(0=>"col_model_code",1=>"col_price",2=>"col_sizes",),
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
					"compare" => "compare.php?action=#ACTION_CODE#"
				),
				"VARIABLE_ALIASES" => Array(
					"section" => Array(),
					"element" => Array(),
					"compare" => Array(
						"ACTION_CODE" => "action"
					),
				),
				"COMPONENT_URL" => $_POST["component_url"],
				"PRICE_SORT" => $_POST["price_sort"],
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"PAGE_NUMBER" => "{$page}",
				"JSON" => "0"
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
			if ($arSec = $dbSec->GetNext())
			{
?>
	<aside class="aside">
<?
							$APPLICATION->IncludeComponent(
								"custom:catalog.section.list",
								"collection_mainpage",
								Array(
									"IBLOCK_TYPE" => "collection",
									"IBLOCK_ID" => 1,
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
			}
		}
	}

  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>
