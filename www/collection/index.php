<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
  $APPLICATION->SetTitle("Коллекция");

  $data_string = "component_url=".$APPLICATION->GetCurPage(true);
  $_POST['component_url']=$APPLICATION->GetCurPage(true);
  
  if (isset($_GET["price_sort"]) && in_array($_GET["price_sort"], array("asc", "desc"))) {
	$data_string .= "&price_sort=".$_GET["price_sort"];
	$_POST['price_sort']=$_GET['price_sort'];
  }

  if (isset($_GET["PAGEN_1"])) {
    $data_string .= "&PAGEN_1=".$_GET["PAGEN_1"];
  }

  if (isset($_GET["SHOWALL_1"])) {
    $data_string .= "&SHOWALL_1=".$_GET["SHOWALL_1"];
  }
?>
<style>
.catalog-price {
	color:red;
}
div.catalog-section
{
	margin:20px 45px 45px;
}
div.catalog-section table td {
	padding-right:10px;
	padding-top:10px;
}
div.cat_elem
{
	margin:20px 0 0 0;
	height:230px;
	vertical-align:bottom;
}
div.cat_elem_price {
	text-align:right;
	font-size:14px; 
	font-weight:bold; 
	margin:7px 0 0 0;
	color:#191a1e;
}
div.cat_elem_name {
	font-size:14px; 
	font-weight:bold; 
	margin:7px 0 0 0;
	color:#191a1e;
}
div.cat_elem_brand {
	font-size:11px; 
	margin:3px 0 0 0
}
div.cat_elem_code {
	font-size:11px; 
	margin:7px 0 0 0
}
td.space {
	
}
td.cat_elem {
	vertical-align:top;
}
a.cat_elem_name {
	font-size:14px; 
	font-weight:bold; 
	margin:7px 0 0 0;
	color:#191a1e;
	text-decoration:none
}
</style>
<?
  $url_array = explode("/", $APPLICATION->GetCurPage());
  
  if($url_array[1] == 'collection' && empty($url_array[2])) { 
	// Collection root undefined -> redirect to Woman collection
	LocalRedirect('/collection/woman/', true);
  }
  
  $is_product_page = is_numeric($url_array[3]) && $url_array[3] > 0;
  // enable ajax on the main collection catalog page only (not on the individual page)
  if (!$is_product_page) {
?>
<script type="text/javascript">
//*
	$.ajax({
	  type: "POST",
	  url: "/bitrix/templates/empty_page/include_areas/collection.php",
	  data: "<?=$data_string?>",
	  dataType: "html",
	  success: function(msg){
		  $("#collection_div").html(msg);
	  }
	})
//*/
</script>
<?
  } // if (!$is_product_page)
