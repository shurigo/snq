<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>

<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
<img src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" width="179" height="275" alt=" ">
<span class="text"><strong>Вещь<br>недели</strong>
<?
$arElement["NAME"][0] = mb_strtoupper($arElement["NAME"][0], "windows-1251");
echo $arElement["NAME"];
?>
<span class="brand"><?=strip_tags($arElement["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"])?></span></span><!-- end .text-->
<span class="price">
Новая цена <span class="bg"><?=number_format($arElement["DISPLAY_PROPERTIES"]["col_price_new"]["VALUE"], 0, '.', ' ')?> Руб.</span>
<del><?=number_format($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')?> Руб.</del>
</span><!-- end .price-->
</a>

<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>
