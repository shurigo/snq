<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div style="width: 986px;background: #F5F2F3;padding-left:10px;padding-top:10px;padding-bottom:10px;min-height: 380px;">
<?foreach($arResult["ITEMS"] as $arElement):?>
  <p><a href="detail.php?id=<?=$arElement["ID"]?>"><?=$arElement["NAME"]?></a></p>
<?endforeach;?>
</div>
