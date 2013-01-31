<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CHARSET;?>" />
<?$APPLICATION->ShowMeta("robots")?>
<?$APPLICATION->ShowMeta("keywords")?>
<?$APPLICATION->ShowMeta("description")?>
<title><?$APPLICATION->ShowTitle()?></title>
<?$APPLICATION->ShowCSS();?>
<?$APPLICATION->ShowHeadStrings()?>
<?$APPLICATION->ShowHeadScripts()?>
</head>

<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<table style="width:100%;">
	<tr>
    	<td style="width:50%;"></td>
        <td style="width:980px;">
        	<div style="width:980px;">
            	<table style="width:980px;">
                	<tr>
                    	<td style="padding:10px 0 0 0;" valign="top"><img src="/images/logo.jpg" width="300" alt="������� ��������" title="������� ��������" /></td>
                        <td style="padding:10px 0 0 0;" valign="top">
                        	<table style="width:100%;">
                            	<tr>
                                	<td style="text-align:right;"><?$APPLICATION->IncludeComponent("bitrix:menu", "mainmenu", Array(
                                            "ROOT_MENU_TYPE" => "top",	// ��� ���� ��� ������� ������
                                            "MAX_LEVEL" => "1",	// ������� ����������� ����
                                            "CHILD_MENU_TYPE" => "top",	// ��� ���� ��� ��������� �������
                                            "USE_EXT" => "N",	// ���������� ����� � ������� ���� .���_����.menu_ext.php
                                            "ALLOW_MULTI_SELECT" => "N",	// ��������� ��������� �������� ������� ������������
                                            "MENU_CACHE_TYPE" => "N",	// ��� �����������
                                            "MENU_CACHE_TIME" => "3600",	// ����� ����������� (���.)
                                            "MENU_CACHE_USE_GROUPS" => "Y",	// ��������� ����� �������
                                            "MENU_CACHE_GET_VARS" => "",	// �������� ���������� �������
                                            ),
                                            false
                                        );?>
                                    </td>
                                </tr>
                                <tr>
                                	<td style="text-align:right; padding:20px 0 0 0;"><span style="font-size:14px;">(495)</span><span style="font-size:24px; color:#00244f;">777-8-999</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="margin:10px 0 0 0;">
            <table style="width:100%;">
            	<tr>
                	<td style="width:190px;"><a href="/collection/wfurs/"><img src="/images/catalog_menu/furs_collection.jpg" width="190" height="37" alt="��������� �����" title="��������� �����" /></a></td>
                    <td style="width:25%;"></td>
                    <td style="width:190px;"><a href="/collection/wskincoat/"><img src="/images/catalog_menu/sheepskin_coats.jpg" width="190" height="37" alt="������ �������" title="������ �������" /></a></td>
                    <td style="width:25%;"></td>
                    <td style="width:190px;"><a href="/collection/wleather/"><img src="/images/catalog_menu/leather_clothes.jpg" width="190" height="37" alt="������ �� ����" title="������ �� ����" /></a></td>
                    <td style="width:25%;"></td>
                    <td style="width:190px;"><a href="/collection/wclothes/"><img src="/images/catalog_menu/textile_clothes.jpg" width="190" height="37" alt="������ �� ��������" title="������ �� ��������" /></a></td>
                    <td style="width:25%;"></td>
                    <td style="width:190px;"><a href="/collection/waccess/"><img src="/images/catalog_menu/accessories.jpg" width="190" height="37" alt="����� � ����������" title="����� � ����������" /></a></td>
                </tr>
            </table>
            </div>
            <div style="margin:10px 0 0 0;">
            	<table style="width:100%;">
                	<tr>
                    	<td style="width:199px;" valign="top">
                        	<div style="width:199px; height:150px; background:url(/images/mainpage_blocks/download_catalog.jpg) no-repeat;">
                                <div style="width:199px; height:110px; cursor:pointer;" onclick="window.location='/collection/'"></div>
                                <div style="width:199px; height:52px; padding:6px 0 0 0px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/upload/SnowQueen_Autumn2010.pdf" style="font-weight:bold;" class="snq_color">������� �������</a><br />
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PDF, �����: 6,73 Mb</div>
                            </div>
                            <div style="margin:15px 0 0 0;"><a href="/actions/1038/"><img src="/images/mainpage_blocks/azhiotazh291010.jpg" width="199" height="150" alt="�������ƻ � �������� �������Ż" title="�������ƻ � �������� �������Ż" /></a></div>
                            <div style="margin:15px 0 0 0;"><a href="/about/news/?ELEMENT_ID=1039"><img src="/images/mainpage_blocks/skazki.jpg" width="199" height="150" alt="���������� ������ ����� �������� ������ � �������� �������� �������� ������������������ ��������� 2011�" title="���������� ������ ����� �������� ������ � �������� �������� �������� ������������������ ��������� 2011�" /></a></div>
                        </td>
                        <td style="padding:0 16px;" valign="top"><div><img src="/images/mainpage_blocks/style.jpg" width="512" height="56" /></div><div>
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
                        codebase="http://download.macromedia.com/pub/shockwave/cabs/
                        flash/swflash.cab#3,0,0,0" width="512" height="424">
                        <param name="SRC" value="/images/snowqueen.swf">
                        <embed src="/images/snowqueen.swf" pluginspage="http://www.macromedia.com/
                        shockwave/download/" type="application/x-shockwave-flash"
                        width="512" height="424">
                        </embed>
                        </object>
                      </div></td>
                        <td style="width:237px;" valign="top">
                        	<div><a href="/actions/1037/"><img src="/images/mainpage_blocks/shuby291010.jpg" width="237" height="150" alt="� �������� �������Ż ������ �� ���� 20%!" title="� �������� �������Ż ������ �� ���� 20%!" /></a></div>
                            <div style="margin:15px 0 0 0;"><a href="/actions/1040/"><img src="/images/mainpage_blocks/buyweeks291010.jpg" width="237" height="150" alt="� 25 ������� �� 7 ������ - ������� ������� ������� � �������� ��������!" title="� 25 ������� �� 7 ������ - ������� ������� ������� � �������� ��������!" /></a></div>
                            <div style="margin:15px 0 0 0;"><a href="/actions/1041/"><img src="/images/mainpage_blocks/sviter291010.jpg" width="237" height="150" alt="����� ������� � ������ ������ʻ!" title="����� ������� � ������ ������ʻ!" /></a></div>
                        </td>
                    </tr>
                    <tr>
                    	<td valign="top" style="padding:31px 0 0 0;">
                        	<div style="padding:10px 0 7px 16px;"><img src="/images/headers/brands.jpg" width="64" height="10" alt="������" title="������" /></div>
                            <div style="height:4px; background:url(/images/headers/header_underline.gif) repeat-x; width:100%;"></div>
                            <?$APPLICATION->IncludeComponent("bitrix:news.list", "mainpage_brands", Array(
                                "DISPLAY_DATE" => "Y",	// �������� ���� ��������
                                "DISPLAY_NAME" => "Y",	// �������� �������� ��������
                                "DISPLAY_PICTURE" => "Y",	// �������� ����������� ��� ������
                                "DISPLAY_PREVIEW_TEXT" => "Y",	// �������� ����� ������
                                "AJAX_MODE" => "N",	// �������� ����� AJAX
                                "IBLOCK_TYPE" => "brands",	// ��� ��������������� ����� (������������ ������ ��� ��������)
                                "IBLOCK_ID" => "2",	// ��� ��������������� �����
                                "NEWS_COUNT" => "10",	// ���������� �������� �� ��������
                                "SORT_BY1" => "ACTIVE_FROM",	// ���� ��� ������ ���������� ��������
                                "SORT_ORDER1" => "DESC",	// ����������� ��� ������ ���������� ��������
                                "SORT_BY2" => "SORT",	// ���� ��� ������ ���������� ��������
                                "SORT_ORDER2" => "ASC",	// ����������� ��� ������ ���������� ��������
                                "FILTER_NAME" => "",	// ������
                                "FIELD_CODE" => "",	// ����
                                "PROPERTY_CODE" => "",	// ��������
                                "CHECK_DATES" => "Y",	// ���������� ������ �������� �� ������ ������ ��������
                                "DETAIL_URL" => "/collection/brands/?ELEMENT_ID=#ELEMENT_ID#",	// URL �������� ���������� ��������� (�� ��������� - �� �������� ���������)
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
                                "PAGER_TITLE" => "�������",	// �������� ���������
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
                            <div style="padding:10px 0 10px 16px;"><a href="/collection/brands/" style="font-size:11px;">���� ������ �������</a></div>
                        </td>
                        <td valign="top" style="padding:31px 16px 0 16px;">
                        	<table style="width:100%;">
                            	<tr>
                                	<td valign="top" style="width:50%; padding:0 8px 0 0;">
                                    	<div style="padding:10px 0 7px 16px;"><img src="/images/headers/hot_clothes.jpg" width="108" height="10" alt="���� ������" title="���� ������" /></div>
			                            <div style="height:4px; background:url(/images/headers/header_underline.gif) repeat-x; width:100%;"></div>
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
                                        "DETAIL_URL" => "/collection/#SECTION_ID#/#ELEMENT_ID#/",	// URL, ������� �� �������� � ���������� �������� �������
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
                                    </td>
                                    <td valign="top" style="width:50%; padding:0 0 0 8px;">
	                                    <div style="padding:9px 0 7px 16px;"><img src="/images/headers/news.jpg" width="72" height="11" alt="�������" title="�������" /></div>
			                            <div style="height:4px; background:url(/images/headers/header_underline.gif) repeat-x; width:100%;"></div>
                                        <?$APPLICATION->IncludeComponent("bitrix:news.list", "mainpage_news", Array(
                                            "DISPLAY_DATE" => "Y",	// �������� ���� ��������
                                            "DISPLAY_NAME" => "Y",	// �������� �������� ��������
                                            "DISPLAY_PICTURE" => "Y",	// �������� ����������� ��� ������
                                            "DISPLAY_PREVIEW_TEXT" => "Y",	// �������� ����� ������
                                            "AJAX_MODE" => "N",	// �������� ����� AJAX
                                            "IBLOCK_TYPE" => "news",	// ��� ��������������� ����� (������������ ������ ��� ��������)
                                            "IBLOCK_ID" => "3",	// ��� ��������������� �����
                                            "NEWS_COUNT" => "3",	// ���������� �������� �� ��������
                                            "SORT_BY1" => "ACTIVE_FROM",	// ���� ��� ������ ���������� ��������
                                            "SORT_ORDER1" => "DESC",	// ����������� ��� ������ ���������� ��������
                                            "SORT_BY2" => "SORT",	// ���� ��� ������ ���������� ��������
                                            "SORT_ORDER2" => "ASC",	// ����������� ��� ������ ���������� ��������
                                            "FILTER_NAME" => "",	// ������
                                            "FIELD_CODE" => "",	// ����
                                            "PROPERTY_CODE" => "",	// ��������
                                            "CHECK_DATES" => "Y",	// ���������� ������ �������� �� ������ ������ ��������
                                            "DETAIL_URL" => "/about/news/?ELEMENT_ID=#ELEMENT_ID#",	// URL �������� ���������� ��������� (�� ��������� - �� �������� ���������)
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
                                            "PAGER_TITLE" => "�������",	// �������� ���������
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
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="top" style="padding:57px 0 0 0; text-align:center;"><img src="/images/svyaznoy.jpg" width="195" height="216" alt="�������-����" title="�������-����" style="border:1px solid #9B9B9B;" /></td>
                    </tr>
                </table>
            </div>
