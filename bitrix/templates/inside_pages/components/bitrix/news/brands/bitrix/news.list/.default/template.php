<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h1><?=$arResult["NAME"]?></h1>

<?foreach($arResult["ITEMS"] as $arItem):?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="float:left; margin:5px;">
                <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img class="preview_picture" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" style="float:left" /></a>
                <?else:?>
                    <img class="preview_picture" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" style="float:left" />
                <?endif;?>
            </div>
		<?endif?>
<?endforeach;?>

