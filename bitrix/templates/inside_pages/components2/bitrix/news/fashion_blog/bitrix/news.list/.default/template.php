<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h1>Блог редактора</h1>
<table style="width:100%;">
	<tr>
    <td style="width:206px; vertical-align:top;">
        <?$APPLICATION->IncludeComponent(
            "bitrix:menu",
            "left_menu",
            Array(
                "ROOT_MENU_TYPE" => "left",
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "left",
                "USE_EXT" => "N",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "N",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => ""
            )
        );?>
    </td>
    <td style="width:auto; vertical-align:top; padding:13px 0 0 23px;">
        <?foreach($arResult["ITEMS"] as $arItem):?>
        <div style="margin:0 0 20px 0;">
            <div style="margin:0 0 15px 0;">
                <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                    <div><span style="color:#121212; font-size:11px;"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span></div>
                <?endif?>
                <div class="header"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></div>
            </div>
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img class="preview_picture" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" style="float:left; margin:0 10px 10px 0;" /></a>
                <?else:?>
                    <img class="preview_picture" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" style="float:left; margin:0 10px 10px 0;" />
                <?endif;?>
            <?endif?>
            <div style="padding:0px 16px 10px 0px;">
                <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                    <div><?echo $arItem["PREVIEW_TEXT"];?></div>
                <?endif;?>
                <div><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a></div>
            </div>
        </div>
        <div class="clear_both" style="margin:0 0 20px 0;"></div>
        <?endforeach;?>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
            <div style="margin:20px 0 0 0; clear:both;"><?=$arResult["NAV_STRING"]?></div>
        <?endif;?>
    </td>
 </tr>
</table>