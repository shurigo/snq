<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="mainContent">

<article class="news" itemscope itemtype="http://schema.org/Article">
<h1 itemprop="name"><?=$arResult["NAME"]?></h1>
<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="button" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir"></div>

<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
  <span itemprop="datePublished"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
<?endif?>
<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
    <img itemprop="image" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
<?endif?>
<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
                  <p itemprop="text"><?echo $arResult["DETAIL_TEXT"];?></p>
<?else:?>
                  <p itemprop="text"><?echo $arResult["PREVIEW_TEXT"];?></p>
<?endif?>
</article>
<a href="/about/about_fur/">������� � ������</a>
</section>

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