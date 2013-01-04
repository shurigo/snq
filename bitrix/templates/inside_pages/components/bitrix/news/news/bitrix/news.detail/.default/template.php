<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><h1><?=$arResult["NAME"]?></h1>
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
            <div style="padding:0 16px 20px 0px;">
                <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                    <div><span style="color:#121212; font-size:11px;"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span></div>
                <?endif?>
            
                <script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
                <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="button" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir"></div> 
            
                <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
                    <img class="detail_picture" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
                <?endif?>
                <?if(strlen($arResult["DETAIL_TEXT"])>0):?>
                    <?echo $arResult["DETAIL_TEXT"];?>
                <?else:?>
                    <?echo $arResult["PREVIEW_TEXT"];?>
                <?endif?>
            </div>
            <a href="/about/news/">������� � ������</a>
        </td>
    </tr>
</table>