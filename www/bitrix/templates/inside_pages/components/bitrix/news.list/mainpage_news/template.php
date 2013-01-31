<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><div class="news_div"><?foreach($arResult["ITEMS"] as $arItem):?>
<div class="news_body">
<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
 <div class="news_date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
<?endif?>
 <div class="news_title"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></div>
</div>
<?endforeach;?></div>