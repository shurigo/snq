<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}

//echo "<pre>"; print_r($arResult["NAV_SECTION_ARRAY"]); echo "</pre>";

?>
<div class="left_menu"><?
	$CURRENT_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"] + 1;
	$show_level = array();
    foreach($arResult["SECTIONS"] as $arSection)
	{
		
		if ($arSection["DEPTH_LEVEL"] <= $CURRENT_DEPTH)
		{
			$show_level[$arSection["DEPTH_LEVEL"] + 1] = 0;
		}
		
		if (in_array($arSection["ID"], $arResult["NAV_SECTION_ARRAY"]))
		{
			$show_level[$arSection["DEPTH_LEVEL"] + 1] = 1;
		}
		if ($show_level[$arSection["DEPTH_LEVEL"]] == 1 || $arSection["DEPTH_LEVEL"] == 2)
		{
			?>
            <div style="margin:5px 0 7px <?=(($arSection["DEPTH_LEVEL"] - 2)  * 10)?>px;">
                <a href="<?=$arSection["SECTION_PAGE_URL"]?>"><h2 class="left_menu<?=($arSection["DEPTH_LEVEL"] == 2 || in_array($arSection["ID"], $arResult["NAV_SECTION_ARRAY"]))?"_b":"";?>"><?=$arSection["NAME"]?></h2></a>
            </div>
            <?
			//echo $arSection["DEPTH_LEVEL"];
			//continue;
		}
    	
		$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
	}
?></div>
