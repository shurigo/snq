<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

//echo "<pre>"; print_r($arResult); echo "</pre>";

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
echo $strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

?>
<div align="right">
    <?if ($arResult["bShowAll"]):?>
    <noindex>
        <div style="margin:5px 0;">
        <?if ($arResult["NavShowAll"]):?>
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0" rel="nofollow" style="font-size:11px;">Показать <span style="text-transform:lowercase;"><?=$arResult["NavTitle"]?></span> постранично</a>
        <?else:?>
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1" rel="nofollow" style="font-size:11px;">Показать все <span style="text-transform:lowercase;"><?=$arResult["NavTitle"]?></span></a>
        <?endif?>
        </div>
    </noindex>
    <?endif?>
    <?if($arResult["bDescPageNumbering"] === true):?>
        <?while($arResult["nStartPage"] >= $arResult["nEndPage"]):?>
            <?$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;?>
    
            <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                <b><?=$NavRecordGroupPrint?></b>
            <?elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):?>
                <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$NavRecordGroupPrint?></a>
            <?else:?>
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$NavRecordGroupPrint?></a>
            <?endif?>
    
            <?$arResult["nStartPage"]--?>
        <?endwhile?>
    <?else:?>	
        <?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
    
            <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                <span style="font-size:14px; padding:0 0 0 10px;"><strong><?=$arResult["nStartPage"]?></strong></span>
            <?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
                <span style="font-size:11px; padding:0 0 0 10px;"><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a></span>
            <?else:?>
                <span style="font-size:11px; padding:0 0 0 10px;"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a></span>
            <?endif?>
            <?$arResult["nStartPage"]++?>
        <?endwhile?>
    <?endif?>
</div>