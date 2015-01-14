<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><section class="mainContent2">
<?
// navigation menu
if (strpos($APPLICATION->GetCurDir(), "collection") && $APPLICATION->GetCurDir() != "/collection/search/")  $start_from = 1;
else	$start_from = 0;

$APPLICATION->IncludeComponent(
    "bitrix:breadcrumb",
    "breadcrumb",
    Array(
        "START_FROM" => $start_from,
        "PATH" => "",
        "SITE_ID" => "-"
    ),
false
);
?>
<script type="text/javascript">
function DoubleClickTagPost(tagv){
var axel = Math.random() + "";
var a = axel * 10000000000000;
//document.write('<img src="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=' + tagv + ';u1=<?=$url_array[3]?>;u4=<?=$url_array[2]?>;ord=' + a + '?" width="1" height="1" alt=""/><noscript><img src="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=' + tagv + ';u1=<?=$url_array[3]?>;u4=<?=$url_array[2]?>;ord=1?" width="1" height="1" alt=""/></noscript>');
}
</script>
<?if(in_array((int)$arResult["ID"], array(11066, 716039, 149292))):?>
<?$section_path=end($arResult['SECTION']['PATH']);?>
<script type="text/javascript">
var _advisorq = _advisorq || [];
_advisorq.push({
  _suggest: {
    code: "product",
    layout: {
      selector: '.item',
      insert:'after',
      title: 'Рекомендуем:',
      rows: 1,
      cols: 4,
      containerid: '#recommended'
    }
  },
  _setConfig: {
    sku: <?=$arResult['ID']?>,
    currentPath: [<?=$section_path['IBLOCK_SECTION_ID'].','.$section_path['ID']?>]
  }
});
</script>
<?endif;?>
<article class="item" itemscope itemtype="http://schema.org/Product">
  <section class="text">
    <h1 itemprop="name"><?=$arResult["NAME"]; ?></h1>
    <p>Код товара: <?=strip_tags($arResult["DISPLAY_PROPERTIES"]["col_idmfc"]["VALUE"]); ?></p>
    <p>Бренд: <strong itemprop="brand"><?=strip_tags($arResult["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]); ?></strong></p>

<?
//get current dir
$url_array = explode("/", $APPLICATION->GetCurPage());

if($arResult['DISPLAY_PROPERTIES']['col_price']['VALUE'] < $arResult['DISPLAY_PROPERTIES']['col_price_origin']['VALUE'])
   if(strstr($url_array[2], 'sale') || strstr($url_array[2], 'bestsell'))
	echo '
			<div class="price bg-red" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<span itemprop="price">'.number_format($arResult['DISPLAY_PROPERTIES']['col_price']['VALUE'], 0, '.', ' ').'</span>&nbsp;<span itemprop="priceCurrency"  class="rub">Р</span>
			<del>'.number_format($arResult['DISPLAY_PROPERTIES']['col_price_origin']['VALUE'], 0, '.', ' ').' <span class="rub">Р</span></del>
			</div>
		 ';
   else
	echo '
			<div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<span itemprop="price">'.number_format($arResult['DISPLAY_PROPERTIES']['col_price']['VALUE'], 0, '.', ' ').'</span>&nbsp;<span itemprop="priceCurrency"  class="rub">Р</span>
			<new>Акция: - '.round(100-round(($arResult['DISPLAY_PROPERTIES']['col_price']['VALUE']*100)/$arResult['DISPLAY_PROPERTIES']['col_price_origin']['VALUE']),-1).' %</new>
			</div>
			<div style="border: 0px solid red; font-size:8px; text-align:left;">цена указана с учетом скидки</div>
		 ';
else
echo '
		<div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		<span itemprop="price">'.number_format($arResult['DISPLAY_PROPERTIES']['col_price']['VALUE'], 0, '.', ' ').'</span>&nbsp;<span itemprop="priceCurrency"  class="rub">Р</span>
		<new>New</new>
		</div>
	 ';

?>



    <?
    if (isset($arResult["DISPLAY_PROPERTIES"]["col_add_discount"]["VALUE"]) && ($arResult["DISPLAY_PROPERTIES"]["col_add_discount"]["VALUE"]!=0))
    {
    echo '<p><a style="color:red;" href="/actions/42114918/" target="_blank">СКИДКА - '.$arResult["DISPLAY_PROPERTIES"]["col_add_discount"]["VALUE"].'% НА ВТОРУЮ ВЕЩЬ</a></p>';
    /*
    echo '<div style="padding:0px 0 5px 0;""><div style="display:inline;">ИТОГОВАЯ ЦЕНА:</div> <div style="border: 1px solid red; color:#a0a0a0; font-size:16px; text-align:center;display:inline; padding:1px 20px 1px 20px;">'.number_format($arResult["DISPLAY_PROPERTIES"]["col_last_price"]["VALUE"], 0, '.', ' ').' РУБ.</div></div>';
    echo '<p>ПОДРОБНОСТИ У ПРОДАВЦОВ-КОНСУЛЬТАНТОВ.</p>';
    */
   }
    ?>
    <ul class="links">
      <li>
        <a href="/actions/" title="Акции" onClick="DoubleClickTagPost('Gobr8Bpp'); trackOutboundLink(this, 'Outbound Links', 'actions_card'); return false;" rel="nofollow">Скидки %</a>
      </li>
      <li>
        <?=($arResult['PROPERTIES']['col_im_link']['VALUE']!="")?('<a href="'.$arResult['PROPERTIES']['col_im_link']['VALUE'].'" onClick="DoubleClickTagPost(\'qil7ECb1\'); trackOutboundLink(this, \'Outbound Links\', \'im_card\'); return false;" rel="nofollow" target="_blank">Купить Online</a>'):('<a href="/our_shops/" title="Наши магазины" onClick="DoubleClickTagPost(\'qil7ECb1\'); trackOutboundLink(this, \'Outbound Links\', \'our_shops_card\'); return false;">Где купить?</a>');?>
      </li>
    </ul>
    <!-- end .links-->
    <!--
    <div class="likes">
      <table>
        <tr>
          <td>
            <div class="vk-hack"><div id="vk_like"></div></div>
          </td>
          <td class="sep">&nbsp;&nbsp;</td>
            <td>
              <fb:like send="false" layout="button_count" width="450" show_faces="false" font="arial"></fb:like>
            </td>
          <td class="sep">&nbsp;&nbsp;</td>
          <td>
            <div class="g-plusone" data-size="medium"></div>
					  <script type="text/javascript">
              window.___gcfg = {lang: 'ru'};
  					  (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
 							})();
				    </script>
				  </td>
        </tr>
        <tr>
          <td>
            <div id="ok_shareWidget"></div>
						<script>
              !function (d, id, did, st) {
                var js = d.createElement("script");
                js.src = "http://connect.ok.ru/connect.js";
                js.onload = js.onreadystatechange = function () {
                if (!this.readyState || this.readyState == "loaded" || this.readyState == "complete") {
                  if (!this.executed) {
                    this.executed = true;
                    setTimeout(function () {
                      OK.CONNECT.insertShareWidget(id,did,st);
                    }, 0);
                  }
                }};
                d.documentElement.appendChild(js);
              }(document,"ok_shareWidget","http://www.snowqueen.ru/","{width:170,height:20,st:'rounded',sz:20,ck:2}");
						</script>
          </td>
          <td class="sep">&nbsp;&nbsp;</td>
				  <td>
            <div class="twitter-hack"><a href="https://twitter.com/share" class="twitter-share-button" data-lang="ru">Твитнуть</a></div>
          </td>
          <td class="sep">&nbsp;&nbsp;</td>
          <td></td>
        </tr>
      </table>
    </div>
    -->
    <!-- end .likes-->
    <!--
    <div itemprop="description">
      <p>Красивые и качественные товары можно приобрести очень легко, достаточно оформить заказ на сайте и уже на следующий день наш курьер доставит обновку в офис или домой для примерки</p>
    </div>
    -->
    <hr size="1" noshade>
    <span style="font-size:8pt;font-weight: bold;">Наличие в магазинах вашего города:</span>
    <div class="sizes">
      <select id="size-select" class="customSelect">
        <option>Выберите размер</option>
        <?foreach($arResult['SIZES'] as $size):?>
          <option value="<?=$size['NOM_ID']?>"><?=$size['SIZE']?></option>
        <?endforeach?>
      </select>
    </div>
    <!-- end .sizes -->
    </br>
    <div id="availability"></div>
    <div class="grey" style="font-size:8pt;padding:0 0 10px 0;">Информация, указанная на сайте не является публичной офертой.
На сайте представлены избранные модели товаров, реализуемых в магазинах «Снежная Королева». 
Цены на сайте могут отличаться от цен действующих в магазинах. Компания оставляет за собой право на изменение цены.
Информацию о наличии товара и действующей цене уточняйте, пожалуйста, в магазинах  или по телефону 8 800 777-8-999.</div>

</section>
<!-- end .text-->
<section class="gallery">
<?
  $resizer = $arResult['DETAIL_PICTURE'];
  $file = CFile::ResizeImageGet($resizer, array('width'=>310, 'height'=>418), BX_RESIZE_IMAGE_PROPORTIONAL, true);
  $img = $file['src'];
?>
  <div class="big">
    <a class="zoom-pic" title='<?=$arResult["NAME"]?>' href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>">
      <img src="<?=$img;?>" itemprop="image" alt='<?=$arResult["NAME"]?>'>
      <span class="zoom"></span>
    </a>
  </div>
  <!-- end .big-->
  <div class="slider">
<?
	$number_of_pictures = 0;
	for($idx = 1; $idx < 5; $idx++) {
		if($arResult['PROPERTIES']["add_pic_$idx"]['VALUE'] != '') {
			$number_of_pictures++;
		}
	}
?>
<?//Display prev/next buttons?
  if($number_of_pictures > 2):?>
    <div class="prev"></div>
    <div class="next"></div>
<?endif;?>
    <div class="hold">
      <ul>
<?
        $resizer = $arResult['DETAIL_PICTURE'];
        $file = CFile::ResizeImageGet($resizer, array('width'=>75, 'height'=>103), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $img = $file['src'];

        $resizer2 = $arResult['DETAIL_PICTURE'];
        $file2 = CFile::ResizeImageGet($resizer2, array('width'=>310, 'height'=>418), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $img2 = $file2['src'];
?>
        <li>
          <a data-big="<?=$arResult['DETAIL_PICTURE']['SRC']?>" title="" href="<?=$img2;?>">
            <span class="cell">
              <!--[if lte IE 7]><span><span><![endif]-->
              <img src="<?=$img;?>" alt="">
              <!--[if lte IE 7]></span></span><![endif]-->
            </span>
          </a>
        </li>
<?
        for($idx = 1; $idx < 5; $idx++):
          $resizer = $arResult['PROPERTIES']["add_pic_$idx"]['VALUE'];
          if(trim($resizer) == '') {
            continue;
          }
          $file = CFile::ResizeImageGet($resizer, array('width'=>75, 'height'=>103), BX_RESIZE_IMAGE_PROPORTIONAL, true);
          $img = $file['src'];

          $resizer2 = $arResult['PROPERTIES']["add_pic_$idx"]['VALUE'];
          $file2 = CFile::ResizeImageGet($resizer2, array('width'=>310, 'height'=>418), BX_RESIZE_IMAGE_PROPORTIONAL, true);
          $img2 = $file2['src'];

          if($arResult["DISPLAY_PROPERTIES"]["add_pic_$idx"]["FILE_VALUE"]["SRC"] != ''):?>
            <li>
              <a data-big="<?=$arResult["DISPLAY_PROPERTIES"]["add_pic_$idx"]["FILE_VALUE"]["SRC"]?>" title="" href="<?=$img2;?>">
                <span class="cell">
                  <!--[if lte IE 7]><span><span><![endif]-->
                  <img src="<?=$img;?>" alt="">
                  <!--[if lte IE 7]></span></span><![endif]-->
                </span>
              </a>
            </li>
          <?endif;?>
        <?endfor;?>
      </ul>
    </div>
    <!-- end .hold-->
  </div>
  <!-- end .slider-->
  </section>
  <!-- end .gallery-->
</article>
<!-- end .item-->
</section>
<!-- end .mainContent2-->
<!-- HUBRUS RTB Segments Pixel V2.3 -->
<?
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

// get native section
$db_old_groups = CIBlockElement::GetElementGroups($arResult["ID"], true);
$ar_group = $db_old_groups->Fetch();
//find a key in sections array
$key = array_search($ar_group["ID"], $sections["origin"]);
//get transfered section_id
$MY_SEC_ID=$sections["new"][$key];
//get section properties by sec_id
$res = CIBlockSection::GetByID($ar_group["ID"]);
if($ar_res = $res->GetNext())  $SEC_CODE=$ar_res['CODE'];


if (substr($SEC_CODE,0,1)=="w")
$HUBRUS_str="http://track.hubrus.com/pixel?id=12850,12857,".$MY_SEC_ID.",12893&type=js&varname1=481_vi&value1=".$arResult["ID"];
else
$HUBRUS_str="http://track.hubrus.com/pixel?id=12850,12856,".$MY_SEC_ID.",12893&type=js&varname1=481_vi&value1=".$arResult["ID"];
//echo $HUBRUS_str;
?>
<?if(HUBRUS_ENABLE):?>
<script type="text/javascript" src="<?=$HUBRUS_str;?>"></script>
<?endif;?>

<!-- Segment Pixel - SQ_segment - DO NOT MODIFY -->
<img src="http://ib.adnxs.com/seg?add=830761&t=2" width="1" height="1" />
<!-- End of Segment Pixel -->

<?
  // get current catalog section
  $url_array = explode("/", $APPLICATION->GetCurPage());
  $category_with_pixsel_array=array('mskincoat','wskincoat','wmink','wfox','wkarakul','wrabbit','wfurvest','wfurother','wfurs','wpaddedcoat','mpaddedcoat','wleathertopjacket','mleathertopjacket','mwleathertopjacket','wwleathertopjacket','wtopcoat','mtopcoat');
  if (in_array($url_array[2], $category_with_pixsel_array)) {
?>
 <script language="javascript">
  var odinkod = {
  "type": "product",
  "recomm": "true", // false - если этот товар не нужно ретаргетировать
  "product_id":"<?=$arResult["ID"]?>"
   };
  var gcb = Math.round(Math.random() * 100000);
  document.write('<scr'+'ipt src="'+('https:' == document.location.protocol ? 'https://ssl.' : 'http://') +
'cdn.odinkod.ru/tags/772300-390d07.js?gcb='+ gcb +'"></scr'+'ipt>');
</script>
<?
}
?>

<?
$url_array = explode("/", $APPLICATION->GetCurPage());
?>

<!--
Start of DoubleClick Floodlight Tag: Please do not remove
Activity name of this tag: RU - Snowqueen - Product details - 2014 - RT
URL of the webpage where the tag is expected to be placed: http://www.snowqueen.ru
This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
Creation Date: 03/28/2014
-->
<script type="text/javascript">
var axel = Math.random() + "";
var a = axel * 10000000000000;
document.write('<img src="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=bosxJSEN;u1=<?=$url_array[3]?>;u4=<?=$url_array[2]?>;ord=' + a + '?" width="1" height="1" alt=""/>');
</script>
<noscript>
<img src="https://ad.doubleclick.net/activity;src=4390744;type=invmedia;cat=bosxJSEN;u1=<?=$url_array[3]?>;u4=<?=$url_array[2]?>;ord=1?" width="1" height="1" alt=""/>
</noscript>
<!-- End of DoubleClick Floodlight Tag: Please do not remove -->
<script>
window.APRT_DATA = {
         pageType : 1,
         currentCategory: {
                           id: <?=$MY_SEC_ID?>,
                           name: '<?=$url_array[2]?>'
                          },
	currentProduct: {
			   id: <?=$url_array[3]?>,
			   name: '<?=$arResult["NAME"]?>'
			   price: <?=$arResult["DISPLAY_PROPERTIES"]["col_price"]["VALUE"]?>
			}
};
</script>
<script src="//5757yvu.ru/code/snowqueen.ru/" defer></script>


<!-- popular - to be -->
<aside class="aside2">
<h4>Популярные модели</h4>
<nav class="catalog2">
<?
$section_code=str_replace("/collection/","",$APPLICATION->GetCurDir());
$section_code=substr($section_code,0,strpos($section_code,"/"));

$arSelect = Array("ID", "NAME", "DETAIL_PICTURE","PROPERTY_*");
$arFilter = Array(
       				'IBLOCK_ID' => '1',
       				"SECTION_CODE"=>$section_code,
       				"ACTIVE_DATE"=>"Y",
       				"ACTIVE"=>"Y",
		            Array(
							'LOGIC' => 'OR',
							'PROPERTY_col_availability' => '1',
			                'PROPERTY_col_city_id' => strval($_SESSION['city_id'])
		                  )
  			      );

$res = CIBlockElement::GetList(Array("SHOW_COUNTER"=>"DESC"), $arFilter, false, Array("nPageSize"=>6), $arSelect);
while($ob = $res->GetNextElement()){
$arFields = $ob->GetFields();
$arFile = CFile::GetFileArray($arFields['DETAIL_PICTURE']);
$file = CFile::ResizeImageGet($arFile, array('width'=>95, 'height'=>125), BX_RESIZE_IMAGE_PROPORTIONAL, true);
$img = $file['src'];
?>
<article><a href="/collection/<?=$section_code;?>/<?=$arFields['ID'];?>/"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
            <img src="<?=$img;?>" alt="<?=$arFields['NAME'];?>"  title="<?=$arFields['NAME'];?>">
            <!--[if lte IE 7]></span></span><![endif]--></span>
</a></article>
<!-- end article-->
<?}?>
</nav>
<!-- end .catalog2-->
</aside>
<!-- end .aside2-->
