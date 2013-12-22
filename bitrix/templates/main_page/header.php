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
<script type="text/javascript" src="/js/set-city.js"></script>
<script type="text/javascript" src="/js/snowfall.js"></script>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=latin,cyrillic' rel='stylesheet' type='text/css' />

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
			"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"]
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
    "PROPERTY_CODE" => array(0=>"col_availability",1=>"col_city_id"),	// �������� "actions_carousel"
    "CHECK_DATES" => "Y",	// ���������� ������ �������� �� ������ ������ ��������
    "DETAIL_URL" => "",	// URL �������� ���������� ��������� (�� ��������� - �� �������� ���������)
    "PREVIEW_TRUNCATE_LEN" => "",	// ������������ ����� ������ ��� ������ (������ ��� ���� �����)
    "ACTIVE_DATE_FORMAT" => "d.m.Y",	// ������ ������ ����
    "DETAIL_PROPERTY_CODE" => array(0=>"col_availability",1=>"col_city_id"),
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
        <ul class="socials">
          <li>����������� � ����</li>
          <li><a class="vk" href="http://vk.com/likeaqueen" rel="nofollow" target="_blank">���������</a></li>
          <li><a class="fb" href="https://facebook.com/likeaqueenru" rel="nofollow" target="_blank">Facebook</a></li>
          <li><a class="tw" href="https://twitter.com/LikeAQueenBlog" rel="nofollow" target="_blank">Twitter</a></li>
          <li><a class="ok" href="http://www.odnoklassniki.ru/group/51951031353532" rel="nofollow" target="_blank">�������������</a></li>
          <li><a class="ig" href="http://instagram.com/likeaqueenblog" rel="nofollow" target="_blank">Instagram</a></li>
        </ul>
        <!-- end .socials-->
     <?
     $APPLICATION->IncludeComponent("custom:subscribe.form","",Array(
		"AJAX_MODE" => "N",
		"SHOW_HIDDEN" => "Y",
		"ALLOW_ANONYMOUS" => "Y",
		"SHOW_AUTH_LINKS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"SET_TITLE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N"
	));
	?>
      </div>

      <!-- end .social-hold-->


      <ul class="info-links">
        <li><a href="http://shop.snq.ru/" target="_blank" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'shop.snq.ru - big_image_main_page'); return false;"><img src="/images/img1.jpg" width="321" height="274" alt=" "><span class="text1">��������-�������</span></a></li>
        <li><a href="http://likeaqueen.ru/" target="_blank" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'likeaqueen.ru - big_image_main_page'); return false;"><img src="/images/img2.jpg" width="321" height="274" alt=""><span class="text1">���� � ����</span></a></li>
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
                        4 => "col_price_origin",
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

      <br>
      <hr class="hr_red">
      <ul class="info-links2">
        <li><a href="/upload/SNQ_AW_1314_catalog.pdf" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'catalog'); return false;"><img src="/images/catalog_fw201314.jpg" alt="" border="0"></a></li>
        <li><iframe width="495" height="275" frameborder="0" src="//www.youtube.com/embed/sCOt2r1jcT8" allowfullscreen=""></iframe></li>
      </ul>

      <!-- end .info-links 2-->

    </div>
    <!-- end .content-->
    <div class="footer-place"></div>
  </div>
  <!-- end .container-->
</div>
<!-- end .wrapper-->
=======
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
<script type="text/javascript" src="/js/set-city.js"></script>
<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow&amp;subset=latin,cyrillic" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery.nyroModal.custom.js"></script>
<!--[if IE 6]>
		<script type="text/javascript" src="/js/jquery.nyroModal-ie6.min.js"></script>
<![endif]-->
<link href="/css/nyroModal.css" rel="stylesheet" type="text/css">
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
			"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"]
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
    "PROPERTY_CODE" => array(0=>"col_availability",1=>"col_city_id"),	// �������� "actions_carousel"
    "CHECK_DATES" => "Y",	// ���������� ������ �������� �� ������ ������ ��������
    "DETAIL_URL" => "",	// URL �������� ���������� ��������� (�� ��������� - �� �������� ���������)
    "PREVIEW_TRUNCATE_LEN" => "",	// ������������ ����� ������ ��� ������ (������ ��� ���� �����)
    "ACTIVE_DATE_FORMAT" => "d.m.Y",	// ������ ������ ����
    "DETAIL_PROPERTY_CODE" => array(0=>"col_availability",1=>"col_city_id"),
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
        <ul class="socials">
          <li>����������� � ����</li>
          <li><a class="vk" href="http://vk.com/likeaqueen" rel="nofollow" target="_blank">���������</a></li>
          <li><a class="fb" href="https://facebook.com/likeaqueenru" rel="nofollow" target="_blank">Facebook</a></li>
          <li><a class="tw" href="https://twitter.com/LikeAQueenBlog" rel="nofollow" target="_blank">Twitter</a></li>
          <li><a class="ok" href="http://www.odnoklassniki.ru/group/51951031353532" rel="nofollow" target="_blank">�������������</a></li>
          <li><a class="ig" href="http://instagram.com/likeaqueenblog" rel="nofollow" target="_blank">Instagram</a></li>
        </ul>
        <!-- end .socials-->
     <?
     $APPLICATION->IncludeComponent("custom:subscribe.form","",Array(
		"AJAX_MODE" => "N",
		"SHOW_HIDDEN" => "Y",
		"ALLOW_ANONYMOUS" => "Y",
		"SHOW_AUTH_LINKS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"SET_TITLE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N"
	));
	?>
      </div>

      <!-- end .social-hold-->


      <ul class="info-links">
        <li><a href="http://shop.snq.ru/" target="_blank" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'shop.snq.ru - big_image_main_page'); return false;"><img src="/images/img1.jpg" width="321" height="274" alt=" "><span class="text1">��������-�������</span></a></li>
        <li><a href="http://likeaqueen.ru/" target="_blank" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'likeaqueen.ru - big_image_main_page'); return false;"><img src="/images/img2.jpg" width="321" height="274" alt=""><span class="text1">���� � ����</span></a></li>
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
                        4 => "col_price_origin",
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

      <br>
      <hr class="hr_red">
      <ul class="info-links2">
        <li><a href="/upload/SNQ_AW_1314_catalog.pdf" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'catalog'); return false;"><img src="/images/catalog_fw201314.jpg" alt="" border="0"></a></li>
        <li><iframe width="495" height="275" frameborder="0" src="//www.youtube.com/embed/iAM2MQ9aWAY" allowfullscreen=""></iframe></li>
      </ul>

      <!-- end .info-links 2-->

    </div>
    <!-- end .content-->
    <div class="footer-place"></div>
  </div>
  <!-- end .container-->
</div>
<!-- end .wrapper-->
