<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<?$APPLICATION->ShowMeta("robots")?>
<?$APPLICATION->ShowMeta("keywords")?>
<?$APPLICATION->ShowMeta("description")?>
<title>«Снежная Королева» - Сеть мультибрендовых магазинов модной одежды.  Шубы, дубленки, кожаные куртки, пальто, модная одежда и аксессуары.</title>
<meta name="keywords" content="норковые шубы, дубленки, кожаные куртки, пальто, плащи, пуховики, меховые жилеты, одежда, сумки, аксессуары, скидки, шубы из кролика" />
<meta name="description" content="Шубы, дубленки, кожаные куртки, пальто, модная одежда и аксессуары в «Снежной Королеве». Хотите купить норковую шубу, меховой жилет или кожаную куртку, но не знаете как выбрать? Приходите в наши магазины и воспользуйтесь лучшей ценой и качеством." />
<?$APPLICATION->ShowCSS();?>
<?$APPLICATION->ShowHeadStrings()?>
<?$APPLICATION->ShowHeadScripts()?>
<link href="/css/style.css" rel="stylesheet" type="text/css">
<!--[if lte IE 7]><link href="/css/ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
<!--[if lte IE 8]>
<script type="text/javascript" src="/js/PIE.js"></script>
<script type="text/javascript" src="/js/html5support.js"></script>
<![endif]-->
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.9.2.custom.min.js"></script>
<script type='text/javascript' src='/js/jquery.jqzoom-core.js'></script>
<script type="text/javascript" src="/js/jquery.main.js"></script>
<script type="text/javascript" src="/js/set-city.js"></script>
<script type="text/javascript" src="/js/snowfall.js"></script>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=latin,cyrillic' rel='stylesheet' type='text/css' />

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

     <!-- actions -->
     <?

    $myFilter = array(
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"IBLOCK_LID" => SITE_ID,
			"IBLOCK_ACTIVE" => "Y",
			"ACTIVE_DATE" => "Y",
			"ACTIVE" => "Y",
			"CHECK_PERMISSIONS" => "Y",
			"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"]
   	);

	$APPLICATION->IncludeComponent("bitrix:catalog.section", "mainpage_actions", Array (
    "DISPLAY_DATE" => "Y",	// Выводить дату элемента
    "DISPLAY_NAME" => "Y",	// Выводить название элемента
    "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
    "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
    "AJAX_MODE" => "N",	// Включить режим AJAX
    "IBLOCK_TYPE" => "actions",	// Тип информационного блока (используется только для проверки)
    "IBLOCK_ID" => "4",	// Код информационного блока
    "NEWS_COUNT" => "1000",	// Количество новостей на странице
    "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
    "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
    "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
    "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
    "FILTER_NAME" => "myFilter",	// Фильтр
    "FIELD_CODE" => "",	// Поля
    "PROPERTY_CODE" => array(0=>"col_availability",1=>"col_city_id"),	// Свойства "actions_carousel"
    "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
    "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
    "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
    "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
    "DETAIL_PROPERTY_CODE" => array(0=>"col_availability",1=>"col_city_id"),
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
    "PAGER_TITLE" => "Акции",	// Название категорий
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


     <!-- end actions -->


     <div class="social-hold">
        <ul class="socials">
          <li>Оставайтесь с нами</li>
          <li><a class="vk" href="http://vk.com/likeaqueen" rel="nofollow" target="_blank">Вконтакте</a></li>
          <li><a class="fb" href="https://facebook.com/likeaqueenru" rel="nofollow" target="_blank">Facebook</a></li>
          <li><a class="tw" href="https://twitter.com/LikeAQueenBlog" rel="nofollow" target="_blank">Twitter</a></li>
          <li><a class="ok" href="http://www.odnoklassniki.ru/group/51951031353532" rel="nofollow" target="_blank">Одноклассники</a></li>
          <li><a class="ig" href="http://instagram.com/likeaqueenblog" rel="nofollow" target="_blank">Instagram</a></li>
        </ul>
        <!-- end .socials-->
     <?
     $APPLICATION->IncludeComponent("custom:subscribe.form","",Array(
		"AJAX_MODE" => "N",
		"SHOW_HIDDEN" => "Y",
		"ALLOW_ANONYMOUS" => "Y",
		"SHOW_AUTH_LINKS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"SET_TITLE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N"
	));
	?>
      </div>

      <!-- end .social-hold-->


      <ul class="info-links">
        <li><a href="http://shop.snq.ru/" target="_blank" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'shop.snq.ru - big_image_main_page'); return false;"><img src="/images/img1.jpg" width="321" height="274" alt=" "><span class="text1">Интернет-магазин</span></a></li>
        <li><a href="http://likeaqueen.ru/" target="_blank" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'likeaqueen.ru - big_image_main_page'); return false;"><img src="/images/img2.jpg" width="321" height="274" alt=""><span class="text1">Блог о моде</span></a></li>
        <li>
                  	<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "mainpage_hot_model", Array(
                    "AJAX_MODE" => "N",	// Включить режим AJAX
                    "IBLOCK_TYPE" => "collection",	// Тип инфо-блока
                    "IBLOCK_ID" => "1",	// Инфо-блок
                    "SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
                    "SECTION_CODE" => "",	// Код раздела
                    "ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
                    "ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
                    "FILTER_NAME" => "arrFilter",	// Имя массива со значениями фильтра для фильтрации элементов
                    "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
                    "SHOW_ALL_WO_SECTION" => "Y",	// Показывать все элементы, если не указан раздел
                    "SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
                    "DETAIL_URL" => "/collection/#SECTION_CODE#/#ELEMENT_ID#/",	// URL, ведущий на страницу с содержимым элемента раздела
                    "BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
                    "ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
                    "PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
                    "PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
                    "PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
                    "SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
                    "META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
                    "META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
                    "BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
                    "DISPLAY_PANEL" => "N",	// Добавлять в админ. панель кнопки для данного компонента
                    "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
                    "DISPLAY_COMPARE" => "N",	// Выводить кнопку сравнения
                    "SET_TITLE" => "N",	// Устанавливать заголовок страницы
                    "SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
                    "PAGE_ELEMENT_COUNT" => "1",	// Количество элементов на странице
                    "LINE_ELEMENT_COUNT" => "1",	// Количество элементов выводимых в одной строке таблицы
                    "PROPERTY_CODE" => array(	// Свойства
                        0 => "col_hot_model",
                        1 => "col_model_code",
                        2 => "col_price",
                        3 => "col_brand",
                        4 => "col_price_origin",
                    ),
                    "PRICE_CODE" => "",	// Тип цены
                    "USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
                    "SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
                    "PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
                    "PRODUCT_PROPERTIES" => "",	// Характеристики товара
                    "USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
                    "CACHE_TYPE" => "A",	// Тип кеширования
                    "CACHE_TIME" => "3600",	// Время кеширования (сек.)
                    "CACHE_FILTER" => "N",	// Кэшировать при установленном фильтре
                    "CACHE_GROUPS" => "Y",	// Учитывать права доступа
                    "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
                    "DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
                    "PAGER_TITLE" => "Товары",	// Название категорий
                    "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
                    "PAGER_TEMPLATE" => "",	// Название шаблона
                    "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
                    "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
                    "AJAX_OPTION_SHADOW" => "Y",	// Включить затенение
                    "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
                    "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
                    "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера

                    "SHOW_HOT_MODEL" => "Y" //Кастомизация: если "Y", то показываем все модели у которых стоит галочка "Вещь недели"
                    ),
                    false
                );?>
        </li>
      </ul>
      <!-- end .info-links-->

      <br>
      <hr class="hr_red">
      <ul class="info-links2">
        <li><a href="/upload/SNQ_AW_1314_catalog.pdf" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'catalog'); return false;"><img src="/images/catalog_fw201314.jpg" alt="" border="0"></a></li>
        <li><iframe width="495" height="275" frameborder="0" src="//www.youtube.com/embed/sCOt2r1jcT8" allowfullscreen=""></iframe></li>
      </ul>

      <!-- end .info-links 2-->

    </div>
    <!-- end .content-->
    <div class="footer-place"></div>
  </div>
  <!-- end .container-->
