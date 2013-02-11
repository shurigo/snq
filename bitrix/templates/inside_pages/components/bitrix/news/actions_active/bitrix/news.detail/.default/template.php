<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="mainContent">

<article class="news" itemscope itemtype="http://schema.org/Product">
<h1 itemprop="name"><?=$arResult["NAME"]?></h1>

<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
		<p itemprop="text"><?echo $arResult["DETAIL_TEXT"];?></p>
<?else:?>
		<p itemprop="text"><?echo $arResult["PREVIEW_TEXT"];?></p>
<?endif?>

<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img  itemprop="image" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="777px"  alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
<?endif?>

<?
if ($APPLICATION->GetCurPage() == "/actions/1059/")
{
	$APPLICATION->IncludeComponent("bitrix:catalog.section", "good_price", Array(
                "AJAX_MODE" => "N",	// �������� ����� AJAX
                "IBLOCK_TYPE" => "collection",	// ��� ����-�����
                "IBLOCK_ID" => "1",	// ����-����
                "SECTION_ID" => "88",	// ID �������
                "SECTION_CODE" => "goodprice_ss11",	// ��� �������
                "ELEMENT_SORT_FIELD" => "sort",	// �� ������ ���� ��������� ��������
                "ELEMENT_SORT_ORDER" => "asc",	// ������� ���������� ���������
                "FILTER_NAME" => "arrFilter",	// ��� ������� �� ���������� ������� ��� ���������� ���������
                "INCLUDE_SUBSECTIONS" => "Y",	// ���������� �������� ����������� �������
                "SHOW_ALL_WO_SECTION" => "N",	// ���������� ��� ��������, ���� �� ������ ������
                "SECTION_URL" => "",	// URL, ������� �� �������� � ���������� �������
                "DETAIL_URL" => "/good_prices/detail.php?ELEMENT_ID=#ELEMENT_ID#",	// URL, ������� �� �������� � ���������� �������� �������
                "BASKET_URL" => "/personal/basket.php",	// URL, ������� �� �������� � �������� ����������
                "ACTION_VARIABLE" => "action",	// �������� ����������, � ������� ���������� ��������
                "PRODUCT_ID_VARIABLE" => "id",	// �������� ����������, � ������� ���������� ��� ������ ��� �������
                "PRODUCT_QUANTITY_VARIABLE" => "quantity",	// �������� ����������, � ������� ���������� ���������� ������
                "PRODUCT_PROPS_VARIABLE" => "prop",	// �������� ����������, � ������� ���������� �������������� ������
                "SECTION_ID_VARIABLE" => "SECTION_ID",	// �������� ����������, � ������� ���������� ��� ������
                "META_KEYWORDS" => "-",	// ���������� �������� ����� �������� �� ��������
                "META_DESCRIPTION" => "-",	// ���������� �������� �������� �� ��������
                "BROWSER_TITLE" => "-",	// ���������� ��������� ���� �������� �� ��������
                "DISPLAY_PANEL" => "N",	// ��������� � �����. ������ ������ ��� ������� ����������
                "ADD_SECTIONS_CHAIN" => "N",	// �������� ������ � ������� ���������
                "DISPLAY_COMPARE" => "N",	// �������� ������ ���������
                "SET_TITLE" => "Y",	// ������������� ��������� ��������
                "SET_STATUS_404" => "N",	// ������������� ������ 404, ���� �� ������� ������� ��� ������
                "PAGE_ELEMENT_COUNT" => "100",	// ���������� ��������� �� ��������
                "LINE_ELEMENT_COUNT" => "3",	// ���������� ��������� ��������� � ����� ������ �������
                "PROPERTY_CODE" => array("col_brand", "col_price", "col_model_code"),	// ��������
                "PRICE_CODE" => "",	// ��� ����
                "USE_PRICE_COUNT" => "N",	// ������������ ����� ��� � �����������
                "SHOW_PRICE_COUNT" => "1",	// �������� ���� ��� ����������
                "PRICE_VAT_INCLUDE" => "Y",	// �������� ��� � ����
                "PRODUCT_PROPERTIES" => "",	// �������������� ������
                "USE_PRODUCT_QUANTITY" => "N",	// ��������� �������� ���������� ������
                "CACHE_TYPE" => "A",	// ��� �����������
                "CACHE_TIME" => "3600",	// ����� ����������� (���.)
                "CACHE_FILTER" => "N",	// ���������� ��� ������������� �������
                "CACHE_GROUPS" => "Y",	// ��������� ����� �������
                "DISPLAY_TOP_PAGER" => "N",	// �������� ��� �������
                "DISPLAY_BOTTOM_PAGER" => "N",	// �������� ��� �������
                "PAGER_TITLE" => "������",	// �������� ���������
                "PAGER_SHOW_ALWAYS" => "N",	// �������� ������
                "PAGER_TEMPLATE" => "",	// �������� �������
                "PAGER_DESC_NUMBERING" => "N",	// ������������ �������� ���������
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// ����� ����������� ������� ��� �������� ���������
                "PAGER_SHOW_ALL" => "N",	// ���������� ������ "���"
                "AJAX_OPTION_SHADOW" => "Y",	// �������� ���������
                "AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
                "AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
                "AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
                "AJAX_OPTION_ADDITIONAL" => "",	// �������������� �������������
                ),
                false
            );
}

?>
<p></br></p>
<p><a href="/actions/"><?=GetMessage("T_NEWS_DETAIL_BACK")?></a></p>
</section>

<aside class="aside">
<h2>��������� �������</h2>
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
		"PAGER_TITLE" => "�������",
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
