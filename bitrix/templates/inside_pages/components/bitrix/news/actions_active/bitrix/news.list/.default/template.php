<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="mainContent">
<h1>Действующие акции</h1>
<div class="hr_red"></div>
<?
$actions_active_showed = 0;
$actions_deactive_showed = 0;
$this_date = date("d.m.Y");

if (count($arResult["ITEMS"]) > 0)
{
?>
<?foreach($arResult["ITEMS"] as $arItem):?>
<?
	if (strlen($arItem["ACTIVE_TO"]) > 0)
	{
		$active_to_arr = explode(".", $arItem["ACTIVE_TO"]);
		$active_to_time = mktime(0, 0, 0, $active_to_arr[1], $active_to_arr[0], $active_to_arr[2]);
	}

	if ($active_to_time > time())
	{
		if ($actions_active_showed == 0)
		{
			$actions_active_showed = 1;
		}

		?>

         <?if (($arItem["DISPLAY_PROPERTIES"]["col_availability"]["VALUE"] ==0 && in_array(strval($_SESSION['city_id']), $arItem["DISPLAY_PROPERTIES"]["col_city_id"]["VALUE"])) ||($arItem["DISPLAY_PROPERTIES"]["col_availability"]["VALUE"] ==1 && !in_array(strval($_SESSION['city_id']), $arItem["DISPLAY_PROPERTIES"]["col_city_id"]["VALUE"])) ):?>
          <article class="news" itemscope itemtype="http://schema.org/Article">
          <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"] && $arItem["DISPLAY_ACTIVE_TO"]):?>
            <span itemprop="datePublished"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span> - <span><?echo $arItem["DISPLAY_ACTIVE_TO"]?></span>
          <?endif?>
          <h2 itemprop="name"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h2>
          </article>
         <?endif;?>
<?
	}
?>
<?
endforeach;
if ($actions_active_showed == 0)
{
	?><div>На данный момент акций нет. Следите за нашими <a href="/about/news/">новостями</a>.</div><?
}
else
{
	?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<br /><?=$arResult["NAV_STRING"]?>
	<?endif;?>
	<?
}
}
?>

</section>

<aside class="aside">
 <h2>Последние новости</h2>
 <?
		$newsFilter = Array(
    	"IBLOCK_ID" => "3",
    	"IBLOCK_ACTIVE" => "Y",
    	"ACTIVE_DATE" => "Y",
    	"ACTIVE" => "Y",
    	"CHECK_PERMISSIONS" => "Y",
    	"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
    	Array('LOGIC' => 'OR',
      	'PROPERTY_col_availability' => '1',
      	'PROPERTY_col_city_id' => strval($_SESSION['city_id'])
    	)
  	);
 ?>
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
		"FILTER_NAME" => "newsFilter",
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
