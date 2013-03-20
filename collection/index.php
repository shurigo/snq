<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
  // output JSON?
	$json = "n";
	if(isset($_GET['json'])) {
    if(in_array(strtolower($_GET['json']), array('y', 'n'))) {
		  $json = strtolower($_GET['json']);
		}
	}
	$json_next = false;
	// output JSON for the infinite scroll function
	if($json=="y") {
		while (ob_get_level()) {
			ob_end_clean();
		}
		ob_start();
		header("Content-Type: application/json");
		include $_SERVER['DOCUMENT_ROOT'].'/collection/index_json.php';
		$buf = ob_get_clean();
		if(!empty($buf)) { $flag = true; }
		echo '{ 
						"data": { 
							"next": '.$flag.', 
							"html":';
		echo json_encode(iconv('cp1251', 'utf-8',($buf))); //utf8_encode() incorrectly converts cyrillic symbols
		echo '}}';
		exit;
  } // if($json=="y")
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
    if (isset($_GET["PAGEN_1"])) {
    	$data_string .= "&PAGEN_1=".$_GET["PAGEN_1"];
  }

  if (isset($_GET["SHOWALL_1"])) {
    $data_string .= "&SHOWALL_1=".$_GET["SHOWALL_1"];
  }

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
				"PAGER_TITLE" => "Модели",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => "collection",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
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
?>
			<form class="ajax-load" action="/collection/"<?=$APPLICATION->GetCurPage()?>>
        <fieldset>
        <section class="filter">
          <div class="hr"></div>
          <label class="label">Бренд</label>
          <div class="checks">
            <ul>
              <li>
                <input name="checkbox01" class="customCheckbox" type="checkbox" value="">
                <label>ANTA</label>
							</li>
						</ul>
					</div>
					<!-- end .checks-->
					<div class="hr"></div>
          <label class="label">Ценовой диапозон, руб</label>
          <div class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
            <div class="ui-slider-range ui-widget-header" style="left: 15%; width: 45%;"></div>
            <a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 15%;"></a><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 60%;"></a></div>
          <!-- end .ui-slider-->
          <div class="slider-values">
            <input type="text" name="min" readonly class="l" value="15 000" />
            <input type="text" name="max" readonly class="r" value="60 000" />
          </div>
          <!-- end .slider-values-->
          <div class="hr"></div>
          <label class="label">Цвет</label>
          <div class="checks type2">
            <ul>
              <li>
                <input class="customCheckbox" type="checkbox" value="">
                <label>Beige</label>
              </li>
						<ul>
              <li>
                <input class="customCheckbox" type="checkbox" value="">
                <label>Black</label>
              </li>
						</ul>
          </div>
          <!-- end .checks--> 
        </section>
        </fieldset>
        </form>
        <!-- end .filter--> 
	</aside>
	<!-- end .aside-->
<?
			}
		}
	}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>
