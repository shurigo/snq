<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div class="wrapper">
  <div class="container">
    <header class="header">
      <div class="logo"><img src="/images/logo.png" width="200" height="57" alt="������� ��������"></div>
      <!-- end .logo-->
      <div class="phone">8(800) 777-8-999</div>
      <!-- end .phone-->
      <nav class="menu1"><a href="#">��������</a> <span>|</span> <a href="#">��������</a> <span>|</span> <a href="#">���������� � ����</a></nav>
      <!-- end .menu1-->
    </header>
    <!-- end .header-->

    <!-- top manu -->
    <? include("/inc/topmenu.php"); ?>

    <div class="content">

     <!-- actions -->
     <?$APPLICATION->IncludeComponent("bitrix:catalog.section", "mainpage_actions", Array(
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
    "FILTER_NAME" => "",	// ������
    "FIELD_CODE" => "",	// ����
    "PROPERTY_CODE" => array("actions_carousel"),	// ��������
    "CHECK_DATES" => "Y",	// ���������� ������ �������� �� ������ ������ ��������
    "DETAIL_URL" => "",	// URL �������� ���������� ��������� (�� ��������� - �� �������� ���������)
    "PREVIEW_TRUNCATE_LEN" => "",	// ������������ ����� ������ ��� ������ (������ ��� ���� �����)
    "ACTIVE_DATE_FORMAT" => "d.m.Y",	// ������ ������ ����
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
        <form class="subscr" action="/" method="get">
          <fieldset>
            <span>����������� �� ��������� ������� � �����</span>
            <input value="��� e-mail �����" type="text">
            <input value="�����������" type="submit">
          </fieldset>
        </form>
        <!-- end .subscr-->
        <ul class="socials">
          <li>����������� � ����</li>
          <li><a class="vk" href="#">���������</a></li>
          <li><a class="fb" href="#">Facebook</a></li>
          <li><a class="tw" href="#">Twitter</a></li>
        </ul>
        <!-- end .socials-->
      </div>
      <!-- end .social-hold-->
      <ul class="info-links">
        <li><a href="#"><img src="/images/img1.jpg" width="321" height="274" alt=" "><span class="text1">��������-�������</span></a></li>
        <li><a href="#"><img src="/images/img2.jpg" width="321" height="274" alt=""><span class="text1">���� � �����</span></a></li>
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
    </div>
    <!-- end .content-->
    <div class="footer-place"></div>
  </div>
  <!-- end .container-->
</div>
<!-- end .wrapper-->
