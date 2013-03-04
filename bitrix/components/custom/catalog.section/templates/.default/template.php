<?
  if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
  $url_array = explode("/", $APPLICATION->GetCurPage());
?>
<section class="mainContent">
<?
$APPLICATION->IncludeComponent(
"bitrix:breadcrumb",
"breadcrumb",
Array(
"START_FROM" => "1",
"PATH" => "",
"SITE_ID" => "-"
),
false
);
?>
<input type="hidden" id="section" value="<?=$url_array[2]?>">
<?if($arParams['JSON'] == "1"):?>
<?echo '{
"data": {
"next": true,
"html":"';
?>
<?endif;?>

<section class="catalog">
<?foreach($arResult["ITEMS"] as $arElement):?>
<?
 //image resizing
 $resizer = $arElement['DETAIL_PICTURE'];
 $file = CFile::ResizeImageGet($resizer, array('width'=>190, 'height'=>240), BX_RESIZE_IMAGE_PROPORTIONAL, true);
 $img = $file['src'];
?>

<article itemscope itemtype="http://schema.org/Product">
<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
<span class="photo"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
<img src="<?=$img?>" alt="<?=$arElement['NAME']?>" itemprop="image"> <!--[if lte IE 7]></span></span><![endif]--></span></span> <!-- end .photo-->

<span class="text">
<span class="name" itemprop="brand">
<?=strip_tags($arElement['DISPLAY_PROPERTIES']['col_brand']['DISPLAY_VALUE']);?>
</span>
<span itemprop="name"><?=$arElement['NAME']?></span>
</span>
<!-- end .text -->
<?if(!empty($arElement['PROPERTIES']['col_price_new']['VALUE'])):?>
<span class="price bg-red" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
<span itemprop="price"><?=number_format($arElement['PROPERTIES']['col_price_new']['VALUE'], 0, '.', ' ')?></span>&nbsp;<span itemprop="priceCurrency">Руб</span>.
<del>
<?=number_format($arElement['PROPERTIES']['col_price']['VALUE'], 0, '.', ' ').' Руб.';?>
</del>
<?else:?>
<span class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
<span itemprop="price"><?=number_format($arElement['PROPERTIES']['col_price']['VALUE'], 0, '.', ' ')?></span>&nbsp;<span itemprop="priceCurrency">Руб</span>.
<new>New</new>
<?endif?>
</span>
<!-- end .price-->
</a>
</article>
<!-- end .article -->

<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>
<?if($arParams['JSON'] == "1"):?>
<?echo "\"}}" ;?>
<?endif;?>

</section>
<!-- end .catalog-->

<?
//get section description
if (strlen($url_array[3]) == 0)
{
$dbSec = CIBlockSection::GetList(
                        array(),
						array(
							"IBLOCK_ID" => $arParams["IBLOCK_ID"],
							"CODE" => $url_array[2],
						)
					            );
$arSec = $dbSec->GetNext();
if (strlen($arSec["DESCRIPTION"]) > 0)  echo $arSec["DESCRIPTION"];
}
?>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
  <?=$arResult["NAV_STRING"]?>
<?endif;?>

</section>
<!-- end .mainContent-->