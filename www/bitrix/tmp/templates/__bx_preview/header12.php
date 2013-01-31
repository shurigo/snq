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
<script type="text/javascript">

/******************************************
* Snow Effect Script- By Altan d.o.o. (http://www.altan.hr/snow/index.html)
* Visit Dynamic Drive DHTML code library (http://www.dynamicdrive.com/) for full source code
* Last updated Nov 9th, 05' by DD. This notice must stay intact for use
******************************************/
  
  //Configure below to change URL path to the snow image
  var snowsrc="/images/snow.gif"
  // Configure below to change number of snow to render
  var no = 10;
  // Configure whether snow should disappear after x seconds (0=never):
  var hidesnowtime = 0;
  // Configure how much snow should drop down before fading ("windowheight" or "pageheight")
  var snowdistance = "windowheight";

///////////Stop Config//////////////////////////////////

  var ie4up = (document.all) ? 1 : 0;
  var ns6up = (document.getElementById&&!document.all) ? 1 : 0;

    function iecompattest(){
    return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
    }

  var dx, xp, yp;    // coordinate and position variables
  var am, stx, sty;  // amplitude and step variables
  var i, doc_width = 800, doc_height = 600;
  
  if (ns6up) {
    doc_width = self.innerWidth;
    doc_height = self.innerHeight;
  } else if (ie4up) {
    doc_width = iecompattest().clientWidth;
    doc_height = iecompattest().clientHeight;
  }

  dx = new Array();
  xp = new Array();
  yp = new Array();
  am = new Array();
  stx = new Array();
  sty = new Array();
  for (i = 0; i < no; ++ i) {  
    dx[i] = 0;                        // set coordinate variables
    xp[i] = Math.random()*(doc_width-50);  // set position variables
    yp[i] = Math.random()*doc_height;
    am[i] = Math.random()*20;         // set amplitude variables
    stx[i] = 0.02 + Math.random()/10; // set step variables
    sty[i] = 0.7 + Math.random();     // set step variables
        if (ie4up||ns6up) {
      if (i == 0) {
        document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: 100; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+snowsrc+"' border=\"0\"><\/div>");
      } else {
        document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: 100; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+snowsrc+"' border=\"0\"><\/div>");
      }
    }
  }

  function snowIE_NS6() {  // IE and NS6 main animation function
    doc_width = ns6up?window.innerWidth-10 : iecompattest().clientWidth-10;
        doc_height=(window.innerHeight && snowdistance=="windowheight")? window.innerHeight : (ie4up && snowdistance=="windowheight")?  iecompattest().clientHeight : (ie4up && !window.opera && snowdistance=="pageheight")? iecompattest().scrollHeight : iecompattest().offsetHeight;
    for (i = 0; i < no; ++ i) {  // iterate for every dot
      yp[i] += sty[i];
      if (yp[i] > doc_height-50) {
        xp[i] = Math.random()*(doc_width-am[i]-30);
        yp[i] = 0;
        stx[i] = 0.02 + Math.random()/10;
        sty[i] = 0.7 + Math.random();
      }
      dx[i] += stx[i];
      document.getElementById("dot"+i).style.top=yp[i]+"px";
      document.getElementById("dot"+i).style.left=xp[i] + am[i]*Math.sin(dx[i])+"px";  
    }
    snowtimer=setTimeout("snowIE_NS6()", 10);
  }

    function hidesnow(){
        if (window.snowtimer) clearTimeout(snowtimer)
        for (i=0; i<no; i++) document.getElementById("dot"+i).style.visibility="hidden"
    }
        

if (ie4up||ns6up){
    snowIE_NS6();
        if (hidesnowtime>0)
        setTimeout("hidesnow()", hidesnowtime*1000)
        }

</script>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<table style="width:100%;">
	<tr>
    	<td style="width:50%;"></td>
        <td style="width:980px;">
        	<div style="width:980px;">
            	<table style="width:980px;">
                	<tr>
                    	<td style="padding:10px 0 0 0; width:300px;" valign="top"><img src="/images/logo.jpg" width="300" alt="������� ��������" title="������� ��������" /></td>
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
                                	<td style="padding:20px 0 0 0;">
										<table style="width:100%;">
                                        	<tr>
                                            	<td style="text-align:left; padding:0 0 0 95px;"><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="snowqueen.ru" show_faces="false" width="150" font="verdana"></fb:like></td>
                                                <td style="text-align:right;"><span style="font-size:14px;">(495)</span><span style="font-size:24px; color:#00244f;">777-8-999</span></td>
                                            </tr>
                                        </table>
                                    </td>
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
                            <div style="margin:15px 0 0 0;"><a href="/about/news/?ELEMENT_ID=1039"><img src="/images/mainpage_blocks/skazki.jpg" width="199" height="150" alt="���������� ������ ����� �������� ������ � �������� �������� �������� ������������������ ��������� 2011�" title="���������� ������ ����� �������� ������ � �������� �������� �������� ������������������ ��������� 2011�" /></a></div>
                            <div style="margin:15px 0 0 0;"><img src="/images/mainpage_blocks/fitting_room.jpg" width="199" height="150" alt="����������� ����������� ����� �� ����� �����" title="����������� ����������� ����� �� ����� �����" /></div>
                        </td>
                        <td style="padding:0 16px;" valign="top"><div><img src="/images/mainpage_blocks/style.jpg" width="512" height="56" /></div><div>
							<script type="text/javascript" src="/swfobject/swfobject.js"></script>
                            <script type="text/javascript">
                    
                                    var attributes = {id:"Rotator", name:"Rotator"};
                                    var flashvars = {};
                    
                            swfobject.embedSWF("/picrotate_512x424.swf", "flashCont", 512, 424, "10", "/swfobject/expressinstall.swf", flashvars, {menu: 'false'}, attributes);
                    
                            </script>
                            <style>
                            #flashCont {
                                width: 100%;
                                height: 100%;
                            }
                            </style>
                            <div id="flashCont">
                                <img src="/images/mainpagebanpics/nyimage1.jpg" width="512" height="424" />
                            </div>
                      </div></td>
                        <td style="width:237px;" valign="top">
                        	<div><a href="/actions/1054/"><img src="/images/mainpage_blocks/sale70.jpg" width="237" height="480" alt="� �������� �������Ż ������ - 70% �� ���!" title="� �������� �������Ż ������ - 70% �� ���!" /></a></div>
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
