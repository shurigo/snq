<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<?$APPLICATION->ShowMeta("robots")?>
<?$APPLICATION->ShowMeta("keywords")?>
<?$APPLICATION->ShowMeta("description")?>
<title>�������� �������� - ���� ��������������� ��������� ������ ������.  ����, ��������, ������� ������, ������, ������ ������ � ����������.</title>
<meta name="keywords" content="�������� ����, ��������, ������� ������, ������, �����, ��������, ������� ������, ������, �����, ����������, ������, ���� �� �������" />
<meta name="description" content="����, ��������, ������� ������, ������, ������ ������ � ���������� � �������� ��������. ������ ������ �������� ����, ������� ����� ��� ������� ������, �� �� ������ ��� �������? ��������� � ���� �������� � �������������� ������ ����� � ���������." />
<?$APPLICATION->ShowCSS();?>
<?$APPLICATION->ShowHeadStrings()?>
<?$APPLICATION->ShowHeadScripts()?>
<link href="/css/style.css" rel="stylesheet" type="text/css">
<!--[if lte IE 7]><link href="/css/ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
<!--[if lte IE 8]>
<script type="text/javascript" src="/js/PIE.js"></script>
<script type="text/javascript" src="/js/html5support.js"></script>
<![endif]-->
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.9.2.custom.min.js"></script>
<script type='text/javascript' src='/js/jquery.jqzoom-core.js'></script>
<script type="text/javascript" src="/js/jquery.main.js"></script>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=latin,cyrillic' rel='stylesheet' type='text/css' />

<script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-23458231-1']);

    _gaq.push(['_addOrganic', 'images.yandex.ru', 'text', true]);
    _gaq.push(['_addOrganic', 'blogsearch.google.ru', 'q', true]);
    _gaq.push(['_addOrganic', 'blogs.yandex.ru', 'text', true]);
    _gaq.push(['_addOrganic', 'go.mail.ru', 'q']);
    _gaq.push(['_addOrganic', 'nova.rambler.ru', 'query']);
    _gaq.push(['_addOrganic', 'nigma.ru', 's']);
    _gaq.push(['_addOrganic', 'webalta.ru', 'q']);
    _gaq.push(['_addOrganic', 'aport.ru', 'r']);
    _gaq.push(['_addOrganic', 'poisk.ru', 'text']);
    _gaq.push(['_addOrganic', 'km.ru', 'sq']);
    _gaq.push(['_addOrganic', 'liveinternet.ru', 'q']);
    _gaq.push(['_addOrganic', 'quintura.ru', 'request']);
    _gaq.push(['_addOrganic', 'search.qip.ru', 'query']);
    _gaq.push(['_addOrganic', 'gde.ru', 'keywords']);
    _gaq.push(['_addOrganic', 'ru.yahoo.com', 'p']);

	_gaq.push(['_trackPageview']);

	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

</script>

<script type="text/javascript">
function trackOutboundLink(link, category, action) {

try {
_gaq.push(['_trackEvent', category , action]);
} catch(err){}

setTimeout(function() {
document.location.href = link.href;
}, 100);
}
</script>

