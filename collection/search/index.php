<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("����� �������");
?><div style="margin:10px 45px 45px;">
<h1>����� ������� ������</h1>
<table style="width:100%;">
	<tr>
    	<td style="width:206px; vertical-align:top; padding:20px 0 0 0;">
        	<h3 style="margin:10px 0 0 0;">��������� �������</h3>
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
            );?>
        </td>
        <td style="width:auto; vertical-align:top; padding:23px 0 0 23px;">
          <?$APPLICATION->IncludeComponent("custom:search.page", "search", Array(
            "USE_SUGGEST" => "N",	// ���������� ��������� � ���������� �������
            "AJAX_MODE" => "N",	// �������� ����� AJAX
            "RESTART" => "Y",	// ������ ��� ����� ���������� (��� ���������� ���������� ������)
            "CHECK_DATES" => "Y",	// ������ ������ � �������� �� ���� ����������
            "USE_TITLE_RANK" => "Y",	// ��� ������������ ���������� ��������� ���������
            "DEFAULT_SORT" => "rank",	// ���������� �� ���������
            "arrFILTER" => array(	// ����������� ������� ������
                0 => "iblock_collection",
            ),
            "SHOW_WHERE" => "N",	// ���������� ���������� ������ "��� ������"
            "SHOW_WHEN" => "N",	// ���������� ������ �� �����
            "PAGE_RESULT_COUNT" => "30",	// ���������� ����������� �� ��������
            "CACHE_TYPE" => "A",	// ��� �����������
            "CACHE_TIME" => "3600",	// ����� ����������� (���.)
            "CACHE_NOTES" => "",
            "DISPLAY_TOP_PAGER" => "Y",	// �������� ��� ������������
            "DISPLAY_BOTTOM_PAGER" => "Y",	// �������� ��� ������������
            "PAGER_TITLE" => "���������� ������",	// �������� ����������� ������
            "PAGER_SHOW_ALWAYS" => "N",	// �������� ������
            "PAGER_TEMPLATE" => "",	// �������� �������
            "arrFILTER_iblock_collection" => array(	// ������ � �������������� ������ ���� "[iblock_collection] ���������"
                0 => "1",
            ),
            "AJAX_OPTION_SHADOW" => "Y",	// �������� ���������
            "AJAX_OPTION_JUMP" => "Y",	// �������� ��������� � ������ ����������
            "AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
            "AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
            "AJAX_OPTION_ADDITIONAL" => "",	// �������������� �������������
            ),
            false
        );?></td> </tr>
  </table>
 </div> <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>