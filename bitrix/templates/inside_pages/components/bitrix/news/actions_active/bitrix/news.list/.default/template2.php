<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$actions_active_showed = 0;
$actions_deactive_showed = 0;
$this_date = date("d.m.Y");
if (count($arResult["ITEMS"]) > 0)
{
	
?>

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?
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
			?><div style="padding:0px 0 10px 0;"><img src="/images/headers/actions_active.jpg" width="299" height="21" alt="Действующие акции" title="Действующие акции" /></div><?
			$actions_active_showed = 1;
		}
		?>
		<div style="padding:0px 16px 0px 0px;">
            <div style="padding:6px 0 0 0;"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" style="font-size:14px;"><strong><?echo $arItem["NAME"]?></strong></a></div>
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
	?><div style="padding:0px 0 10px 0;"><img src="/images/headers/actions_active.jpg" width="299" height="21" alt="Действующие акции" title="Действующие акции" /></div>
    <div style="padding:10px 0 10px 0;">На данный момент акций нет. Следите за нашими <a href="/about/news/">новостями</a>.</div><?
}
?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
<?
}
?>