</div>
<!-- end .wrapper-->
=======
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<?$APPLICATION->ShowMeta("robots")?>
<?$APPLICATION->ShowMeta("keywords")?>
<?$APPLICATION->ShowMeta("description")?>
<title>«Снежная Королева» - Сеть мультибрендовых магазинов модной одежды.  Шубы, дубленки, кожаные куртки, пальто, модная одежда и аксессуары.</title>
<meta name="keywords" content="норковые шубы, дубленки, кожаные куртки, пальто, плащи, пуховики, меховые жилеты, одежда, сумки, аксессуары, скидки, шубы из кролика" />
<meta name="description" content="Шубы, дубленки, кожаные куртки, пальто, модная одежда и аксессуары в «Снежной Королеве». Хотите купить норковую шубу, меховой жилет или кожаную куртку, но не знаете как выбрать? Приходите в наши магазины и воспользуйтесь лучшей ценой и качеством." />
<?$APPLICATION->ShowCSS();?>
<?$APPLICATION->ShowHeadStrings()?>
<?$APPLICATION->ShowHeadScripts()?>
<link href="/css/style.css" rel="stylesheet" type="text/css">
<!--[if lte IE 7]><link href="/css/ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
<!--[if lte IE 8]>
<script type="text/javascript" src="/js/PIE.js"></script>
<script type="text/javascript" src="/js/html5support.js"></script>
<![endif]-->
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.9.2.custom.min.js"></script>
<script type='text/javascript' src='/js/jquery.jqzoom-core.js'></script>
<script type="text/javascript" src="/js/jquery.main.js"></script>
<script type="text/javascript" src="/js/set-city.js"></script>
<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow&amp;subset=latin,cyrillic" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery.nyroModal.custom.js"></script>
<!--[if IE 6]>
		<script type="text/javascript" src="/js/jquery.nyroModal-ie6.min.js"></script>
