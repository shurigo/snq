<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<h2>Действующие акции</h2>
<table style="width:100%;">
	<tr>
    	<td style="width:206px; vertical-align:top;">
        <h3 style="margin:10px 0 0 0;">Последние новости</h3>
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
);?></td>
        <td style="width:auto; vertical-align:top; padding:0 0 0 23px;"><?
$actions_active_showed = 0;
$actions_deactive_showed = 0;
$this_date = date("d.m.Y");
if (count($arResult["ITEMS"]) > 0)
{
	
//echo "<pre>"; print_r($arResult); echo "</pre>";
?>
<?foreach($arResult["ITEMS"] as $arItem):?>
<?
	if (strlen($arItem["ACTIVE_TO"]) > 0)
	{
		$active_to_arr = explode(".", $arItem["ACTIVE_TO"]);
		//echo "<pre>"; print_r($active_to_arr); echo "</pre>";
		$active_to_time = mktime(0, 0, 0, $active_to_arr[1], $active_to_arr[0], $active_to_arr[2]);
	}

	if ($active_to_time > time())
	{
		if ($actions_active_showed == 0)
		{
			$actions_active_showed = 1;
		}
		?>
		<div style="padding:0px 16px 0px 0px;">
            <div class="header"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></div>
            <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<div style="padding:10px 0 0 0px;"><?echo $arItem["PREVIEW_TEXT"];?></div>
			<?endif;?>
        </div>
		<?
	}
	/*
	else
	{
		if ($actions_deactive_showed == 0)
		{
			?><div style="padding:30px 0 10px 0;"><img src="/images/headers/actions_deactive.jpg" width="294" height="17" alt="Завершённые акции" title="Завершённые акции" /></div><?
			$actions_deactive_showed = 1;
		}
		?>
		<div style="padding:0px 16px 0px 0px;">
            <div style="padding:5px 0 0 0;"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" style="font-size:11px;"><?echo $arItem["NAME"]?></a></div>
            <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<div style="padding:10px 0 0 0px;"><?echo $arItem["PREVIEW_TEXT"];?></div>
			<?endif;?>
        </div>
		<?
	}
	*/

?>
<?
endforeach;
if ($actions_active_showed == 0)
{
	?><div style="padding:10px 0 10px 0;">На данный момент акций нет. Следите за нашими <a href="/about/news/">новостями</a>.</div><?
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
<br />
<br />
<a href="/collection/wmink/">Шубы из норки</a> | <a href="/collection/wskincoat/">Дубленки</a> | <a href="/collection/wtopcoat/">Женское пальто</a> | <a href="/collection/mtopcoat/">Мужское пальто</a> | <a href="/collection/wleatherjacket/">Кожаные куртки женские</a>
</td>
    </tr>
</table>