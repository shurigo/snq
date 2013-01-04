<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CHARSET;?>" />
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<?$APPLICATION->ShowMeta("robots")?>
<?$APPLICATION->ShowMeta("keywords")?>
<?$APPLICATION->ShowMeta("description")?>
<title><?$APPLICATION->ShowTitle()?></title>
<?$APPLICATION->ShowCSS();?>
<?$APPLICATION->ShowHeadStrings()?>
<?$APPLICATION->ShowHeadScripts()?>
<script type="text/javascript" src="/js/jquery-1.7.1.min.js?1316110186"></script>
<script type="text/javascript" src="/js/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="/js/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="/js/jquery.ui.rcarousel.min.js"></script>
<script type="text/javascript" src="/js/jquery.jqzoom-core.js"></script>
<link rel="stylesheet" href="/js/jquery.jqzoom.css" type="text/css" />
<link rel="stylesheet" href="/js/rcarousel.css" type="text/css" />
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div id="container">
<div class="mainContent">
<div id="topLogoDiv"><a href="/"><img src="/images/logo_aw1213.png" width="200" height="41" alt="Снежная Королева" /></a></div>
<div id="topPhoneDiv"><span id="topPhonePrefix">8 (800)</span> <span id="topPhone">777-8-999</span></div>
<div class="clear_both"></div>

<? $APPLICATION->IncludeFile("/bitrix/templates/main_page/include_areas/mainmenu.html", array(), array("MODE"=>"html"));?>

<div style="float:left;">
<?
if (strpos($APPLICATION->GetCurDir(), "collection") && $APPLICATION->GetCurDir() != "/collection/search/")
{
	$start_from = 1;
}
else
{
	$start_from = 0;
}
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
</div>
<div id="searchFormMainPage" style="position:relative; float:right;<?=($APPLICATION->GetCurDir() == "/collection/search/")?" display:none;":" display:block;";?> width:200px; margin:20px 45px 0 0;">
    <form action="/collection/search/" method="get" name="search_form">
        <div style="float:left;"><input type="text" name="q" value="Поиск" style="background:url(/images/search_field.png) no-repeat; border:0; padding:0 2px; font-size:11px; font-style:italic; color:#757575; height:23px; width:168px;" onfocus="if(this.value=='Поиск') {this.value=''; this.style.color='#202020';}" onblur="if(!this.value) {this.value='Поиск'; this.style.color='#757575';}" /></div>
        <div style="float:left; padding:0 0 0 3px;"><input type="submit" name="submit" value="" style="background:url(/images/arrows/blue_right.png) no-repeat; border:0; width:25px; height:23px;" /></div>
    </form>
</div>
<div class="clear_both"></div>