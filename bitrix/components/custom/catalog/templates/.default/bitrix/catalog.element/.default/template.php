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
            <p>Бренд: <strong><?=strip_tags($arResult["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]); ?></strong></p>

            <? if (isset($arResult["DISPLAY_PROPERTIES"]["col_price_new"]["VALUE"])) {?>
            <div class="price bg-red"> <span itemprop="price"><?=number_format($arResult["DISPLAY_PROPERTIES"]["col_price_new"]["VALUE"], 0, '.', ' ')?> руб</span> <del><?=number_format($arResult["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')?></del> </div>
            <?}  else { ?>
            <? echo '<div class="price"> <span itemprop="price">'.number_format($arResult["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ').'руб</span>&nbsp;<new>New</new></div>'; } ?>
            <!-- end .price-->
           <!--
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
            -->
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
            <p class="grey">Внимание (!) Цены на сайте могут отличаться от действующих. Точную цену товара узнавайте в магазинах или уточняйте по телефону (495) 777-8-999.</p>
          </section>
          <!-- end .text-->
          <section class="gallery">
<?
  /*
  if ($arResult["DETAIL_PICTURE"]["HEIGHT"]>$arResult["DETAIL_PICTURE"]["WIDTH"])
  {
    $height=418;
    $x=round($arResult["DETAIL_PICTURE"]["HEIGHT"]/$height);
    $width=round($arResult["DETAIL_PICTURE"]["WIDTH"]/$x);

    if ($width>310)   // still too lage
    {
      $width=310;
      $x=round($arResult["DETAIL_PICTURE"]["WIDTH"]/$width);
      $height=round($arResult["DETAIL_PICTURE"]["HEIGHT"]/$x);
    }

  }
  else
  {
    $width=310;
    $x=round($arResult["DETAIL_PICTURE"]["WIDTH"]/$width);
    $height=round($arResult["DETAIL_PICTURE"]["HEIGHT"]/$x);
  } */

 $resizer = $arResult['DETAIL_PICTURE'];
 $file = CFile::ResizeImageGet($resizer, array('width'=>310, 'height'=>418), BX_RESIZE_IMAGE_PROPORTIONAL, true);
 $img = $file['src'];


?>

            <div class="big"><a class="zoom-pic" title="" href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"><img src="<?=$img;?>" alt=" "><span class="zoom"></span></a></div>

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

<!-- popular - to be -->
