<?  if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {die();} ?><?  if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {die();} ?>
<div class="left_menu">
<?
	$CURRENT_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"] + 1;
	$show_level = array();
    foreach($arResult["SECTIONS"] as $arSection)
	{
		if ($arSection["DEPTH_LEVEL"] <= $CURRENT_DEPTH){$show_level[$arSection["DEPTH_LEVEL"] + 1] = 0;}
        if (in_array($arSection["ID"], $arResult["NAV_SECTION_ARRAY"])) {$show_level[$arSection["DEPTH_LEVEL"] + 1] = 1;}

		if ($show_level[$arSection["DEPTH_LEVEL"]] == 1 || $arSection["DEPTH_LEVEL"] == 2)
		{
			if ($arSection["DEPTH_LEVEL"] == 2 || ($arSection["DEPTH_LEVEL"] == 3 && !in_array($arSection["ID"], $arResult["NAV_SECTION_ARRAY"]))) echo "<noindex>";
			?>
            <div class="d<?=(($arSection["DEPTH_LEVEL"] - 2)  * 10)?>">
                <a href="<?=$arSection["SECTION_PAGE_URL"]?>" rel="<?=($arSection["DEPTH_LEVEL"] == 4 || ($arSection["DEPTH_LEVEL"] == 3 && in_array($arSection["ID"], $arResult["NAV_SECTION_ARRAY"])))?"":"nofollow";?>"><span class="<?=($arSection["DEPTH_LEVEL"] == 2 || in_array($arSection["ID"], $arResult["NAV_SECTION_ARRAY"]))?"b":"";?>"><?=$arSection["NAME"]?></span></a>
            </div>
            <?
            if ($arSection["DEPTH_LEVEL"] == 2 || ($arSection["DEPTH_LEVEL"] == 3 && !in_array($arSection["ID"], $arResult["NAV_SECTION_ARRAY"]))) echo "</noindex>";
		}

		$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
	}
?>
</div>