<![endif]-->
<link href="/css/nyroModal.css" rel="stylesheet" type="text/css">
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

     <!-- actions -->
     <?

    $myFilter = array(
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"IBLOCK_LID" => SITE_ID,
			"IBLOCK_ACTIVE" => "Y",
			"ACTIVE_DATE" => "Y",
			"ACTIVE" => "Y",
			"CHECK_PERMISSIONS" => "Y",
			"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"]
   	);

	$APPLICATION->IncludeComponent("bitrix:catalog.section", "mainpage_actions", Array (
    "DISPLAY_DATE" => "Y",	// Выводить дату элемента
    "DISPLAY_NAME" => "Y",	// Выводить название элемента
    "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
    "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
    "AJAX_MODE" => "N",	// Включить режим AJAX
    "IBLOCK_TYPE" => "actions",	// Тип информационного блока (используется только для проверки)
    "IBLOCK_ID" => "4",	// Код информационного блока
    "NEWS_COUNT" => "1000",	// Количество новостей на странице
    "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
    "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
    "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
    "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
    "FILTER_NAME" => "myFilter",	// Фильтр
    "FIELD_CODE" => "",	// Поля
    "PROPERTY_CODE" => array(0=>"col_availability",1=>"col_city_id"),	// Свойства "actions_carousel"
    "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
    "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
    "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
    "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
    "DETAIL_PROPERTY_CODE" => array(0=>"col_availability",1=>"col_city_id"),
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
    "PAGER_TITLE" => "Акции",	// Название категорий
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


     <!-- end actions -->


     <div class="social-hold">
        <ul class="socials">
          <li>Оставайтесь с нами</li>
          <li><a class="vk" href="http://vk.com/likeaqueen" rel="nofollow" target="_blank">Вконтакте</a></li>
          <li><a class="fb" href="https://facebook.com/likeaqueenru" rel="nofollow" target="_blank">Facebook</a></li>
          <li><a class="tw" href="https://twitter.com/LikeAQueenBlog" rel="nofollow" target="_blank">Twitter</a></li>
          <li><a class="ok" href="http://www.odnoklassniki.ru/group/51951031353532" rel="nofollow" target="_blank">Одноклассники</a></li>
          <li><a class="ig" href="http://instagram.com/likeaqueenblog" rel="nofollow" target="_blank">Instagram</a></li>
        </ul>
        <!-- end .socials-->
     <?
     $APPLICATION->IncludeComponent("custom:subscribe.form","",Array(
		"AJAX_MODE" => "N",
		"SHOW_HIDDEN" => "Y",
		"ALLOW_ANONYMOUS" => "Y",
		"SHOW_AUTH_LINKS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"SET_TITLE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N"
	));
	?>
      </div>

      <!-- end .social-hold-->


      <ul class="info-links">
        <li><a href="http://shop.snq.ru/" target="_blank" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'shop.snq.ru - big_image_main_page'); return false;"><img src="/images/img1.jpg" width="321" height="274" alt=" "><span class="text1">Интернет-магазин</span></a></li>
        <li><a href="http://likeaqueen.ru/" target="_blank" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'likeaqueen.ru - big_image_main_page'); return false;"><img src="/images/img2.jpg" width="321" height="274" alt=""><span class="text1">Блог о моде</span></a></li>
        <li>
                  	<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "mainpage_hot_model", Array(
                    "AJAX_MODE" => "N",	// Включить режим AJAX
                    "IBLOCK_TYPE" => "collection",	// Тип инфо-блока
                    "IBLOCK_ID" => "1",	// Инфо-блок
                    "SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
                    "SECTION_CODE" => "",	// Код раздела
                    "ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
                    "ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
                    "FILTER_NAME" => "arrFilter",	// Имя массива со значениями фильтра для фильтрации элементов
                    "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
                    "SHOW_ALL_WO_SECTION" => "Y",	// Показывать все элементы, если не указан раздел
                    "SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
                    "DETAIL_URL" => "/collection/#SECTION_CODE#/#ELEMENT_ID#/",	// URL, ведущий на страницу с содержимым элемента раздела
                    "BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
                    "ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
                    "PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
                    "PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
                    "PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
                    "SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
                    "META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
                    "META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
                    "BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
                    "DISPLAY_PANEL" => "N",	// Добавлять в админ. панель кнопки для данного компонента
                    "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
                    "DISPLAY_COMPARE" => "N",	// Выводить кнопку сравнения
                    "SET_TITLE" => "N",	// Устанавливать заголовок страницы
                    "SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
                    "PAGE_ELEMENT_COUNT" => "1",	// Количество элементов на странице
                    "LINE_ELEMENT_COUNT" => "1",	// Количество элементов выводимых в одной строке таблицы
                    "PROPERTY_CODE" => array(	// Свойства
                        0 => "col_hot_model",
                        1 => "col_model_code",
                        2 => "col_price",
                        3 => "col_brand",
                        4 => "col_price_origin",
                    ),
                    "PRICE_CODE" => "",	// Тип цены
                    "USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
                    "SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
                    "PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
                    "PRODUCT_PROPERTIES" => "",	// Характеристики товара
                    "USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
                    "CACHE_TYPE" => "A",	// Тип кеширования
                    "CACHE_TIME" => "3600",	// Время кеширования (сек.)
                    "CACHE_FILTER" => "N",	// Кэшировать при установленном фильтре
                    "CACHE_GROUPS" => "Y",	// Учитывать права доступа
                    "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
                    "DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
                    "PAGER_TITLE" => "Товары",	// Название категорий
                    "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
                    "PAGER_TEMPLATE" => "",	// Название шаблона
                    "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
                    "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
                    "AJAX_OPTION_SHADOW" => "Y",	// Включить затенение
                    "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
                    "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
                    "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера

                    "SHOW_HOT_MODEL" => "Y" //Кастомизация: если "Y", то показываем все модели у которых стоит галочка "Вещь недели"
                    ),
                    false
                );?>
        </li>
      </ul>
      <!-- end .info-links-->

      <br>
      <hr class="hr_red">
      <ul class="info-links2">
        <li><a href="/upload/SNQ_AW_1314_catalog.pdf" rel="nofollow" onClick="trackOutboundLink(this, 'Outbound Links', 'catalog'); return false;"><img src="/images/catalog_fw201314.jpg" alt="" border="0"></a></li>
        <li><iframe width="495" height="275" frameborder="0" src="//www.youtube.com/embed/iAM2MQ9aWAY" allowfullscreen=""></iframe></li>
      </ul>

      <!-- end .info-links 2-->

    </div>
    <!-- end .content-->
    <div class="footer-place"></div>
  </div>
  <!-- end .container-->
</div>
<!-- end .wrapper-->
