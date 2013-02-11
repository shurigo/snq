<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h1><?=$arResult["NAME"]?></h1>
<div class="hr_red"></div>
<?
    	/*
    	$APPLICATION->IncludeComponent(
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
        );*/
?>
<?foreach($arResult["ITEMS"] as $arItem):?>

<article class="news" itemscope itemtype="http://schema.org/Product">

<span itemprop="datePublished"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
<h2 itemprop="name"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h2>

</article>
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
   <br /><?=$arResult["NAV_STRING"]?>
<?endif;?>