?>
<div style="margin:10px 45px 45px;">
    <noindex>
		<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
        <div style="float: right;" class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="button" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir"></div> 
    </noindex>
    <h1><?
		if ($url_array[1] == "collection")
		{
			$APPLICATION->IncludeComponent(
				"custom:catalog",
				"collection_header",
				Array(
					"AJAX_MODE" => "N",
					"SEF_MODE" => "Y",
					"IBLOCK_TYPE" => "collection",
					"IBLOCK_ID" => "1",
					"USE_FILTER" => "N",
					"USE_REVIEW" => "N",
					"USE_COMPARE" => "Y",
					"SHOW_TOP_ELEMENTS" => "N",
					"PAGE_ELEMENT_COUNT" => "30",
					"LINE_ELEMENT_COUNT" => "3",
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_ORDER" => "asc",
					"LIST_PROPERTY_CODE" => array(0=>"col_model_code",1=>"col_price",2=>"col_sizes",3=>"col_brand",4=>"col_price_new"),
					"INCLUDE_SUBSECTIONS" => "Y",
					"LIST_META_KEYWORDS" => "UF_SEC_KEYWORDS",
					"LIST_META_DESCRIPTION" => "UF_SEC_DESCRIPTON",
					"LIST_BROWSER_TITLE" => "UF_SEC_TITLE",
					"DETAIL_PROPERTY_CODE" => array(0=>"col_model_code",1=>"col_price",2=>"col_sizes",3=>"col_brand",4=>"col_sizes",5=>"col_price_new"),
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
					"DISPLAY_TOP_PAGER" => "Y",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"PAGER_TITLE" => "Модели",
					"PAGER_SHOW_ALWAYS" => "N",
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
					"ADD_SECTIONS_CHAIN" => "N"
				)
			);
		}?>
    </h1>
    <table style="width:100%;">
	<tr>
        	<td style="width:206px; vertical-align:top; padding:10px 0 0 0;">
		<?
			if ($url_array[1] == "collection" && strlen($url_array[2]) > 0)
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
      ?>
      </td>
      <td style="width:auto; vertical-align:top; padding:0 0 0 23px;">
		<div id="collection_div">
        <? 
		  if ($is_product_page) { // render the individual product page only
			require($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/empty_page/include_areas/collection.php");
		  }
        ?>
		</div>
      </td>
    </tr>
  </table>
</div>
<?
if ($is_product_page)
{
	$APPLICATION->IncludeComponent(
		"custom:catalog.section_last_view",
		"",
		Array(
			"IBLOCK_TYPE" => "collection",
			"IBLOCK_ID" => "1",
			"ELEMENT_SORT_FIELD" => "sort",
			"ELEMENT_SORT_ORDER" => "asc",
			"PROPERTY_CODE" => array(0=>"col_model_code",1=>"col_price",2=>"col_sizes",3=>"col_brand",4=>"col_price_new"),
			"META_KEYWORDS" => "UF_SEC_KEYWORDS",
			"META_DESCRIPTION" => "UF_SEC_DESCRIPTON",
			"BROWSER_TITLE" => "UF_SEC_TITLE",
			"INCLUDE_SUBSECTIONS" => "Y",
			"BASKET_URL" => "/personal/basket.php",
			"ACTION_VARIABLE" => "action",
			"PRODUCT_ID_VARIABLE" => "id",
			"SECTION_ID_VARIABLE" => "SECTION_ID",
			"FILTER_NAME" => $arParams["FILTER_NAME"],
			"DISPLAY_PANEL" => "N",
			"CACHE_TYPE" => "N",
			"CACHE_TIME" => "3600",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"SET_TITLE" => "N",
			"SET_STATUS_404" => "N",
			"USE_COMPARE" => "N",
			"PAGE_ELEMENT_COUNT" => "10000",
			"LINE_ELEMENT_COUNT" => "4",
			"PRICE_CODE" => array(0=>"col_price",),
			"USE_PRICE_COUNT" => "N",
			"SHOW_PRICE_COUNT" => "1",
			"PRICE_VAT_INCLUDE" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"PAGER_TITLE" => "Модели",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => "",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"ELEMENT_ID" => $url_array[3],
			"LAST_VIEW" => "Y",
			"VIEW_ELEMENT_COUNT" => "10000",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N"
		),
		$component
	);
}
?>
<div class="mainContent_footer">
    <div id="mainPageFooterTable">
        <table style="width:100%;">
            <tr>
                <td style="width:206px;">
                    <div class="header">Читайте также:</div><br />
                    <a href="/about/fashion_blog/">Блог модного редактора</a><br />
                    <a href="/about/about_fur/">Интересное о мехе</a><br />	
                </td>
                <td style="width:auto;">
                    <table class="darkgrey_table">
                        <tr>
                            <td class="left_top"></td>
                            <td class="top"></td>
                            <td class="right_top"></td>
                        </tr>
                        <tr>
                            <td class="left"></td>
                            <td class="center">
                                <?
								if (strlen($url_array[3]) == 0)
								{
									if (strlen($arSec["DESCRIPTION"]) > 0)
									{
										?><div style="margin:0px 0 0 0;"><?=$arSec["DESCRIPTION"]?></div><?
									}
									elseif (CModule::IncludeModule("iblock"))
									{									
										$arTopDescrSelect = Array("ID", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT");
										$arTopDescrFilter = Array("IBLOCK_ID"=>$arResult["IBLOCK_ID"], "SECTION_ID"=>$arSec["ID"], "ACTIVE"=>"N", "NAME" => "top_description");
										$dbTopDescr = CIBlockElement::GetList(array(), $arTopDescrFilter, false, array(), $arTopDescrSelect);
										if($arTopDescr = $dbTopDescr->GetNext())
										{
											?><div style="margin:0px 0 0 0;"><?=$arTopDescr["PREVIEW_TEXT"]?></div><?
										}
									}
								}
                                ?>
                                <noindex><div style="margin:5px 0 0 0;"><strong>На сайте представлена лишь часть всего ассортимента. Уточняйте цены по телефону (495) 777-8-999.</strong></div></noindex></td>
                            <td class="right"></td>
                        </tr>
                        <tr>
                            <td class="left_bot"></td>
                            <td class="bot"></td>
                            <td class="right_bot"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>
