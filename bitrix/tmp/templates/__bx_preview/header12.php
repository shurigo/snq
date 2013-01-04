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
<script type="text/javascript">

/******************************************
* Snow Effect Script- By Altan d.o.o. (http://www.altan.hr/snow/index.html)
* Visit Dynamic Drive DHTML code library (http://www.dynamicdrive.com/) for full source code
* Last updated Nov 9th, 05' by DD. This notice must stay intact for use
******************************************/
  
  //Configure below to change URL path to the snow image
  var snowsrc="/images/snow.gif"
  // Configure below to change number of snow to render
  var no = 10;
  // Configure whether snow should disappear after x seconds (0=never):
  var hidesnowtime = 0;
  // Configure how much snow should drop down before fading ("windowheight" or "pageheight")
  var snowdistance = "windowheight";

///////////Stop Config//////////////////////////////////

  var ie4up = (document.all) ? 1 : 0;
  var ns6up = (document.getElementById&&!document.all) ? 1 : 0;

    function iecompattest(){
    return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
    }

  var dx, xp, yp;    // coordinate and position variables
  var am, stx, sty;  // amplitude and step variables
  var i, doc_width = 800, doc_height = 600;
  
  if (ns6up) {
    doc_width = self.innerWidth;
    doc_height = self.innerHeight;
  } else if (ie4up) {
    doc_width = iecompattest().clientWidth;
    doc_height = iecompattest().clientHeight;
  }

  dx = new Array();
  xp = new Array();
  yp = new Array();
  am = new Array();
  stx = new Array();
  sty = new Array();
  for (i = 0; i < no; ++ i) {  
    dx[i] = 0;                        // set coordinate variables
    xp[i] = Math.random()*(doc_width-50);  // set position variables
    yp[i] = Math.random()*doc_height;
    am[i] = Math.random()*20;         // set amplitude variables
    stx[i] = 0.02 + Math.random()/10; // set step variables
    sty[i] = 0.7 + Math.random();     // set step variables
        if (ie4up||ns6up) {
      if (i == 0) {
        document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: 100; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+snowsrc+"' border=\"0\"><\/div>");
      } else {
        document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: 100; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+snowsrc+"' border=\"0\"><\/div>");
      }
    }
  }

  function snowIE_NS6() {  // IE and NS6 main animation function
    doc_width = ns6up?window.innerWidth-10 : iecompattest().clientWidth-10;
        doc_height=(window.innerHeight && snowdistance=="windowheight")? window.innerHeight : (ie4up && snowdistance=="windowheight")?  iecompattest().clientHeight : (ie4up && !window.opera && snowdistance=="pageheight")? iecompattest().scrollHeight : iecompattest().offsetHeight;
    for (i = 0; i < no; ++ i) {  // iterate for every dot
      yp[i] += sty[i];
      if (yp[i] > doc_height-50) {
        xp[i] = Math.random()*(doc_width-am[i]-30);
        yp[i] = 0;
        stx[i] = 0.02 + Math.random()/10;
        sty[i] = 0.7 + Math.random();
      }
      dx[i] += stx[i];
      document.getElementById("dot"+i).style.top=yp[i]+"px";
      document.getElementById("dot"+i).style.left=xp[i] + am[i]*Math.sin(dx[i])+"px";  
    }
    snowtimer=setTimeout("snowIE_NS6()", 10);
  }

    function hidesnow(){
        if (window.snowtimer) clearTimeout(snowtimer)
        for (i=0; i<no; i++) document.getElementById("dot"+i).style.visibility="hidden"
    }
        

if (ie4up||ns6up){
    snowIE_NS6();
        if (hidesnowtime>0)
        setTimeout("hidesnow()", hidesnowtime*1000)
        }

</script>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<table style="width:100%;">
	<tr>
    	<td style="width:50%;"></td>
        <td style="width:980px;">
        	<div style="width:980px;">
            	<table style="width:980px;">
                	<tr>
                    	<td style="padding:10px 0 0 0; width:300px;" valign="top"><img src="/images/logo.jpg" width="300" alt="Снежная королева" title="Снежная королева" /></td>
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
                                	<td style="padding:20px 0 0 0;">
										<table style="width:100%;">
                                        	<tr>
                                            	<td style="text-align:left; padding:0 0 0 95px;"><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="snowqueen.ru" show_faces="false" width="150" font="verdana"></fb:like></td>
                                                <td style="text-align:right;"><span style="font-size:14px;">(495)</span><span style="font-size:24px; color:#00244f;">777-8-999</span></td>
                                            </tr>
                                        </table>
                                    </td>
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
                            <div style="margin:15px 0 0 0;"><a href="/about/news/?ELEMENT_ID=1039"><img src="/images/mainpage_blocks/skazki.jpg" width="199" height="150" alt="Совместный проект фонда «Детские Сердца» и компании «Снежная Королева» «Благотворительный календарь 2011»" title="Совместный проект фонда «Детские Сердца» и компании «Снежная Королева» «Благотворительный календарь 2011»" /></a></div>
                            <div style="margin:15px 0 0 0;"><img src="/images/mainpage_blocks/fitting_room.jpg" width="199" height="150" alt="Виртуальная примерочная скоро на нашем сайте" title="Виртуальная примерочная скоро на нашем сайте" /></div>
                        </td>
                        <td style="padding:0 16px;" valign="top"><div><img src="/images/mainpage_blocks/style.jpg" width="512" height="56" /></div><div>
							<script type="text/javascript" src="/swfobject/swfobject.js"></script>
                            <script type="text/javascript">
                    
                                    var attributes = {id:"Rotator", name:"Rotator"};
                                    var flashvars = {};
                    
                            swfobject.embedSWF("/picrotate_512x424.swf", "flashCont", 512, 424, "10", "/swfobject/expressinstall.swf", flashvars, {menu: 'false'}, attributes);
                    
                            </script>
                            <style>
                            #flashCont {
                                width: 100%;
                                height: 100%;
                            }
                            </style>
                            <div id="flashCont">
                                <img src="/images/mainpagebanpics/nyimage1.jpg" width="512" height="424" />
                            </div>
                      </div></td>
                        <td style="width:237px;" valign="top">
                        	<div><a href="/actions/1054/"><img src="/images/mainpage_blocks/sale70.jpg" width="237" height="480" alt="В «СНЕЖНОЙ КОРОЛЕВЕ» СКИДКИ - 70% НА ВСЕ!" title="В «СНЕЖНОЙ КОРОЛЕВЕ» СКИДКИ - 70% НА ВСЕ!" /></a></div>
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
