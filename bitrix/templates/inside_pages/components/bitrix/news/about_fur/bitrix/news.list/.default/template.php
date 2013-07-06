<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->SetPageProperty("title", "Меха от Снежной Королевы. Все виды меха, рекомендации по хранению и уходу за меховыми изделиями.");
$APPLICATION->SetPageProperty("keywords", "меха, меховые изделия, виды меха, хранение меха,износостойкость меха");
$APPLICATION->SetPageProperty("description", "Меха от компании Снежная Королева. Богатый выбор шуб и других изделий из меха. Все виды меха, рекомендации экспертов по хранению и уходу за меховыми изделиями.");
?>
<section class="mainContent">
<h1><?=$arResult["NAME"]?></h1>
<div class="hr_red"></div>

<?foreach($arResult["ITEMS"] as $arItem):?>

<article class="news" itemscope itemtype="http://schema.org/Article">

<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
<span itemprop="datePublished"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
<?endif?>

<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
            <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img class="preview_picture" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" style="float:left; margin:0 10px 10px 0;" /></a>
            <?else:?>
                <img class="preview_picture" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" style="float:left; margin:0 10px 10px 0;" />
            <?endif;?>
<?endif?>

<h2 itemprop="name"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h2>

<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
 <div><?echo $arItem["PREVIEW_TEXT"];?>&nbsp;<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" rel="nofollow">подробнее</a></div>
<?endif;?>

</article>
<br><br>
<?endforeach;?>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br><?=$arResult["NAV_STRING"]?>
<?endif;?>
</section>
 <!-- end .mainContent-->

<aside class="aside">
<?$APPLICATION->IncludeComponent(
            "bitrix:menu",
            "left_menu",
            Array(
                "ROOT_MENU_TYPE" => "left",
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "left",
                "USE_EXT" => "N",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "N",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => ""
            )
        );?>
</aside>