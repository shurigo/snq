<?if(!isset($arParams["JSON"]) || $arParams["JSON"]=="n"): //normal page ?>
	<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
		$url_array = explode("/", $APPLICATION->GetCurPage());
	?>
	<section class="mainContent">
	<?if($arParams['USE_SORT'] == 'Y'):?>
		<div class="sort">
			<form class="ajax-load" id="sort_form" action="<?=$APPLICATION->GetCurPage();?>">
				<fieldset>
					<span>Сортировать по</span>
					<select class="customSelect" name="sort">
            <option value="sort"<?=($_GET['sort']=='sort' ? ' selected' : '')?>>По умолчанию</option>
						<option value="price_asc"<?=($_GET['sort']=='price_asc' ? ' selected' : '')?>>Цене (возр.)</option>
						<option value="price_desc"<?=($_GET['sort']=='price_desc' ? ' selected' : '')?>>Цене (убыв.)</option>
					</select>
				</fieldset>
			</form>
		</div>
	<?endif;?>
	<?if($arParams['VIEW_MODE'] === 'search'):?>
		<nav class="path"><a href="/" rel="nofollow">Главная</a> / <span>Поиск</span></nav> <!-- end .path-->
	<?elseif($arParams['NOT_SHOW_NAV_CHAIN'] == 'N'):
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
	endif;?>
	<? global $action_catalog_filter; ?>
	<? $currentPage = $APPLICATION->GetCurPage(); ?>
	<?if($arParams['VIEW_MODE'] === 'actions'):?>
		<section class="catalog" data-page="<?='/collection/?m=a&d='.$arParams['DISCOUNT_ONLY'].'&sid='.http_build_query(array('sid' => $action_catalog_filter['SECTION_ID']));?>">
	<?elseif($arParams['VIEW_MODE'] === 'brands'):?>
		<section class="catalog" data-page="<?='/collection/?m=a&BRAND_ID='.$_GET['BRAND_ID'];?>">
	<?elseif($arParams['VIEW_MODE'] === 'search'):?>
		<section class="catalog" data-page="<?='/collection/?q='.iconv('CP1251//IGNORE', 'UTF-8', $arParams['SEARCH_QUERY'])?>">
	<?else:?>
		<section class="catalog" data-page="<?=$currentPage.'?d='.$arParams['DISCOUNT_ONLY'].(!empty($_GET['m']) ? '&m='.$_GET['m'] : '' )?>">
	<?endif;?>
<?endif; //end normal page?>
	<?$page_count = $arResult['NAV_RESULT']->NavPageCount;?>
	<input id="pages" type="hidden" value="<?=$page_count;?>">
<?// don't go beyound the last page
	if(isset($_GET['PAGEN_1']) && $_GET['PAGEN_1'] > $page_count) { die;
}?>
<?if(count($arResult['ITEMS']) == 0):?>
 <!-- <p>По вашему запросу ничего не найдено</p>   -->
<?endif;?>
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
<a  class="z-preview_image"  target="_blank"  data-img="<?=$img2?>" href="<?=$arElement["DETAIL_PAGE_URL"]?>">
<span class="photo"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
<img src="<?=$img?>" alt="<?=$arElement['NAME']?>" itemprop="image" title="<?=$arElement['NAME']?>"> <!--[if lte IE 7]></span></span><![endif]--></span></span> <!-- end .photo-->

<span class="text">
<span class="name" itemprop="brand">
<?=strip_tags($arElement['DISPLAY_PROPERTIES']['col_brand']['DISPLAY_VALUE']);?>
</span>
<span itemprop="name"><?=$arElement['NAME']?></span>
</span>
<!-- end .text -->
<?if(isset($arElement['PROPERTIES']['col_add_discount']['VALUE']) && ($arElement['PROPERTIES']['col_add_discount']['VALUE']!=0)):?>
<div style="border: 1px solid red; color:#5a5a5a; font-size:9px; text-align:center;">СКИДКА - <?=$arElement['PROPERTIES']['col_add_discount']['VALUE']?>% НА ВТОРУЮ ВЕЩЬ</div>
<?else:?>
<div style="height:18px;"></div>
<?endif?>

<?
//get current dir
$url_array = explode("/", $APPLICATION->GetCurPage());
// render price/discount
if($arElement['PROPERTIES']['col_price']['VALUE'] < $arElement['PROPERTIES']['col_price_origin']['VALUE']):?>
	<?if(strstr($url_array[2], 'sale') || strstr($url_array[2], 'bestsell')):?>
		<span class="price bg-red" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		<span itemprop="price"><?=number_format($arElement['PROPERTIES']['col_price']['VALUE'], 0, '.', ' ');?></span>&nbsp;<span itemprop="priceCurrency"  class="rub">Р</span>
		<del><?=number_format($arElement['PROPERTIES']['col_price_origin']['VALUE'], 0, '.', ' ');?> <span class="rub">Р</span></del>
		</span>
	<?else:?>
		<span class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		<span itemprop="price"><?=number_format($arElement['PROPERTIES']['col_price']['VALUE'], 0, '.', ' ');?></span>&nbsp;<span itemprop="priceCurrency"  class="rub">Р</span>
		<new>Акция: - <?=round(100-round(($arElement['PROPERTIES']['col_price']['VALUE']*100)/$arElement['PROPERTIES']['col_price_origin']['VALUE']),-1);?> %</new>
		</span>
		<div style="border: 0px solid red; font-size:8px; text-align:center;">цена указана с учетом скидки</div>
	<?endif;?>
