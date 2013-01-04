<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?><div class="left_menu"><?
	$CURRENT_DEPTH=$arResult["SECTION"]["DEPTH_LEVEL"]+1;
    foreach($arResult["SECTIONS"] as $arSection)
	{
    	?><div style="margin:0 0 0 <?=(($arSection["DEPTH_LEVEL"] - $CURRENT_DEPTH)  * 20)?>px;"><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><h2 <?=($arResult["SECTION"]["DEPTH_LEVEL"] == 2)?' class="left_menu_b"':' class="left_menu"';?>><?=$arSection["NAME"]?></h2></a></div	><?
	}
?></div>