<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(!isset($json) || $json=="n"):?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CHARSET;?>" />
<title><?$APPLICATION->ShowTitle()?></title>
<link href="/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/css/jquery.jqzoom.css">
<link rel="stylesheet" type="text/css" href="/css/popup.css">
<link rel="stylesheet" type="text/css" href="/css/lightbox.css">
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<!--[if lte IE 7]><link href="/css/ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
<!--[if lte IE 8]>
<script type="text/javascript" src="/js/PIE.js"></script>
<script type="text/javascript" src="/js/html5support.js"></script>
<![endif]-->
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.9.2.custom.min.js"></script>
<script type='text/javascript' src='/js/jquery.jqzoom-core.js'></script>
<script type="text/javascript" src="/js/jquery.main.js"></script>
<script type="text/javascript" src="/js/popup.js"></script>
<script type="text/javascript" src="/js/ga_social_tracking.js"></script>
<script type="text/javascript" src="/js/set-city.js"></script>
<script type="text/javascript" src="/js/set-discount.js"></script>
<script type="text/javascript" src="/js/get-shops.js"></script>
<script type="text/javascript" src="/js/lightbox.js"></script>
<script type="text/javascript" src="/js/jquery.nyroModal.custom.js"></script>
<script type="text/javascript" src="/js/snowfall.js"></script>
<!--[if IE 6]>
		<script type="text/javascript" src="/js/jquery.nyroModal-ie6.min.js"></script>
<![endif]-->
<link href="/css/nyroModal.css" rel="stylesheet" type="text/css">

<script src="/js/jquery.maskedinput.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $.mask.definitions['~'] = "[+-]";
        $("#phone").mask("(999) 999-9999");

        $("input").blur(function() {
            $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function() {
            $(this).unmask();
        });
    });
</script>
<link rel="stylesheet" type="text/css" href="/css/jquery.simple.accordion.css">
<script type="text/javascript" src="/js/jquery.simple.accordion.js"></script>

<div id="vk_api_transport"></div>
<div id="fb-root"></div>

<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow&amp;subset=latin,cyrillic" rel="stylesheet" type="text/css" />
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<?$APPLICATION->ShowMeta("robots")?>
<?$APPLICATION->ShowMeta("keywords")?>
<?$APPLICATION->ShowMeta("description")?>
<?$APPLICATION->ShowCSS();?>
<?$APPLICATION->ShowHeadStrings()?>
<?$APPLICATION->ShowHeadScripts()?>
<script type="text/javascript">
var _advisorq = _advisorq || [];
 
_advisorq.push({
  _setAccount: {
    endpoint: 'http://api-eu1.advisor.smartfocus.com/ips',
		username: 'snowqpro',
		accid: '611'
  }
});
  
(function() {var s = document.getElementsByTagName('script')[0];var sr = document.createElement('script');sr.type = 'text/javascript';sr.async = true;sr.src = 'http://js.advisor.smartfocus.com/advisor.js'; s.parentNode.insertBefore(sr, s); }());
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-23458231-1', 'auto');
  ga('send', 'pageview');

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
<?endif;?>

