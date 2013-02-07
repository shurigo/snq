<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$arResult["NAME"][0] = mb_strtoupper($arResult["NAME"][0], "windows-1251");
?>

<section class="mainContent2">

<?
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
            <p>��� ������: <?=strip_tags($arResult["DISPLAY_PROPERTIES"]["col_model_code"]["VALUE"]); ?></p>
            <p>�����: <strong><?=strip_tags($arResult["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]); ?></strong></p>
            <div class="price bg-red"> <span itemprop="price">39 990 ���</span> <del>60 000</del> </div>
            <!-- end .price-->
            <div class="likes">
              <table>
                <tr>
                  <td><img src="../images/temp/fb.png" width="46" height="20" alt=" "></td>
                  <td class="sep">&nbsp;</td>
                  <td><img src="../images/temp/tw.png" width="55" height="20" alt=" "></td>
                  <td class="sep">&nbsp;</td>
                  <td><img src="img/temp/pi.png" width="43" height="20" alt=" "></td>
                  <td class="sep">&nbsp;</td>
                  <td><img src="img/temp/fb2.png" width="52" height="20" alt=" "></td>
                  <td class="sep">&nbsp;</td>
                  <td><img src="img/temp/goo.png" width="32" height="20" alt=" "></td>
                </tr>
              </table>
            </div>
            <!-- end .likes-->
            <div itemprop="description">
              <p>�������� � ������������ ������ ����� ���������� ����� �����, ���������� �������� ����� �� ����� � ��� �� ��������� ���� ��� ������ �������� ������� � ���� ��� ����� ��� ��������</p>
            </div>
            <ul class="links">
              <li><a href="#">������</a></li>
              <li><a href="#">����� � ��������</a></li>
            </ul>
            <!-- end .links-->
            <p class="grey">�������� (!) ���� �� ����� �����  ������������ �����������.������ ����  ������ ���������� ��������� ��� ��������� �� �������� (495) 777-8-999.</p>
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
                  <li><a data-big="img/temp/5-big.jpg" title="IMAGE TITLE" href="img/temp/5.jpg"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
                    <img src="img/temp/1.jpg" width="75" height="103" alt="">
                    <!--[if lte IE 7]></span></span><![endif]--></span></a></li>
                  <li><a data-big="img/temp/2-big.jpg" title="IMAGE TITLE 2" href="img/temp/2.jpg"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
                    <img src="img/temp/2.jpg" width="63" height="105" alt="">
                    <!--[if lte IE 7]></span></span><![endif]--></span></a></li>
                  <li><a data-big="img/temp/3-big.jpg" title="IMAGE TITLE 3" href="img/temp/3.jpg"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
                    <img src="img/temp/3.jpg" width="73" height="107" alt=" ">
                    <!--[if lte IE 7]></span></span><![endif]--></span></a></li>
                  <li><a data-big="img/temp/5-big.jpg" title="IMAGE TITLE 4" href="img/temp/5.jpg"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
                    <img src="img/temp/4.jpg" width="81" height="89" alt="">
                    <!--[if lte IE 7]></span></span><![endif]--></span></a></li>
                  <li><a data-big="img/temp/5-big.jpg" title="IMAGE TITLE 5" href="img/temp/5.jpg"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
                    <img src="img/temp/4.jpg" width="81" height="89" alt="">
                    <!--[if lte IE 7]></span></span><![endif]--></span></a></li>
                  <li><a data-big="img/temp/5-big.jpg" title="IMAGE TITLE 6" href="img/temp/5.jpg"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
                    <img src="img/temp/2.jpg" width="63" height="105" alt="">
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
        <h4>���������� ������</h4>
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
    </div>
    <!-- end .content-->