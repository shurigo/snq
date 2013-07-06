        </div>
		<!-- end .content-->
		<div class="footer-place"></div>
		</div>
  <!-- end .container-->
</div>
<!-- end .wrapper-->
<footer class="footer">
  <div class="bg">

    <? include($_SERVER["DOCUMENT_ROOT"]."/inc/downmenu.php"); ?>

    <div class="fr">© 2010-<?=date("Y")?> Снежная Королева</div>
    <ul class="socials">
          <li> </li>
          <li><a class="vk" href="http://vk.com/likeaqueen" rel="nofollow" target="_blank">Вконтакте</a></li>
          <li><a class="fb" href="https://facebook.com/likeaqueenru" rel="nofollow" target="_blank">Facebook</a></li>
          <li><a class="tw" href="https://twitter.com/LikeAQueenBlog" rel="nofollow" target="_blank">Twitter</a></li>
          <li><a class="ok" href="http://www.odnoklassniki.ru/group/51951031353532" rel="nofollow" target="_blank">Одноклассники</a></li>
          <li><a class="ig" href="http://instagram.com/likeaqueenblog" rel="nofollow" target="_blank">Instagram</a></li>
        </ul>
    <!-- end .fr-->
  </div>
</footer>
<!-- end .footer-->

<!--LiveInternet counter-->
<script type="text/javascript">
<!--
/*document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='http://counter.yadro.ru/hit?t25.11;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число посетителей за"+
" сегодня' "+
"border='0' width='88' height='15'><\/a>")*/
//-->
</script><!--/LiveInternet-->

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

  // Facebook async loading.
  (function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/ru_RU/all.js';
    $('#fb-root').append(e);
  }());
  window.fbAsyncInit = function() {
    FB.init({status: true, cookie: true, xfbml: true});
    _ga.trackFacebook();
	};

	// Twitter
  (function(){
    var twitterWidgets = document.createElement('script');
    twitterWidgets.type = 'text/javascript';
    twitterWidgets.async = true;
    twitterWidgets.src = 'http://platform.twitter.com/widgets.js';

    // Setup a callback to track once the script loads.
    twitterWidgets.onload = _ga.trackTwitter;

    $('head:first').append(twitterWidgets);
  })();

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
		$("#vk_api_transport").append(el);
	}, 0);

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

	function trackOutboundLink(link, category, action) {
		try {
			_gaq.push(['_trackEvent', category , action]);
		} catch(err){}

		setTimeout(function() {
			document.location.href = link.href;
		}, 100);
	}
</script>
<noscript><div><img src="//mc.yandex.ru/watch/7080487" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<!--  Realtime Targeting tracker - httpool Yuri begin -->
<script type="text/javascript">
var _agTrack = _agTrack || [];
_agTrack.push({ cid:"D40GD" });
(function(d) { try {
    var scr = d.getElementsByTagName("script")[0], f = d.createElement('iframe');
    f.src = "javascript:''"; f.style.display = "none"; scr.parentNode.insertBefore(f, scr); f.contentWindow.name = "ag:scrf";
    var d2 = f.contentWindow.document,fn='write';
    d2.open()[fn]("<body onload=\"var d=document,s=d.createElement('script');s.id='ag:trackscript.1';s.src='//track.idtargeting.com/D40GD/track.js';d.body.appendChild(s);\">");
    d2.close();
}catch(e){}})(document);
</script>
<!-- Realtime Targeting tracker - httpool Yuri end -->

</body>
</html>
