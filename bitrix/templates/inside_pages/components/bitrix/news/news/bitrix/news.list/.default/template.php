<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="mainContent">
<h1><?=$arResult["NAME"]?></h1>
<div class="hr_red"></div>

<?foreach($arResult["ITEMS"] as $arItem):?>

<article class="news" itemscope itemtype="http://schema.org/Article">

<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
<span itemprop="datePublished"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
<?endif?>


<h2 itemprop="name"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h2>

</article>
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
   <br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</section>
 <!-- end .mainContent-->

<aside class="aside">
<?
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
        );
?>
</aside>

<!--
Start of DoubleClick Floodlight Tag: Please do not remove
Activity name of this tag: RU - Snowqueen - News - 2014 - RT
URL of the webpage where the tag is expected to be placed: http://www.snowqueen.ru
This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
Creation Date: 03/28/2014
-->
<script type="text/javascript">
var axel = Math.random() + "";
var a = axel * 10000000000000;
document.write('<img src="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=wxEuyk11;ord=' + a + '?" width="1" height="1" alt=""/>');
</script>
<noscript>
<img src="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=wxEuyk11;ord=1?" width="1" height="1" alt=""/>
</noscript>
<!-- End of DoubleClick Floodlight Tag: Please do not remove -->
