<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
 <h1><?=$arResult["NAME"]?></h1>
<table style="width:100%;">
	<tr>
    	<td style="width:206px; vertical-align:top;"><?$APPLICATION->IncludeComponent(
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
        );?></td>
        <td style="width:auto; vertical-align:top; padding:0 0 0 23px;">
            <?foreach($arResult["ITEMS"] as $arItem):?>
            <div style="margin:0 0 2px 0;">
            	<table class="grey_table">
                    <tr>
                        <td class="left_top"></td>
                        <td class="top"></td>
                        <td class="right_top"></td>
                    </tr>
                    <tr>
                        <td class="left"></td>
                        <td class="center"><?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                            <div><span style="color:#121212; font-size:11px;"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span></div>
                        <?endif?>
                        <div class="header"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></div>
                        <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                            <div style="padding:5px 0 0 0px;"><?echo $arItem["PREVIEW_TEXT"];?></div>
                        <?endif;?></td>
                        <td class="right"></td>
                    </tr>
                    <tr>
                        <td class="left_bot"></td>
                        <td class="bot"></td>
                        <td class="right_bot"></td>
                    </tr>
                </table>
                </div>
            <?endforeach;?>
            <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
                <br /><?=$arResult["NAV_STRING"]?>
            <?endif;?><br />
            <br />
            
            <a href="/collection/wmink/">Шубы из норки</a> | <a href="/collection/wskincoat/">Дубленки</a> | <a href="/collection/wtopcoat/">Женское пальто</a> | <a href="/collection/mtopcoat/">Мужское пальто</a> | <a href="/collection/wleatherjacket/">Кожаные куртки женские</a>
        </td>
    </tr>
</table>