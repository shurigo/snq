<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
//print_r($arResult["ITEMS"]);
$cnt = 0;
foreach($arResult["ITEMS"] as $cell=>$arElement):?>
    <p><a href="detail.php?id=<?=$arElement["ID"]?>"><?=$arElement["NAME"]?></a></p>

<?
$cnt++;
endforeach; // foreach($arResult["ITEMS"] as $arElement):?>