<?else:?>
	<span class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	<span itemprop="price"><?=number_format($arElement['PROPERTIES']['col_price']['VALUE'], 0, '.', ' ');?></span>&nbsp;<span itemprop="priceCurrency"  class="rub">Р</span>
	<new>New</new>
	</span>
<?endif;?>
<!-- end .price-->
</a>
</article>
<!-- end .article -->
<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>
<?if(!isset($arParams['JSON']) || $arParams['JSON'] == "n"): //normal page ?>
</section>
<?if($page_count > 1):?>
    <table width="100%"><tr><td align="middle">
	<input id="loadmore" type="button" value="Показать еще" style="background:white;border:1px solid #cbcbcb;height:27px;width:504px;color:#222;font-size: 11px;font-weight: bold;">
	<input id="page" type="hidden" value="0">
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
	if (strlen($arSec["DESCRIPTION"]) > 0)
	echo '<div class="desc_text minimized">'.$arSec["DESCRIPTION"].'</div>

	<div class="desc_text_link minimized">
		<a id="desc_text_link" href="javascript:;"><span>Свернуть</span><span>Читать далее</span></a> »
	</div>

		<script type="text/javascript">
		$(document).ready(function(){
		$("#desc_text_link").click(function(){
		$(".desc_text_link, .desc_text").toggleClass("minimized");
		});
		});
		</script>';

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

//get section description
$code_str1="";
$code_str2="";

if (strlen($url_array[3]) == 0)
{	switch ($url_array[2]) {
    case "woman":
        $code_str1="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=XcYmu3lx;ord=";
        $code_str2="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=XcYmu3lx;ord=1?";
        break;
    case "man":
        $code_str1="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=CcWhX5hv;ord=";
        $code_str2="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=CcWhX5hv;ord=1?";
        break;
    case "wfurs":
        $code_str1="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=N7mn62gG;ord=";
        $code_str2="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=N7mn62gG;ord=1?";
        break;
    case "waccessories":
        $code_str1="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=CejX18eI;ord=";
        $code_str2="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=CejX18eI;ord=1?";
        break;
    default:
        $code_str1="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=bjXFK5Ej;u4=".$url_array[2].";ord=";
        $code_str2="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=bjXFK5Ej;u4=".$url_array[2].";ord=1?";
        break;
}
}
?>

<!--
Start of DoubleClick Floodlight Tag: Please do not remove
Activity name of this tag: RU - Snowqueen - Women - 2014 - RT
URL of the webpage where the tag is expected to be placed: http://www.snowqueen.ru
This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
Creation Date: 03/28/2014
-->
<script type="text/javascript">
var axel = Math.random() + "";
var a = axel * 10000000000000;
document.write('<img src="<?=$code_str1?>' + a + '?" width="1" height="1" alt=""/>');
</script>
<noscript>
<img src="<?=$code_str2?>" width="1" height="1" alt=""/>
</noscript>
<!-- End of DoubleClick Floodlight Tag: Please do not remove -->
<script>
window.APRT_DATA = {
	pageType : 3,
	currentCategory: {
		id: '<?=$MY_SEC_ID?>',
		name: '<?=$url_array[2]?>'
	},
	parentCategories: [{
		id: '<?=$url_array[1]?>',
		name: '<?=$url_array[1]?>'
  }]
};
</script>

<script src="//5757yvu.ru/code/snowqueen.ru/" defer></script>

<!--  AdRiver code START. Type:counter(zeropixel) Site: snowqueen PZ: 0 BN: 0 -->
<script type="text/javascript">
(function(n){
    var l = window.location, a = l.hostname.split('.');
    a.splice(a.length-2, 2);
    window[n] = (a.length ? '/' + a.join('/') : '') + l.pathname + escape(l.search);
})('sz');

var RndNum4NoCash = Math.round(Math.random() * 1000000000);
var ar_Tail='unknown'; if (document.referrer) ar_Tail = escape(document.referrer);
document.write('<img src="' + ('https:' == document.location.protocol ? 'https:' : 'http:') + '//ad.adriver.ru/cgi-bin/rle.cgi?' + 'sid=196960&bt=21&pz=0&sz=' + sz +'&rnd=' + RndNum4NoCash + '&tail256=' + ar_Tail + '" border=0 width=1 height=1>')
</script>
<noscript><img src="//ad.adriver.ru/cgi-bin/rle.cgi?sid=196960&bt=21&pz=0&rnd=2076491944" border=0 width=1 height=1></noscript>
<!--  AdRiver code END  -->

<a href="#" class="scrollup">Scroll</a>
</section>
<!-- end .mainContent-->
<?endif; // end normal page?>
