<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("��������� ����� �������� ��������");
?>
<div style="margin:10px 45px 45px;">
<h1>��������� ����� �������� ��������</h1>
<table style="width:100%;">
	<tr>
    	<td style="width:206px; vertical-align:top;"><h3 style="margin:10px 0 0 0;">��������� �������</h3>
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "mainpage_news",
            Array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "AJAX_MODE" => "N",
                "IBLOCK_TYPE" => "news",
                "IBLOCK_ID" => "3",
                "NEWS_COUNT" => "3",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FILTER_NAME" => "",
                "FIELD_CODE" => "",
                "PROPERTY_CODE" => "",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "/about/news/?ELEMENT_ID=#ELEMENT_ID#",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "DISPLAY_PANEL" => "N",
                "SET_TITLE" => "N",
                "SET_STATUS_404" => "Y",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "3600",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_TITLE" => "�������",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => "",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "AJAX_OPTION_SHADOW" => "Y",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N"
            )
        );?></td>
        <td style="width:auto; vertical-align:top; padding:0 0 0 23px;">
            <a href="http://www.rusfinancebank.ru/ru/kreditnaja-karta-snezhnaja-koroleva.html" target="_blank"><img src="/images/card_snowqueen.jpg" width="237" height="149" alt="��������� ����� �������� ��������" title="��������� ����� �������� ��������" style="margin: 0pt 0 10px 10px;" align="right" /></a>
            <p>��� ���� ����� ������� ���������� ��������� �������� �� ���� ����������, �������� �������� ��������� � ��������� ���� ������� ����� ��������� �����, ������� �� ������ �������� � 15 ������ 2011 �.
            <p>������ ����� �������� <a href="http://www.rusfinancebank.ru/ru/eto-vygodno.html" target="_blank">����� �������������� ��������� ����� ��������� �����</a>, � ����� �������� ��� �������� �������������� ������ 5% �� ������� � ���� ��������� �������� ��������. 
            <p>
            <ul>
                <li>������ ������ ����������� � ������� ��������, � ����� ���������������� �� ����� �� ������� ��� �����, ������� ��������� �� ����������� ����. 
                <li>����������� ������������� � ��������� ���� �������� �������� � ������ � ���������� �������. 
                <li>�������� ����� �������� ��������  �� ������ <a href="http://www.rusfinancebank.ru/ru/kak-poluchit-kreditnuju-kartu.html" target="_blank">� 1-� ��������</a> � ���� ��������� � ������ � ���������� �������.
            </ul>
            <p><a href="http://www.rusfinancebank.ru/ru/kreditnaja-karta-snezhnaja-koroleva.html" target="_blank">���������</a>
        </td>
	</tr>
</table>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>