<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult["ITEMS"] as $arItem):?>
<?
//echo "<pre>"; print_r($arItem); echo "</pre>";
if (strlen($arItem["PREVIEW_PICTURE"]["SRC"]) > 0)
{
	?>
		<div style="width:100%; text-align:center;"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" /></a></div>
		<div style="height:1px; background:url(/images/brands_underline.gif) repeat-x; width:100%;"></div>
	<?
}
?>
<?endforeach;?>