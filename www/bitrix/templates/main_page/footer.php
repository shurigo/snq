<div class="footerMenu">
<div style="border-top:1px solid #cccfd3; height:1px; margin:0 0 10px 0;"></div>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "mainpage_brands", Array(
    "DISPLAY_DATE" => "Y",	// �������� ���� ��������
    "DISPLAY_NAME" => "Y",	// �������� �������� ��������
    "DISPLAY_PICTURE" => "Y",	// �������� ����������� ��� ������
    "DISPLAY_PREVIEW_TEXT" => "Y",	// �������� ����� ������
    "AJAX_MODE" => "N",	// �������� ����� AJAX
    "IBLOCK_TYPE" => "brands",	// ��� ��������������� ����� (������������ ������ ��� ��������)
    "IBLOCK_ID" => "2",	// ��� ��������������� �����
    "NEWS_COUNT" => "1000",	// ���������� �������� �� ��������
    "SORT_BY1" => "ACTIVE_FROM",	// ���� ��� ������ ���������� ��������
    "SORT_ORDER1" => "DESC",	// ����������� ��� ������ ���������� ��������
    "SORT_BY2" => "SORT",	// ���� ��� ������ ���������� ��������
    "SORT_ORDER2" => "ASC",	// ����������� ��� ������ ���������� ��������
    "FILTER_NAME" => "",	// ������
    "FIELD_CODE" => "",	// ����
    "PROPERTY_CODE" => array("brands_carousel"),	// ��������
    "CHECK_DATES" => "Y",	// ���������� ������ �������� �� ������ ������ ��������
    "DETAIL_URL" => "/collection/brands/?BRAND_ID=#ELEMENT_ID#",	// URL �������� ���������� ��������� (�� ��������� - �� �������� ���������)
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
<table>
	<tr>
    	<td>
            <span>������� ������</span><br /><br />
            <a href="/collection/wskincoat/" title="�������� �������">��������</a><br />
            <a href="/collection/wleathertopjacket/" title="������� ������ �������">������� ������</a><br />
            <a href="/collection/wtopjacket/" title="������ �������">������</a><br />
            <a href="/collection/wtopcoat/" title="������ �������">������</a><br />
            <a href="/collection/wtopcloak/" title="����� �������">�����</a><br />
            <a href="/collection/wpaddedcoat/" title="�������� �������">��������</a><br /> 
        </td>
        <td>
            <span>������� ������</span><br /><br />
            <a href="/collection/mskincoat/" title="�������� �������">��������</a><br />
            <a href="/collection/mleathertopjacket/" title="������� ������� ������">������� ������</a><br />
            <a href="/collection/mtopjacket/" title="������� ������">������</a><br />
            <a href="/collection/mtopcoat/" title="������ �������">������</a><br />  
            <a href="/collection/mtopcloak/" title="����� �������">�����</a><br /> 
            <a href="/collection/mpaddedcoat/" title="�������� �������">��������</a><br />
        </td>
        <td>
           <span>���� ����</span><br /><br />
           <a href="/collection/wmink/">�������� ����</a><br />
           <a href="/collection/wfox/">���� �� ����</a><br />
           <a href="/collection/wrabbit/">���� �� �������</a><br />
           <a href="/collection/wfurvest/">������� ������</a><br />
           <a href="/collection/wfurother/">������ ����</a><br />
        </td>

        <noindex>
        <td>
            <span>������� ��������</span><br /><br />
            <a href="/services/" rel="nofollow">������</a><br />
            <a href="/our_shops/" rel="nofollow">���� ��������</a><br />
            <a href="/about/" rel="nofollow">� ��������</a><br />
            <a href="/about/vacancies/" rel="nofollow">��������</a><br />
            <a href="/about/collaboration/" rel="nofollow">��������������</a><br />
            <a href="/actions/" rel="nofollow">�����</a><br />
            <a href="/about/contacts/" rel="nofollow">��������</a><br />
            <a href="http://shop.snq.ru" rel="nofollow">��������-�������</a><br />
        </td>

        <td>
        	<span>��������������� � ���</span><br /><br />
                <div style="margin:10px 0 0 0;"><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="snowqueen.ru" show_faces="false" width="150" font="verdana"></fb:like></div>
                <div style="margin:10px 0 0 0;"><div id="vk_like"></div>
                <script type="text/javascript">
                VK.Widgets.Like("vk_like", {type: "button"});
                </script></div>
           
            <div style="margin:20px 0 0 0;">
                <table style="width:auto;">
                    <tr>
                        <td style="width:7px;"><img src="/images/download_catalog/left_red.png" width="7" height="23" /></td>
                        <td style="width:auto; vertical-align:middle; height:23px; background:url(/images/download_catalog/bg_red.png) repeat-x; font-size:10px; white-space:nowrap;"><a href="/unsubscribe/" style="color:#ffffff;"><strong>����� �� SMS ��������</strong></a></td>
                        <td style="width:7px;"><img src="/images/download_catalog/right_red.png" width="7" height="23" /></td>
                        <td style="padding:0 0 0 3px; width:25px;"><a href="/unsubscribe/"><img src="/images/arrows/red_right.png" width="25" height="23" /></a></td>
                    </tr>
                </table>
            </div>
        </td>
       </noindex>

    </tr>
</table>
<table>
    <tr>
    	<td>&copy; 2010-2012 ������� ��������</td>
        <td><a href="/sitemap/">����� �����</a></td>
        <td>(495) <strong>777-8-999</strong></td>
        <td><noindex><!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='http://counter.yadro.ru/hit?t25.11;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: �������� ����� ����������� ��"+
" �������' "+
"border='0' width='88' height='15'><\/a>")
//--></script><!--/LiveInternet--></noindex></td>
    </tr>
</table>
</div>

</div>
</div>
<noindex>
<script type="text/javascript">
	
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-23458231-1']);
	_gaq.push(['_trackPageview']);
	
	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter7080487 = new Ya.Metrika({id:7080487,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/7080487" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</noindex>
</body>
</html>