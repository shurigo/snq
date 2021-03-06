<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("�����");

	$arFilter = array(
		"IBLOCK_ID" => "4",
		"IBLOCK_ACTIVE" => "Y",
		"ACTIVE_DATE" => "Y",
		"ACTIVE" => "Y",
		"CHECK_PERMISSIONS" => "Y",
		"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"]
	);
	$APPLICATION->IncludeComponent(
		"bitrix:news",
		"actions_active",
		Array(
			"DISPLAY_DATE" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"SEF_MODE" => "Y",
			"AJAX_MODE" => "N",
			"IBLOCK_TYPE" => "actions",
			"IBLOCK_ID" => "4",
			"NEWS_COUNT" => "20",
			"USE_SEARCH" => "N",
			"USE_RSS" => "N",
			"USE_RATING" => "N",
			"USE_CATEGORIES" => "N",
			"USE_REVIEW" => "N",
			"USE_FILTER" => "N",
			"FILTER_NAME" => "arFilter",
			"SORT_BY1" => "SORT",
			"SORT_ORDER1" => "ASC",
			"SORT_BY2" => "ACTIVE_FROM",
			"SORT_ORDER2" => "DESC",
			"CHECK_DATES" => "N",
			"PREVIEW_TRUNCATE_LEN" => "",
			"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
			"LIST_FIELD_CODE" => array(0=>"col_availability",1=>"col_city_id"),
			"LIST_PROPERTY_CODE" => array(0=>"col_availability",1=>"col_city_id"),
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"DISPLAY_NAME" => "Y",
			"META_KEYWORDS" => "-",
			"META_DESCRIPTION" => "-",
			"BROWSER_TITLE" => "-",
			"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
			"DETAIL_FIELD_CODE" => array(0=>"col_availability",1=>"col_city_id"),
			"DETAIL_PROPERTY_CODE" => array(0=>"col_availability",1=>"col_city_id"),
			"DETAIL_DISPLAY_TOP_PAGER" => "N",
			"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
			"DETAIL_PAGER_TITLE" => "�����",
			"DETAIL_PAGER_TEMPLATE" => "",
			"DETAIL_PAGER_SHOW_ALL" => "Y",
			"DISPLAY_PANEL" => "N",
			"SET_TITLE" => "Y",
			"SET_STATUS_404" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"USE_PERMISSIONS" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "3600",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"PAGER_TITLE" => "�����",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => "",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"SEF_FOLDER" => "/actions/",
			"SEF_URL_TEMPLATES" => Array(
				"news" => "",
				"section" => "",
				"detail" => "#ELEMENT_ID#/",
				"search" => "search/",
				"rss" => "rss/",
				"rss_section" => "#SECTION_ID#/rss/"
			),
			"AJAX_OPTION_SHADOW" => "Y",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"VARIABLE_ALIASES" => Array(
				"detail" => Array(),
				"search" => Array(),
				"rss" => Array(),
				"rss_section" => Array(),
				"news" => Array(),
				"section" => Array(),
			)
		)
	);

?>

<!--  AdRiver code START. Type:counter(zeropixel) Site: snowqueen PZ: 0 BN: 0 -->
<script type="text/javascript">
(function(n){
    var l = window.location, a = l.hostname.split('.');
    a.splice(a.length-2, 2);
    window[n] = (a.length ? '/' + a.join('/') : '') + l.pathname + escape(l.search);
})('sz');

var RndNum4NoCash = Math.round(Math.random() * 1000000000);
var ar_Tail='unknown'; if (document.referrer) ar_Tail = escape(document.referrer);
document.write('<img src="' + ('https:' == document.location.protocol ? 'https:' : 'http:') + '//ad.adriver.ru/cgi-bin/rle.cgi?' + 'sid=196960&bt=21&pz=0&sz=' + sz +'&rnd=' + RndNum4NoCash + '&tail256=' + ar_Tail + '" border=0 width=1 height=1>')
</script>
<noscript><img src="//ad.adriver.ru/cgi-bin/rle.cgi?sid=196960&bt=21&pz=0&rnd=2076491944" border=0 width=1 height=1></noscript>
<!--  AdRiver code END  -->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
