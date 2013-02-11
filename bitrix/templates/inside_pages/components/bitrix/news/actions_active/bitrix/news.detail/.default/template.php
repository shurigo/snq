<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="mainContent">

<article class="news" itemscope itemtype="http://schema.org/Product">
<h1 itemprop="name"><?=$arResult["NAME"]?></h1>

<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
		<p itemprop="text"><?echo $arResult["DETAIL_TEXT"];?></p>
<?else:?>
		<p itemprop="text"><?echo $arResult["PREVIEW_TEXT"];?></p>
<?endif?>

<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img  itemprop="image" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="777px"  alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
<?endif?>

<?
if ($APPLICATION->GetCurPage() == "/actions/1059/")
{
	$APPLICATION->IncludeComponent("bitrix:catalog.section", "good_price", Array(
                "AJAX_MODE" => "N",	// Включить режим AJAX
                "IBLOCK_TYPE" => "collection",	// Тип инфо-блока
                "IBLOCK_ID" => "1",	// Инфо-блок
                "SECTION_ID" => "88",	// ID раздела
                "SECTION_CODE" => "goodprice_ss11",	// Код раздела
                "ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
                "ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
                "FILTER_NAME" => "arrFilter",	// Имя массива со значениями фильтра для фильтрации элементов
                "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
                "SHOW_ALL_WO_SECTION" => "N",	// Показывать все элементы, если не указан раздел
                "SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
                "DETAIL_URL" => "/good_prices/detail.php?ELEMENT_ID=#ELEMENT_ID#",	// URL, ведущий на страницу с содержимым элемента раздела
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
                "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
                "SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
                "PAGE_ELEMENT_COUNT" => "100",	// Количество элементов на странице
                "LINE_ELEMENT_COUNT" => "3",	// Количество элементов выводимых в одной строке таблицы
                "PROPERTY_CODE" => array("col_brand", "col_price", "col_model_code"),	// Свойства
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
                "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
                ),
                false
            );
}

?>
<p></br></p>
<p><a href="/actions/"><?=GetMessage("T_NEWS_DETAIL_BACK")?></a></p>
</section>

<aside class="aside">
<h2>Последние новости</h2>
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
		"PAGER_TITLE" => "Новости",
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
</aside>
