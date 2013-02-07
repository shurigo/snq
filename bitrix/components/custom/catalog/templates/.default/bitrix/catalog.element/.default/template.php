<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="mainContent2">
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
//print_r($arResult);
//print_r($arResult["DISPLAY_PROPERTIES"]['add_pic_1']);
//echo $arResult["DISPLAY_PROPERTIES"]["add_pic_1"]["FILE_VALUE"]["SRC"];

?>
<article class="item" itemscope itemtype="http://schema.org/Product">
          <section class="text">
            <h1 itemprop="name"><?=$arResult["NAME"]; ?></h1>
            <p>Код товара: <?=strip_tags($arResult["DISPLAY_PROPERTIES"]["col_model_code"]["VALUE"]); ?></p>
            <p>Бренд: <strong><?=strip_tags($arResult["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]); ?></strong></p>

            <? if (isset($arResult["DISPLAY_PROPERTIES"]["col_price_new"]["VALUE"])) {?>
            <div class="price bg-red"> <span itemprop="price"><?=number_format($arResult["DISPLAY_PROPERTIES"]["col_price_new"]["VALUE"], 0, '.', ' ')?> руб</span> <del><?=number_format($arResult["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')?></del> </div>
            <?}  else { ?>
            <? echo '<div class="price"> <span itemprop="price">'.number_format($arResult["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ').'руб</span></div>'; } ?>
            <!-- end .price-->

            <div class="likes">
              <table>
                <tr>
                  <td><img src="/images/temp/fb.png" width="46" height="20" alt=" "></td>
                  <td class="sep">&nbsp;</td>
                  <td><img src="/images/temp/tw.png" width="55" height="20" alt=" "></td>
                  <td class="sep">&nbsp;</td>
                  <td><img src="/images/temp/pi.png" width="43" height="20" alt=" "></td>
                  <td class="sep">&nbsp;</td>
                  <td><img src="/images/temp/fb2.png" width="52" height="20" alt=" "></td>
                  <td class="sep">&nbsp;</td>
                  <td><img src="/images/temp/goo.png" width="32" height="20" alt=" "></td>
                </tr>
              </table>
            </div>
            <!-- end .likes-->
            <!--
            <div itemprop="description">
              <p>Красивые и качественные товары можно приобрести очень легко, достаточно оформить заказ на сайте и уже на следующий день наш курьер доставит обновку в офис или домой для примерки</p>
            </div>
            <ul class="links">
              <li><a href="#">Купить</a></li>
              <li><a href="#">Найти в магазине</a></li>
            </ul>
            -->
            <!-- end .links-->
            <p class="grey">Внимание (!) Цены на сайте могут  отличатьсяот действующих.Точную цену  товара узнавайтев магазинах или уточняйте по телефону (495) 777-8-999.</p>
          </section>
          <!-- end .text-->
          <section class="gallery">

            <div class="big"><a class="zoom-pic" title="IMAGE TITLE" href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt=" " width="310px" height="418"><span class="zoom"></span></a></div>

            <!-- end .big-->
            <div class="slider">
              <div class="prev"></div>
              <div class="next"></div>
              <div class="hold">
                <ul>
                  <li><a data-big="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" title="IMAGE TITLE" href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
                    <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="75" height="103" alt="">
                    <!--[if lte IE 7]></span></span><![endif]--></span></a></li>
                    <li><a data-big="<?=$arResult["DISPLAY_PROPERTIES"]['add_pic_1']["FILE_VALUE"]["SRC"]?>" title="IMAGE TITLE 2" href="<?=$arResult["DISPLAY_PROPERTIES"]["add_pic_1"]["FILE_VALUE"]["SRC"]?>"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
                    <img src="<?=$arResult["DISPLAY_PROPERTIES"]["add_pic_1"]["FILE_VALUE"]["SRC"]?>" width="63" height="105" alt="">
                    <!--[if lte IE 7]></span></span><![endif]--></span></a></li>
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

      <aside class="aside2">
        <h4>Популярные товары</h4>
        <nav class="catalog2">
          <article><a href="#"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
            <img src="img/temp/1.jpg" width="75" height="103" alt="">
            <!--[if lte IE 7]></span></span><![endif]--></span></a></article>
          <!-- end article-->
          <article><a href="#"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
            <img src="img/temp/2.jpg" width="63" height="105" alt="">
            <!--[if lte IE 7]></span></span><![endif]--></span></a></article>
          <!-- end article-->
          <article><a href="#"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
            <img src="img/temp/3.jpg" width="73" height="107" alt=" ">
            <!--[if lte IE 7]></span></span><![endif]--></span></a></article>
          <!-- end article-->
          <article><a href="#"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
            <img src="img/temp/4.jpg" width="81" height="89" alt="">
            <!--[if lte IE 7]></span></span><![endif]--></span></a></article>
          <!-- end article-->
          <article><a href="#"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
            <img src="img/temp/1.jpg" width="75" height="103" alt="">
            <!--[if lte IE 7]></span></span><![endif]--></span></a></article>
          <!-- end article-->
          <article><a href="#"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
            <img src="img/temp/2.jpg" width="63" height="105" alt="">
            <!--[if lte IE 7]></span></span><![endif]--></span></a></article>
          <!-- end article-->
        </nav>
        <!-- end .catalog2-->
      </aside>
      <!-- end .aside2-->
