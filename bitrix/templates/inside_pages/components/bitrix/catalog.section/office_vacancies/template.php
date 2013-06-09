<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
  <p><a href="detail.php?id=<?=$arElement["ID"]?>"><?=$arElement["NAME"]?></a></p>
<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>
