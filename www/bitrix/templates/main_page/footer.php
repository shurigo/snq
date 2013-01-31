<div class="footerMenu">
<div style="border-top:1px solid #cccfd3; height:1px; margin:0 0 10px 0;"></div>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "mainpage_brands", Array(
    "DISPLAY_DATE" => "Y",	// Выводить дату элемента
    "DISPLAY_NAME" => "Y",	// Выводить название элемента
    "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
    "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
    "AJAX_MODE" => "N",	// Включить режим AJAX
    "IBLOCK_TYPE" => "brands",	// Тип информационного блока (используется только для проверки)
    "IBLOCK_ID" => "2",	// Код информационного блока
    "NEWS_COUNT" => "1000",	// Количество новостей на странице
    "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
    "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
    "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
    "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
    "FILTER_NAME" => "",	// Фильтр
    "FIELD_CODE" => "",	// Поля
    "PROPERTY_CODE" => array("brands_carousel"),	// Свойства
    "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
    "DETAIL_URL" => "/collection/brands/?BRAND_ID=#ELEMENT_ID#",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
    "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
    "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
    "DISPLAY_PANEL" => "N",	// Добавлять в админ. панель кнопки для данного компонента
    "SET_TITLE" => "N",	// Устанавливать заголовок страницы
    "SET_STATUS_404" => "Y",	// Устанавливать статус 404, если не найдены элемент или раздел
    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
    "ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
    "PARENT_SECTION" => "",	// ID раздела
    "PARENT_SECTION_CODE" => "",	// Код раздела
    "CACHE_TYPE" => "A",	// Тип кеширования
    "CACHE_TIME" => "3600",	// Время кеширования (сек.)
    "CACHE_FILTER" => "N",	// Кэшировать при установленном фильтре
    "CACHE_GROUPS" => "Y",	// Учитывать права доступа
    "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
    "DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
    "PAGER_TITLE" => "Новости",	// Название категорий
    "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
    "PAGER_TEMPLATE" => "",	// Название шаблона
    "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
    "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
    "AJAX_OPTION_SHADOW" => "Y",	// Включить затенение
    "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
    "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
    "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
    ),
    false
);?>
<table>
	<tr>
    	<td>
            <span>Женская одежда</span><br /><br />
            <a href="/collection/wskincoat/" title="дубленки женские">Дубленки</a><br />
            <a href="/collection/wleathertopjacket/" title="кожаные куртки женские">Кожаные куртки</a><br />
            <a href="/collection/wtopjacket/" title="куртки женские">Куртки</a><br />
            <a href="/collection/wtopcoat/" title="пальто женское">Пальто</a><br />
            <a href="/collection/wtopcloak/" title="плащи женские">Плащи</a><br />
            <a href="/collection/wpaddedcoat/" title="пуховики женские">Пуховики</a><br /> 
        </td>
        <td>
            <span>Мужская Одежда</span><br /><br />
            <a href="/collection/mskincoat/" title="дубленки мужские">Дубленки</a><br />
            <a href="/collection/mleathertopjacket/" title="мужские кожаные куртки">Кожаные куртки</a><br />
            <a href="/collection/mtopjacket/" title="мужские куртки">Куртки</a><br />
            <a href="/collection/mtopcoat/" title="пальто мужское">Пальто</a><br />  
            <a href="/collection/mtopcloak/" title="плащи мужские">Плащи</a><br /> 
            <a href="/collection/mpaddedcoat/" title="пуховики мужские">Пуховики</a><br />
        </td>
        <td>
           <span>Шубы Меха</span><br /><br />
           <a href="/collection/wmink/">Норковые шубы</a><br />
           <a href="/collection/wfox/">Шубы из лисы</a><br />
           <a href="/collection/wrabbit/">Шубы из кролика</a><br />
           <a href="/collection/wfurvest/">Меховые жилеты</a><br />
           <a href="/collection/wfurother/">Другие меха</a><br />
        </td>

        <noindex>
        <td>
            <span>Снежная Королева</span><br /><br />
            <a href="/services/" rel="nofollow">Услуги</a><br />
            <a href="/our_shops/" rel="nofollow">Наши магазины</a><br />
            <a href="/about/" rel="nofollow">О компании</a><br />
            <a href="/about/vacancies/" rel="nofollow">Вакансии</a><br />
            <a href="/about/collaboration/" rel="nofollow">Сотрудничество</a><br />
            <a href="/actions/" rel="nofollow">Акции</a><br />
            <a href="/about/contacts/" rel="nofollow">Контакты</a><br />
            <a href="http://shop.snq.ru" rel="nofollow">Интернет-магазин</a><br />
        </td>

        <td>
        	<span>Присоединяйтесь к нам</span><br /><br />
                <div style="margin:10px 0 0 0;"><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="snowqueen.ru" show_faces="false" width="150" font="verdana"></fb:like></div>
                <div style="margin:10px 0 0 0;"><div id="vk_like"></div>
                <script type="text/javascript">
                VK.Widgets.Like("vk_like", {type: "button"});
                </script></div>
           
            <div style="margin:20px 0 0 0;">
                <table style="width:auto;">
                    <tr>
                        <td style="width:7px;"><img src="/images/download_catalog/left_red.png" width="7" height="23" /></td>
                        <td style="width:auto; vertical-align:middle; height:23px; background:url(/images/download_catalog/bg_red.png) repeat-x; font-size:10px; white-space:nowrap;"><a href="/unsubscribe/" style="color:#ffffff;"><strong>Отказ от SMS рассылки</strong></a></td>
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
    	<td>&copy; 2010-2012 Снежная королева</td>
        <td><a href="/sitemap/">Карта сайта</a></td>
        <td>(495) <strong>777-8-999</strong></td>
        <td><noindex><!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='http://counter.yadro.ru/hit?t25.11;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число посетителей за"+
" сегодня' "+
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