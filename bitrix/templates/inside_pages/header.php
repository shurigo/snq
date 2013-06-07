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
<script type="text/javascript" src="/js/jquery-ui-1.9.2.custom.min.js"></script>
<script type='text/javascript' src='/js/jquery.jqzoom-core.js'></script>
<script type="text/javascript" src="/js/jquery.main.js"></script>
<script type="text/javascript" src="/js/popup.js"></script>
<script type="text/javascript" src="/js/ga_social_tracking.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/set-city.js"></script>
<script type="text/javascript" src="/js/lightbox.js"></script>

<link rel="stylesheet" type="text/css" href="/css/jquery.simple.accordion.css">
<script type="text/javascript" src="/js/jquery.simple.accordion.js"></script>


<script type="text/javascript">
    $(document).ready(function(){

        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });

    });
</script>

<!-- Original VK block

<script type="text/javascript" src="//vk.com/js/api/openapi.js?82"></script>
<script type="text/javascript">
  VK.init({apiId: 3501967, onlyWidgets: true});
</script>
-->

<div id="vk_api_transport"></div>
<script type="text/javascript">
    window.vkAsyncInit = function() {
      VK.init({apiId: 3501967 , onlyWidgets: true});
      VK.Widgets.Like("vk_like", {type: "button", height: 20, width: 200, pageUrl: "http://snowqueen.ru<?=$APPLICATION->GetCurDir()?>"});
      _ga.trackVkontakte();
    };
    setTimeout(function() {
      var el = document.createElement("script");
      el.type = "text/javascript";
      el.src = "http://vkontakte.ru/js/api/openapi.js";
      el.async = true;
      document.getElementById("vk_api_transport").appendChild(el);
    }, 0);
</script>

<div id="fb-root"></div>
<script>
            // Facebook async loading.
            (function() {
              var e = document.createElement('script'); e.async = true;
              e.src = document.location.protocol +
                '//connect.facebook.net/ru_RU/all.js';
              document.getElementById('fb-root').appendChild(e);
            }());
            window.fbAsyncInit = function() {
              FB.init({status: true, cookie: true, xfbml: true});
              _ga.trackFacebook();
            };
</script>

<!-- Twitter -->
<script>
            (function(){
              var twitterWidgets = document.createElement('script');
              twitterWidgets.type = 'text/javascript';
              twitterWidgets.async = true;
              twitterWidgets.src = 'http://platform.twitter.com/widgets.js';

              // Setup a callback to track once the script loads.
              twitterWidgets.onload = _ga.trackTwitter;

              document.getElementsByTagName('head')[0].appendChild(twitterWidgets);
            })();
</script>

<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=latin,cyrillic' rel='stylesheet' type='text/css' />
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<?$APPLICATION->ShowMeta("robots")?>
<?$APPLICATION->ShowMeta("keywords")?>
<?$APPLICATION->ShowMeta("description")?>
<?$APPLICATION->ShowCSS();?>
<?$APPLICATION->ShowHeadStrings()?>
<?$APPLICATION->ShowHeadScripts()?>

<script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-23458231-1']);

    _gaq.push(['_addOrganic', 'images.yandex.ru', 'text', true]);
    _gaq.push(['_addOrganic', 'blogsearch.google.ru', 'q', true]);
    _gaq.push(['_addOrganic', 'blogs.yandex.ru', 'text', true]);
    _gaq.push(['_addOrganic', 'go.mail.ru', 'q']);
    _gaq.push(['_addOrganic', 'nova.rambler.ru', 'query']);
    _gaq.push(['_addOrganic', 'nigma.ru', 's']);
    _gaq.push(['_addOrganic', 'webalta.ru', 'q']);
    _gaq.push(['_addOrganic', 'aport.ru', 'r']);
    _gaq.push(['_addOrganic', 'poisk.ru', 'text']);
    _gaq.push(['_addOrganic', 'km.ru', 'sq']);
    _gaq.push(['_addOrganic', 'liveinternet.ru', 'q']);
    _gaq.push(['_addOrganic', 'quintura.ru', 'request']);
    _gaq.push(['_addOrganic', 'search.qip.ru', 'query']);
    _gaq.push(['_addOrganic', 'gde.ru', 'keywords']);
    _gaq.push(['_addOrganic', 'ru.yahoo.com', 'p']);

	_gaq.push(['_trackPageview']);

	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

</script>

<script type="text/javascript">
function trackOutboundLink(link, category, action) {

try {
_gaq.push(['_trackEvent', category , action]);
} catch(err){}

setTimeout(function() {
document.location.href = link.href;
}, 100);
}
</script>

</head>
<body>
<!-- ORIGINAL FB
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
-->

<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div class="wrapper">
  <div class="container">

    <!-- header -->
    <? include($_SERVER["DOCUMENT_ROOT"]."/inc/header.php"); ?>

    <!-- top menu -->
    <? include($_SERVER["DOCUMENT_ROOT"]."/inc/topmenu.php"); ?>

		<div class="content">
<?endif;?>

