<?  if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {die();} ?><?  if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {die();} ?>	
<ul class="side-menu">
<?	$CURRENT_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"] + 1;
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
			//if ($arSection["DEPTH_LEVEL"] == 2 || ($arSection["DEPTH_LEVEL"] == 3 && !in_array($arSection["ID"], $arResult["NAV_SECTION_ARRAY"]))) echo "<noindex>";
			?>
				<ul>
					<li><a href="<?=$arSection["SECTION_PAGE_URL"]?>">
					<?if($arSection["DEPTH_LEVEL"] == 2 || in_array($arSection["ID"], $arResult["NAV_SECTION_ARRAY"])): ?>
						<strong><?=$arSection["NAME"]?></strong>
					<?else: ?>
						<?=$arSection["NAME"]?>
					<?endif;?>
					</a></li>
			<?
           if ($arSection["DEPTH_LEVEL"] == 2 || ($arSection["DEPTH_LEVEL"] == 3 && !in_array($arSection["ID"], $arResult["NAV_SECTION_ARRAY"]))) echo "</ul>";
		}
		$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
	}
?>
</ul>
<!-- end .side-menu -->
