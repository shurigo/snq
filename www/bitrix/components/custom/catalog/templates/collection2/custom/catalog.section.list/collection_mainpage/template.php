<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><div class="left_menu">
<ul class="without_bullet">
	<?
    $CURRENT_DEPTH=$arResult["SECTION"]["DEPTH_LEVEL"]+1;
    foreach($arResult["SECTIONS"] as $arSection):
        if($CURRENT_DEPTH<$arSection["DEPTH_LEVEL"])
            echo "<ul>";
        elseif($CURRENT_DEPTH>$arSection["DEPTH_LEVEL"])
            echo str_repeat("</ul>", $CURRENT_DEPTH - $arSection["DEPTH_LEVEL"]);
        $CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
    ?>
	<li class="left_menu"><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><h2 <?=($arResult["SECTION"]["DEPTH_LEVEL"] == 2)?' class="left_menu_b"':' class="left_menu"';?>><?=$arSection["NAME"]?></h2></a></li>
<?endforeach?>
</ul>
</div>