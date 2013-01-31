<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult["ITEMS"] as $arItem):?>

		<div style="padding:10px 7px 20px 16px;">
            <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                <div><span style="background:#472f91; padding:3px 16px; color:#b7b7b7; font-size:10px;"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span></div>
            <?endif?>
            <div style="padding:10px 0 0 16px;"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" style="font-size:11px;"><?echo $arItem["NAME"]?></a></div>
        </div>
<?endforeach;?>