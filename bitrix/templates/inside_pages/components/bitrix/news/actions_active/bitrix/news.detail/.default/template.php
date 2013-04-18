<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="mainContent">
<article class="news" itemscope itemtype="http://schema.org/Article">
<h1 itemprop="name"><?=$arResult["NAME"]?></h1>

<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
		<p itemprop="text"><?echo $arResult["DETAIL_TEXT"];?></p>
<?else:?>
		<p itemprop="text"><?echo $arResult["PREVIEW_TEXT"];?></p>
<?endif?>

<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img  itemprop="image" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="777px"  alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
<?endif?>
</article>
<a href="/actions/"><?=GetMessage("T_NEWS_DETAIL_BACK")?></a>
<!--old </section>-->
<!-- end .mainContent -->
<?
	$arFilter = Array(
		'IBLOCK_ID' => '1',
		Array(
			'LOGIC' => 'OR',
			'PROPERTY_col_availability' => '1',
			'PROPERTY_col_city_id' => strval($_SESSION['city_id'])
		)
	);
	require($_SERVER['DOCUMENT_ROOT'].'/collection/init.php');
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
				"INCLUDE_BRANDS" => "Y",
				"USE_REVIEW" => "N",
				"USE_COMPARE" => "N",
				"USE_SORT" => "N",
				"SHOW_TOP_ELEMENTS" => "N",
				"PAGE_ELEMENT_COUNT" => "32",
				"LINE_ELEMENT_COUNT" => "4",
				"ELEMENT_SORT_FIELD" => 'sort',
				"ELEMENT_SORT_ORDER" => 'asc',
				"LIST_PROPERTY_CODE" => array(0=>"col_model_code",1=>"col_price",2=>"col_sizes",3=>"col_brand",4=>"col_price_origin",5=>"add_pic_1",6=>"add_pic_2"),
				"INCLUDE_SUBSECTIONS" => "Y",
				"LIST_META_KEYWORDS" => "UF_SEC_KEYWORDS",
				"LIST_META_DESCRIPTION" => "UF_SEC_DESCRIPTON",
				"LIST_BROWSER_TITLE" => "UF_SEC_TITLE",
				"DETAIL_PROPERTY_CODE" => array(0=>"col_model_code",1=>"col_price",2=>"col_sizes",3=>"col_brand",4=>"col_price_origin",5=>"add_pic_1",6=>"add_pic_2"),
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
					//"element" => "#SECTION_CODE#/#ELEMENT_ID#/",
				//	"element" => empty($url_array[2]) ? "/#ELEMENT_ID#/" : "#SECTION_CODE#/#ELEMENT_ID#/",
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
?>
<aside class="aside">
<h2>Последние новости</h2>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"mainpage_news",
	Array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => "3",
		"NEWS_COUNT" => "3",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => "",
		"PROPERTY_CODE" => "",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "/about/news/?ELEMENT_ID=#ELEMENT_ID#",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DISPLAY_PANEL" => "N",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N"
	)
);?>
</aside>
