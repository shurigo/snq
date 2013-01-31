<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CHARSET;?>" />
<?$APPLICATION->ShowMeta("robots")?>
<?$APPLICATION->ShowMeta("keywords")?>
<?$APPLICATION->ShowMeta("description")?>
<title><?$APPLICATION->ShowTitle()?></title>
<?$APPLICATION->ShowCSS();?>
<?$APPLICATION->ShowHeadStrings()?>
<?$APPLICATION->ShowHeadScripts()?>
</head>

<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<table style="width:100%;">
	<tr>
    	<td style="width:50%;"></td>
        <td style="width:980px;">
        	<div style="width:980px;">
            	<table style="width:980px;">
                	<tr>
                    	<td style="padding:10px 0 0 0;" valign="top"><img src="/images/logo.jpg" width="300" alt="Снежная королева" title="Снежная королева" /></td>
                        <td style="padding:10px 0 0 0;" valign="top">
                        	<table style="width:100%;">
                            	<tr>
                                	<td style="text-align:right;"><?$APPLICATION->IncludeComponent("bitrix:menu", "mainmenu", Array(
                                            "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                                            "MAX_LEVEL" => "1",	// Уровень вложенности меню
                                            "CHILD_MENU_TYPE" => "top",	// Тип меню для остальных уровней
                                            "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                                            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                                            "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                                            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                                            "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                                            "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                                            ),
                                            false
                                        );?>
                                    </td>
                                </tr>
                                <tr>
                                	<td style="text-align:right; padding:20px 0 0 0;"><span style="font-size:14px;">(495)</span><span style="font-size:24px; color:#00244f;">777-8-999</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="margin:10px 0 0 0;">
            <table style="width:100%;">
            	<tr>
                	<td style="width:190px;"><a href="/collection/wfurs/"><img src="/images/catalog_menu/furs_collection.jpg" width="190" height="37" alt="Коллекция мехов" title="Коллекция мехов" /></a></td>
                    <td style="width:25%;"></td>
                    <td style="width:190px;"><a href="/collection/wskincoat/"><img src="/images/catalog_menu/sheepskin_coats.jpg" width="190" height="37" alt="Модные дублёнки" title="Модные дублёнки" /></a></td>
                    <td style="width:25%;"></td>
                    <td style="width:190px;"><a href="/collection/wleather/"><img src="/images/catalog_menu/leather_clothes.jpg" width="190" height="37" alt="Одежда из кожи" title="Одежда из кожи" /></a></td>
                    <td style="width:25%;"></td>
                    <td style="width:190px;"><a href="/collection/wclothes/"><img src="/images/catalog_menu/textile_clothes.jpg" width="190" height="37" alt="Одежда из текстиля" title="Одежда из текстиля" /></a></td>
                    <td style="width:25%;"></td>
                    <td style="width:190px;"><a href="/collection/waccess/"><img src="/images/catalog_menu/accessories.jpg" width="190" height="37" alt="Сумки и аксессуары" title="Сумки и аксессуары" /></a></td>
                </tr>
            </table>
            </div>
            <div style="margin:10px 0 0 0;">
            	<table style="width:100%;">
                	<tr>
                    	<td style="width:199px;" valign="top">
                        	<div style="width:199px; height:150px; background:url(/images/mainpage_blocks/download_catalog.jpg) no-repeat;">
                                <div style="width:199px; height:110px; cursor:pointer;" onclick="window.location='/collection/'"></div>
                                <div style="width:199px; height:52px; padding:6px 0 0 0px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/upload/SnowQueen_Autumn2010.pdf" style="font-weight:bold;" class="snq_color">Скачать каталог</a><br />
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PDF, Объём: 6,73 Mb</div>
                            </div>
                            <div style="margin:15px 0 0 0;"><a href="/actions/1038/"><img src="/images/mainpage_blocks/azhiotazh291010.jpg" width="199" height="150" alt="«АЖИОТАЖ» В «СНЕЖНОЙ КОРОЛЕВЕ»" title="«АЖИОТАЖ» В «СНЕЖНОЙ КОРОЛЕВЕ»" /></a></div>
                            <div style="margin:15px 0 0 0;"><a href="/about/news/?ELEMENT_ID=1039"><img src="/images/mainpage_blocks/skazki.jpg" width="199" height="150" alt="Совместный проект фонда «Детские Сердца» и компании «Снежная Королева» «Благотворительный календарь 2011»" title="Совместный проект фонда «Детские Сердца» и компании «Снежная Королева» «Благотворительный календарь 2011»" /></a></div>
                        </td>
                        <td style="padding:0 16px;" valign="top"><div><img src="/images/mainpage_blocks/style.jpg" width="512" height="56" /></div><div>
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
                        codebase="http://download.macromedia.com/pub/shockwave/cabs/
                        flash/swflash.cab#3,0,0,0" width="512" height="424">
                        <param name="SRC" value="/images/snowqueen.swf">
                        <embed src="/images/snowqueen.swf" pluginspage="http://www.macromedia.com/
                        shockwave/download/" type="application/x-shockwave-flash"
                        width="512" height="424">
                        </embed>
                        </object>
                      </div></td>
                        <td style="width:237px;" valign="top">
                        	<div><a href="/actions/1037/"><img src="/images/mainpage_blocks/shuby291010.jpg" width="237" height="150" alt="В «СНЕЖНОЙ КОРОЛЕВЕ» СКИДКИ НА ШУБЫ 20%!" title="В «СНЕЖНОЙ КОРОЛЕВЕ» СКИДКИ НА ШУБЫ 20%!" /></a></div>
                            <div style="margin:15px 0 0 0;"><a href="/actions/1040/"><img src="/images/mainpage_blocks/buyweeks291010.jpg" width="237" height="150" alt="С 25 октября по 7 ноября - «Недели удачных покупок» в «Снежной Королеве»!" title="С 25 октября по 7 ноября - «Недели удачных покупок» в «Снежной Королеве»!" /></a></div>
                            <div style="margin:15px 0 0 0;"><a href="/actions/1041/"><img src="/images/mainpage_blocks/sviter291010.jpg" width="237" height="150" alt="«КУПИ ПУХОВИК – ПОЛУЧИ ПОДАРОК»!" title="«КУПИ ПУХОВИК – ПОЛУЧИ ПОДАРОК»!" /></a></div>
                        </td>
                    </tr>
                    <tr>
                    	<td valign="top" style="padding:31px 0 0 0;">
                        	<div style="padding:10px 0 7px 16px;"><img src="/images/headers/brands.jpg" width="64" height="10" alt="Бренды" title="Бренды" /></div>
                            <div style="height:4px; background:url(/images/headers/header_underline.gif) repeat-x; width:100%;"></div>
                            <?$APPLICATION->IncludeComponent("bitrix:news.list", "mainpage_brands", Array(
                                "DISPLAY_DATE" => "Y",	// Выводить дату элемента
                                "DISPLAY_NAME" => "Y",	// Выводить название элемента
                                "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
                                "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
                                "AJAX_MODE" => "N",	// Включить режим AJAX
                                "IBLOCK_TYPE" => "brands",	// Тип информационного блока (используется только для проверки)
                                "IBLOCK_ID" => "2",	// Код информационного блока
                                "NEWS_COUNT" => "10",	// Количество новостей на странице
                                "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
                                "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
                                "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
                                "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
                                "FILTER_NAME" => "",	// Фильтр
                                "FIELD_CODE" => "",	// Поля
                                "PROPERTY_CODE" => "",	// Свойства
                                "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
                                "DETAIL_URL" => "/collection/brands/?ELEMENT_ID=#ELEMENT_ID#",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
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
                            <div style="padding:10px 0 10px 16px;"><a href="/collection/brands/" style="font-size:11px;">Весь список брендов</a></div>
                        </td>
                        <td valign="top" style="padding:31px 16px 0 16px;">
                        	<table style="width:100%;">
                            	<tr>
                                	<td valign="top" style="width:50%; padding:0 8px 0 0;">
                                    	<div style="padding:10px 0 7px 16px;"><img src="/images/headers/hot_clothes.jpg" width="108" height="10" alt="Вещь недели" title="Вещь недели" /></div>
			                            <div style="height:4px; background:url(/images/headers/header_underline.gif) repeat-x; width:100%;"></div>
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
                                        "DETAIL_URL" => "/collection/#SECTION_ID#/#ELEMENT_ID#/",	// URL, ведущий на страницу с содержимым элемента раздела
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
                                    </td>
                                    <td valign="top" style="width:50%; padding:0 0 0 8px;">
	                                    <div style="padding:9px 0 7px 16px;"><img src="/images/headers/news.jpg" width="72" height="11" alt="Новости" title="Новости" /></div>
			                            <div style="height:4px; background:url(/images/headers/header_underline.gif) repeat-x; width:100%;"></div>
                                        <?$APPLICATION->IncludeComponent("bitrix:news.list", "mainpage_news", Array(
                                            "DISPLAY_DATE" => "Y",	// Выводить дату элемента
                                            "DISPLAY_NAME" => "Y",	// Выводить название элемента
                                            "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
                                            "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
                                            "AJAX_MODE" => "N",	// Включить режим AJAX
                                            "IBLOCK_TYPE" => "news",	// Тип информационного блока (используется только для проверки)
                                            "IBLOCK_ID" => "3",	// Код информационного блока
                                            "NEWS_COUNT" => "3",	// Количество новостей на странице
                                            "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
                                            "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
                                            "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
                                            "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
                                            "FILTER_NAME" => "",	// Фильтр
                                            "FIELD_CODE" => "",	// Поля
                                            "PROPERTY_CODE" => "",	// Свойства
                                            "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
                                            "DETAIL_URL" => "/about/news/?ELEMENT_ID=#ELEMENT_ID#",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
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
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="top" style="padding:57px 0 0 0; text-align:center;"><img src="/images/svyaznoy.jpg" width="195" height="216" alt="Связной-Клуб" title="Связной-Клуб" style="border:1px solid #9B9B9B;" /></td>
                    </tr>
                </table>
            </div>
