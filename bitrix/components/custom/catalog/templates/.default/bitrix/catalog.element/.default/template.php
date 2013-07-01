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
<article class="item" itemscope itemtype="http://schema.org/Product">
<section class="text">
            <h1 itemprop="name"><?=$arResult["NAME"]; ?></h1>
            <p>Код товара: <?=strip_tags($arResult["DISPLAY_PROPERTIES"]["col_model_code"]["VALUE"]); ?></p>
            <p>Бренд: <strong itemprop="brand"><?=strip_tags($arResult["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]); ?></strong></p>

            <? if ($arResult["DISPLAY_PROPERTIES"]["col_price"]["VALUE"] < $arResult["DISPLAY_PROPERTIES"]["col_price_origin"]["VALUE"]) {?>

            <div class="price bg-red" itemprop="offers" itemscope itemtype="http://schema.org/Offer"> <span itemprop="price"><?=number_format($arResult["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')?></span>&nbsp;<span itemprop="priceCurrency">руб</span> <del><?=number_format($arResult["DISPLAY_PROPERTIES"]["col_price_origin"]["VALUE"], 0, '.', ' ')?></del> </div>
            <?}  else { ?>
            <? echo '<div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"> <span itemprop="price">'.number_format($arResult["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ').'</span>&nbsp;<span itemprop="priceCurrency">руб</span>&nbsp;<new>New</new></div>'; } ?>
            <!-- end .price-->

            <div class="likes">
              <table>
                <tr>
                  <td>
                      <div class="vk-hack"><div id="vk_like"></div></div>
				      <!-- Original VK block
                      <div id="vk_like"></div>
				      <script type="text/javascript">
						VK.Widgets.Like("vk_like", {type: "button", height: 20});
				      </script>
				      -->
				 </td>
				 <td class="sep">&nbsp;&nbsp;</td>
				 <td>
				      <!-- ORIGINAL FB
                      <div class="fb-like" data-href="http://snowqueen.ru<?=$APPLICATION->GetCurDir()?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
                      -->
                      <fb:like send="false" layout="button_count" width="450" show_faces="false" font="arial"></fb:like>
				 </td>
				 <td class="sep">&nbsp;&nbsp;</td>
				 <td>
                      <div class="twitter-hack"><a href="https://twitter.com/share" class="twitter-share-button" data-lang="ru">Твитнуть</a></div>
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
              </table>
            </div>

            <!-- end .likes-->
            <!--
            <div itemprop="description">
              <p>Красивые и качественные товары можно приобрести очень легко, достаточно оформить заказ на сайте и уже на следующий день наш курьер доставит обновку в офис или домой для примерки</p>
            </div>
            -->
            <ul class="links">
              <li><a href="/actions/" title="Акции" onClick="trackOutboundLink(this, 'Outbound Links', 'actions_card'); return false;">Скидки %</a></li>
              <li><a href="/our_shops/" title="Наши магазины" onClick="trackOutboundLink(this, 'Outbound Links', 'our_shops_card'); return false;">Где купить?</a></li>
            </ul>

            <!-- end .links-->
<p class="grey">Внимание (!) Цены на сайте могут отличаться от действующих.<br>Точную цену товара узнавайте в магазинах или уточняйте по телефону (495) 777-8-999.</p>
</section>
<!-- end .text-->
<section class="gallery">
<?
 $resizer = $arResult['DETAIL_PICTURE'];
 $file = CFile::ResizeImageGet($resizer, array('width'=>310, 'height'=>418), BX_RESIZE_IMAGE_PROPORTIONAL, true);
 $img = $file['src'];
?>

            <div class="big"><a class="zoom-pic" title='<?=$arResult["NAME"]?>' href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"><img src="<?=$img;?>" itemprop="image" alt='<?=$arResult["NAME"]?>'><span class="zoom"></span></a></div>

            <!-- end .big-->
            <div class="slider">
              <!--
              <div class="prev"></div>
              <div class="next"></div>
              -->
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

                    <li><a data-big="<?=$arResult['DETAIL_PICTURE']['SRC']?>" title="" href="<?=$img2;?>"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
                    <img src="<?=$img;?>" alt="">
                    <!--[if lte IE 7]></span></span><![endif]--></span></a></li>

                    <?
                       $resizer = $arResult['PROPERTIES']['add_pic_1']['VALUE'];
                       $file = CFile::ResizeImageGet($resizer, array('width'=>75, 'height'=>103), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                       $img = $file['src'];

                       $resizer2 = $arResult['PROPERTIES']['add_pic_1']['VALUE'];
                       $file2 = CFile::ResizeImageGet($resizer2, array('width'=>310, 'height'=>418), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                       $img2 = $file2['src'];


                    ?>

                    <? if ($arResult["DISPLAY_PROPERTIES"]['add_pic_1']["FILE_VALUE"]["SRC"]!='')  { ?>
                    <li><a data-big="<?=$arResult["DISPLAY_PROPERTIES"]['add_pic_1']["FILE_VALUE"]["SRC"]?>" title="" href="<?=$img2;?>"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
                    <img src="<?=$img;?>" alt="">
                    <!--[if lte IE 7]></span></span><![endif]--></span></a></li>
                    <?} ?>

                    <?
                       $resizer = $arResult['PROPERTIES']['add_pic_2']['VALUE'];
                       $file = CFile::ResizeImageGet($resizer, array('width'=>75, 'height'=>103), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                       $img = $file['src'];

                       $resizer2 = $arResult['PROPERTIES']['add_pic_2']['VALUE'];
                       $file2 = CFile::ResizeImageGet($resizer2, array('width'=>310, 'height'=>418), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                       $img2 = $file2['src'];

                    ?>

                   <? if ($arResult["DISPLAY_PROPERTIES"]['add_pic_2']["FILE_VALUE"]["SRC"]!='')  { ?>
                    <li><a data-big="<?=$arResult["DISPLAY_PROPERTIES"]['add_pic_2']["FILE_VALUE"]["SRC"]?>" title="" href="<?=$img2;?>"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
                    <img src="<?=$img;?>" alt="">
                    <!--[if lte IE 7]></span></span><![endif]--></span></a></li>
                    <?} ?>

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
<script language="javascript">
var odinkod = {
"type": "product",
"product_id":"<?=$arResult["ID"]?>"
};
var gcb = Math.round(Math.random() * 100000);
document.write('<scr'+'ipt src="'+('https:' == document.location.protocol ? 'https://ssl.' : 'http://') +
'cdn.odinkod.ru/tags/772300-390d07.js?gcb='+ gcb +'"></scr'+'ipt>');
</script>

<!-- popular - to be -->
