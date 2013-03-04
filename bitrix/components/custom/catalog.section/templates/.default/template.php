<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$url_array = explode("/", $APPLICATION->GetCurPage());
?><?
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
 $file = CFile::ResizeImageGet($resizer, array('width'=>120, 'height'=>180), BX_RESIZE_IMAGE_PROPORTIONAL, true);
 $img = $file['src'];
?>

	<article>
		<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
          <span class="photo"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
          <img src="<?=$img?>" alt="<?=$arElement['NAME']?>"> <!--[if lte IE 7]></span></span><![endif]--></span></span> <!-- end .photo-->

			<span class="text">
				<span class="name">
				<?=strip_tags($arElement['DISPLAY_PROPERTIES']['col_brand']['DISPLAY_VALUE']);?>
				</span>
				<?=$arElement['NAME']?>
			</span>
			<!-- end .text -->
			<?if(!empty($arElement['PROPERTIES']['col_price_new']['VALUE'])):?>
			<span class="price bg-red">
				<?=number_format($arElement['PROPERTIES']['col_price_new']['VALUE'], 0, '.', ' ').' руб.';?>
				<del>
					<?=number_format($arElement['PROPERTIES']['col_price']['VALUE'], 0, '.', ' ').' руб.';?>
				</del>
			<?else:?>
			<span class="price">
				<?=number_format($arElement['PROPERTIES']['col_price']['VALUE'], 0, '.', ' ').' руб.';?>
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