</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div class="wrapper">
  <div class="container">

    <!-- header -->
    <? include($_SERVER["DOCUMENT_ROOT"]."/inc/header.php"); ?>

    <!-- top menu -->
    <? include($_SERVER["DOCUMENT_ROOT"]."/inc/topmenu.php"); ?>

    <div class="content">

     <!-- actions -->
     <?

    $myFilter = array(
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"IBLOCK_LID" => SITE_ID,
			"IBLOCK_ACTIVE" => "Y",
			"ACTIVE_DATE" => "Y",
			"ACTIVE" => "Y",
			"CHECK_PERMISSIONS" => "Y",
			"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
			Array('LOGIC' => 'OR',
				'PROPERTY_col_availability' => '1',
				'PROPERTY_col_city_id' => strval($_SESSION['city_id'])
			)
   	);

	$APPLICATION->IncludeComponent("bitrix:catalog.section", "mainpage_actions", Array (
    "DISPLAY_DATE" => "Y",	// �������� ���� ��������
    "DISPLAY_NAME" => "Y",	// �������� �������� ��������
    "DISPLAY_PICTURE" => "Y",	// �������� ����������� ��� ������
    "DISPLAY_PREVIEW_TEXT" => "Y",	// �������� ����� ������
    "AJAX_MODE" => "N",	// �������� ����� AJAX
    "IBLOCK_TYPE" => "actions",	// ��� ��������������� ����� (������������ ������ ��� ��������)
    "IBLOCK_ID" => "4",	// ��� ��������������� �����
    "NEWS_COUNT" => "1000",	// ���������� �������� �� ��������
    "SORT_BY1" => "ACTIVE_FROM",	// ���� ��� ������ ���������� ��������
    "SORT_ORDER1" => "DESC",	// ����������� ��� ������ ���������� ��������
    "SORT_BY2" => "SORT",	// ���� ��� ������ ���������� ��������
    "SORT_ORDER2" => "ASC",	// ����������� ��� ������ ���������� ��������
    "FILTER_NAME" => "myFilter",	// ������
    "FIELD_CODE" => "",	// ����
    "PROPERTY_CODE" => array(0=>"col_availability"),	// �������� "actions_carousel"
    "CHECK_DATES" => "Y",	// ���������� ������ �������� �� ������ ������ ��������
    "DETAIL_URL" => "",	// URL �������� ���������� ��������� (�� ��������� - �� �������� ���������)
    "PREVIEW_TRUNCATE_LEN" => "",	// ������������ ����� ������ ��� ������ (������ ��� ���� �����)
    "ACTIVE_DATE_FORMAT" => "d.m.Y",	// ������ ������ ����
    "DETAIL_PROPERTY_CODE" => array(0=>"col_availability"),
	  "DISPLAY_PANEL" => "N",	// ��������� � �����. ������ ������ ��� ������� ����������
    "SET_TITLE" => "N",	// ������������� ��������� ��������
    "SET_STATUS_404" => "Y",	// ������������� ������ 404, ���� �� ������� ������� ��� ������
    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// �������� �������� � ������� ���������
    "ADD_SECTIONS_CHAIN" => "Y",	// �������� ������ � ������� ���������
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// �������� ������, ���� ��� ���������� ��������
    "PARENT_SECTION" => "",	// ID �������
    "PARENT_SECTION_CODE" => "",	// ��� �������
    "CACHE_TYPE" => "A",	// ��� �����������
    "CACHE_TIME" => "3600",	// ����� ����������� (���.)
    "CACHE_FILTER" => "N",	// ���������� ��� ������������� �������
    "CACHE_GROUPS" => "Y",	// ��������� ����� �������
    "DISPLAY_TOP_PAGER" => "N",	// �������� ��� �������
    "DISPLAY_BOTTOM_PAGER" => "N",	// �������� ��� �������
    "PAGER_TITLE" => "�����",	// �������� ���������
    "PAGER_SHOW_ALWAYS" => "N",	// �������� ������
    "PAGER_TEMPLATE" => "",	// �������� �������
    "PAGER_DESC_NUMBERING" => "N",	// ������������ �������� ���������
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// ����� ����������� ������� ��� �������� ���������
    "PAGER_SHOW_ALL" => "N",	// ���������� ������ "���"
    "AJAX_OPTION_SHADOW" => "Y",	// �������� ���������
    "AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
    "AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
    "AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
    ),
    false
);?>


     <!-- end actions -->


     <div class="social-hold">
     <!--
        <form class="subscr" action="/" method="get">
          <fieldset>
            <span>����������� �� ��������� ������� � �����</span>
            <input value="��� e-mail �����" type="text">
            <input value="�����������" type="submit">
          </fieldset>
        </form>
        -->
        <!-- end .subscr-->
        <!--
        <ul class="socials">
          <li>����������� � ����</li>
          <li><a class="vk" href="#">���������</a></li>
          <li><a class="fb" href="#">Facebook</a></li>
          <li><a class="tw" href="#">Twitter</a></li>
        </ul> -->
        <!-- end .socials-->

      </div>

      <!-- end .social-hold-->


      <ul class="info-links">
        <li><a href="http://shop.snq.ru/" target="_blank" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'shop.snq.ru - big_image_main_page'); return false;"><img src="/images/img1.jpg" width="321" height="274" alt=" "><span class="text1">��������-�������</span></a></li>
        <li><a href="http://likeaqueen.ru/" target="_blank" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'likeaqueen.ru - big_image_main_page'); return false;"><img src="/images/img2.jpg" width="321" height="274" alt=""><span class="text1">���� � �����</span></a></li>
        <li>
                  	<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "mainpage_hot_model", Array(
                    "AJAX_MODE" => "N",	// �������� ����� AJAX
                    "IBLOCK_TYPE" => "collection",	// ��� ����-�����
                    "IBLOCK_ID" => "1",	// ����-����
                    "SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID �������
                    "SECTION_CODE" => "",	// ��� �������
                    "ELEMENT_SORT_FIELD" => "sort",	// �� ������ ���� ��������� ��������
                    "ELEMENT_SORT_ORDER" => "asc",	// ������� ���������� ���������
                    "FILTER_NAME" => "arrFilter",	// ��� ������� �� ���������� ������� ��� ���������� ���������
                    "INCLUDE_SUBSECTIONS" => "Y",	// ���������� �������� ����������� �������
                    "SHOW_ALL_WO_SECTION" => "Y",	// ���������� ��� ��������, ���� �� ������ ������
                    "SECTION_URL" => "",	// URL, ������� �� �������� � ���������� �������
                    "DETAIL_URL" => "/collection/#SECTION_CODE#/#ELEMENT_ID#/",	// URL, ������� �� �������� � ���������� �������� �������
                    "BASKET_URL" => "/personal/basket.php",	// URL, ������� �� �������� � �������� ����������
                    "ACTION_VARIABLE" => "action",	// �������� ����������, � ������� ���������� ��������
                    "PRODUCT_ID_VARIABLE" => "id",	// �������� ����������, � ������� ���������� ��� ������ ��� �������
                    "PRODUCT_QUANTITY_VARIABLE" => "quantity",	// �������� ����������, � ������� ���������� ���������� ������
                    "PRODUCT_PROPS_VARIABLE" => "prop",	// �������� ����������, � ������� ���������� �������������� ������
                    "SECTION_ID_VARIABLE" => "SECTION_ID",	// �������� ����������, � ������� ���������� ��� ������
                    "META_KEYWORDS" => "-",	// ���������� �������� ����� �������� �� ��������
                    "META_DESCRIPTION" => "-",	// ���������� �������� �������� �� ��������
                    "BROWSER_TITLE" => "-",	// ���������� ��������� ���� �������� �� ��������
                    "DISPLAY_PANEL" => "N",	// ��������� � �����. ������ ������ ��� ������� ����������
                    "ADD_SECTIONS_CHAIN" => "N",	// �������� ������ � ������� ���������
                    "DISPLAY_COMPARE" => "N",	// �������� ������ ���������
                    "SET_TITLE" => "N",	// ������������� ��������� ��������
                    "SET_STATUS_404" => "N",	// ������������� ������ 404, ���� �� ������� ������� ��� ������
                    "PAGE_ELEMENT_COUNT" => "1",	// ���������� ��������� �� ��������
                    "LINE_ELEMENT_COUNT" => "1",	// ���������� ��������� ��������� � ����� ������ �������
                    "PROPERTY_CODE" => array(	// ��������
                        0 => "col_hot_model",
                        1 => "col_model_code",
                        2 => "col_price",
                        3 => "col_brand",
                        4 => "col_price_new",
                    ),
                    "PRICE_CODE" => "",	// ��� ����
                    "USE_PRICE_COUNT" => "N",	// ������������ ����� ��� � �����������
                    "SHOW_PRICE_COUNT" => "1",	// �������� ���� ��� ����������
                    "PRICE_VAT_INCLUDE" => "Y",	// �������� ��� � ����
                    "PRODUCT_PROPERTIES" => "",	// �������������� ������
                    "USE_PRODUCT_QUANTITY" => "N",	// ��������� �������� ���������� ������
                    "CACHE_TYPE" => "A",	// ��� �����������
                    "CACHE_TIME" => "3600",	// ����� ����������� (���.)
                    "CACHE_FILTER" => "N",	// ���������� ��� ������������� �������
                    "CACHE_GROUPS" => "Y",	// ��������� ����� �������
                    "DISPLAY_TOP_PAGER" => "N",	// �������� ��� �������
                    "DISPLAY_BOTTOM_PAGER" => "N",	// �������� ��� �������
                    "PAGER_TITLE" => "������",	// �������� ���������
                    "PAGER_SHOW_ALWAYS" => "N",	// �������� ������
                    "PAGER_TEMPLATE" => "",	// �������� �������
                    "PAGER_DESC_NUMBERING" => "N",	// ������������ �������� ���������
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// ����� ����������� ������� ��� �������� ���������
                    "PAGER_SHOW_ALL" => "N",	// ���������� ������ "���"
                    "AJAX_OPTION_SHADOW" => "Y",	// �������� ���������
                    "AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
                    "AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
                    "AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������

                    "SHOW_HOT_MODEL" => "Y" //������������: ���� "Y", �� ���������� ��� ������ � ������� ����� ������� "���� ������"
                    ),
                    false
                );?>
        </li>
      </ul>
      <!-- end .info-links-->
      <!--
      <br>
      <hr class="hr_red">
      <ul class="info-links2">
        <li><a href="/upload/SNQ_SS_13_catalog.pdf" rel="nofollow"><img src="/images/catalog_ss2013.png" alt="" border="0"></a></li>
        <li><iframe width="495" height="275" frameborder="0" src="http://www.youtube.com/embed/Gzr3N7JkG-k" allowfullscreen=""></iframe></li>
      </ul>
      -->
      <!-- end .info-links 2-->

    </div>
    <!-- end .content-->
    <div class="footer-place"></div>
  </div>
  <!-- end .container-->
</div>
<!-- end .wrapper-->
