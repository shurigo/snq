<?if(!isset($arParams["JSON"]) || $arParams["JSON"]=="n"): //normal page ?>
<?
  if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
  $url_array = explode("/", $APPLICATION->GetCurPage());
?>
<section class="mainContent">
<?if($arParams['USE_SORT'] == 'Y'):?>
<div class="sort">
	<form class="ajax-load" id="sort_form" action="<?=$APPLICATION->GetCurPage();?>">
		<fieldset>
			<span>����������� ��</span>
			<select class="customSelect" name="sort">
				<option value="sort">�� ���������</option>
				<option value="price_asc">���� (����.)</option>
				<option value="price_desc">���� (����.)</option>
			</select>
		</fieldset>
	</form>
</div>
<?endif;?>
<?
	if($arParams['NOT_SHOW_NAV_CHAIN'] == 'N') {
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
	}
?>
	<? global $action_catalog_filter; ?>
	<? $currentPage = $APPLICATION->GetCurPage(); ?>
	<?if($arParams['VIEW_MODE'] === 'actions'):?>
		<section class="catalog" data-page="<?='/collection/?m=a&d='.$arParams['DISCOUNT_ONLY'].'&sid='.http_build_query(array('sid' => $action_catalog_filter['SECTION_ID']));?>">
	<?elseif($arParams['VIEW_MODE'] === 'brands'):?>
		<section class="catalog" data-page="<?='/collection/?m=a&BRAND_ID='.$_GET['BRAND_ID'];?>">
  <?elseif($arParams['VIEW_MODE'] === 'search'):?>
		<section class="catalog" data-page="<?=$currentPage.'q='.$arParams['SEARCH_QUERY']?>">
	<?else:?>
		<section class="catalog" data-page="<?=$currentPage.'?d='.$arParams['DISCOUNT_ONLY'].(!empty($_GET['m']) ? '&m='.$_GET['m'] : '' )?>">
	<?endif;?>
<?endif; //end normal page?>
<?$page_count = $arResult['NAV_RESULT']->NavPageCount;?>
	<input id="pages" type="hidden" value="<?=$page_count;?>">
<?
  // don't go beyound the last page
	if(isset($_GET['PAGEN_1']) && $_GET['PAGEN_1'] > $page_count) { die; }
?>
<?foreach($arResult["ITEMS"] as $arElement):?>
<?
 //image resizing
 $resizer = $arElement['DETAIL_PICTURE'];
 $file = CFile::ResizeImageGet($resizer, array('width'=>170, 'height'=>240), BX_RESIZE_IMAGE_PROPORTIONAL, true);
 $img = $file['src'];

 $resizer2 = $arElement['PROPERTIES']['add_pic_1']['VALUE'];
 $file2 = CFile::ResizeImageGet($resizer2, array('width'=>170, 'height'=>240), BX_RESIZE_IMAGE_PROPORTIONAL, true);
 $img2 = $file2['src'];

?>

<article itemscope itemtype="http://schema.org/Product">
<a  class="z-preview_image"  data-img="<?=$img2?>" href="<?=$arElement["DETAIL_PAGE_URL"]?>">
<span class="photo"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
<img src="<?=$img?>" alt="<?=$arElement['NAME']?>" itemprop="image" title="<?=$arElement['NAME']?>"> <!--[if lte IE 7]></span></span><![endif]--></span></span> <!-- end .photo-->

<span class="text">
<span class="name" itemprop="brand">
<?=strip_tags($arElement['DISPLAY_PROPERTIES']['col_brand']['DISPLAY_VALUE']);?>
</span>
<span itemprop="name"><?=$arElement['NAME']?></span>
</span>
<!-- end .text -->
<?if($arElement['PROPERTIES']['col_price']['VALUE'] < $arElement['PROPERTIES']['col_price_origin']['VALUE']):?>
<span class="price bg-red" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
<span itemprop="price"><?=number_format($arElement['PROPERTIES']['col_price']['VALUE'], 0, '.', ' ')?></span>&nbsp;<span itemprop="priceCurrency">���</span>.
<del>
<?=number_format($arElement['PROPERTIES']['col_price_origin']['VALUE'], 0, '.', ' ').' ���.';?>
</del>
<?else:?>
<span class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
<span itemprop="price"><?=number_format($arElement['PROPERTIES']['col_price']['VALUE'], 0, '.', ' ')?></span>&nbsp;<span itemprop="priceCurrency">���</span>.
<new>New</new>
<?endif?>
</span>
<!-- end .price-->
</a>
</article>
<!-- end .article -->
<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>
<?if(!isset($arParams['JSON']) || $arParams['JSON'] == "n"): //normal page ?>
</section>
<?if($page_count > 1):?>
    <table width="100%"><tr><td align="middle">
	<input id="loadmore" type="button" value="�������� ���" style="background:white;border:1px solid #cbcbcb;height:27px;width:504px;color:#222;font-size: 11px;font-weight: bold;">
	<input id="page" type="hidden" value="1">
	</td></tr></table><br />
<?endif;?>
<!-- end .catalog-->
<div id='loading_div' style='display:none' align='center'>
  <img src='/images/loading_icon.gif'/>
</div>
<?
//get section description
if (strlen($url_array[3]) == 0) {
  $dbSec = CIBlockSection::GetList(
  	array(),
		array(
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"CODE" => $url_array[2],
		)
	);
	$arSec = $dbSec->GetNext();
	if (strlen($arSec["DESCRIPTION"]) > 0)  echo $arSec["DESCRIPTION"];

	// pixels monitor
	$sections = array( "new" =>
	array(
	12856,
	12857,
	12858,
	12859,
	12860,
	12861,
	12862,
	12863,
	12864,
	12865,
	12866,
	12867,
	12868,
	12869,
	12870,
	12871,
	12872,
	12873,
	12874,
	12875,
	12876,
	12877,
	12878,
	12879,
	12880,
	12881,
	12882,
	12883,
	12884,
	12885,
	12886,
	12887,
	12888,
	12889,
	12890,
	12891,
	12892
	)
	,"origin" =>
	array(
	306,
	284,
	129,
	285,
	136,
	316,
	296,
	297,
	326,
	142,
	317,
	300,
	301,
	305,
	302,
	304,
	156,
	318,
	310,
	311,
	160,
	314,
	315,
	130,
	131,
	133,
	135,
	134,
	286,
	288,
	289,
	290,
	291,
	293,
	319,
	322,
	321));

	//find a key in sections array
	$key = array_search($arSec['ID'], $sections["origin"]);
	//get transfered section_id
	$MY_SEC_ID=$sections["new"][$key];
	//build a string
	$HUBRUS_str="http://track.hubrus.com/pixel?id=12850,".$MY_SEC_ID."&type=js";
}
?>
<!-- HUBRUS RTB Segments Pixel V2.3 -->
<?if(HUBRUS_ENABLE):?>
<script type="text/javascript" src="<?=$HUBRUS_str;?>"></script>
<?endif;?>

<!-- Segment Pixel - SQ_segment - DO NOT MODIFY -->
<img src="http://ib.adnxs.com/seg?add=830761&t=2" width="1" height="1" />
<!-- End of Segment Pixel -->

<a href="#" class="scrollup">Scroll</a>
</section>
<!-- end .mainContent-->
<?endif; // end normal page?>
