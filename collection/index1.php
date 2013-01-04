<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Коллекция");
?><?$APPLICATION->IncludeComponent("bitrix:catalog", "collection", Array(
	"AJAX_MODE" => "N",	// Включить режим AJAX
	"SEF_MODE" => "Y",	// Включить поддержку ЧПУ
	"IBLOCK_TYPE" => "collection",	// Тип инфо-блока
	"IBLOCK_ID" => "1",	// Инфо-блок
	"USE_FILTER" => "N",	// Показывать фильтр
	"USE_REVIEW" => "N",	// Разрешить отзывы
	"USE_COMPARE" => "Y",	// Использовать компонент сравнения
	"SHOW_TOP_ELEMENTS" => "N",	// Выводить топ элементов
	"PAGE_ELEMENT_COUNT" => "30",	// Количество элементов на странице
	"LINE_ELEMENT_COUNT" => "3",	// Количество элементов, выводимых в одной строке таблицы
	"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем товары в разделе
	"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки товаров в разделе
	"LIST_PROPERTY_CODE" => array(	// Свойства
		0 => "col_model_code",
		1 => "col_price",
		2 => "col_sizes",
        3 => "col_brand",
	),
	"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
	"LIST_META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства раздела
	"LIST_META_DESCRIPTION" => "-",	// Установить описание страницы из свойства раздела
	"LIST_BROWSER_TITLE" => "UF_SEC_TITLE",	// Установить заголовок окна браузера из свойства раздела
	"DETAIL_PROPERTY_CODE" => array(	// Свойства
		0 => "col_model_code",
		1 => "col_price",
		2 => "col_sizes",
        3 => "col_brand",
	),
	"DETAIL_META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
	"DETAIL_META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
	"DETAIL_BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
	"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
	"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
	"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
	"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
	"DISPLAY_PANEL" => "N",	// Добавлять в админ. панель кнопки для данного компонента
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
	"CACHE_FILTER" => "N",	// Кэшировать при установленном фильтре
	"CACHE_GROUPS" => "Y",	// Учитывать права доступа
	"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
	"SET_STATUS_404" => "Y",	// Устанавливать статус 404, если не найдены элемент или раздел
	"PRICE_CODE" => array(	// Тип цены
		0 => "col_price",
	),
	"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
	"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
	"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
	"PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
	"LINK_IBLOCK_TYPE" => "",	// Тип инфо-блока, элементы которого связаны с текущим элементом
	"LINK_IBLOCK_ID" => "",	// ID инфо-блока, элементы которого связаны с текущим элементом
	"LINK_PROPERTY_SID" => "",	// Свойство, в котором хранится связь
	"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",	// URL на страницу где будет показан список связанных элементов
	"DISPLAY_TOP_PAGER" => "Y",	// Выводить над списком
	"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
	"PAGER_TITLE" => "Модели",	// Название категорий
	"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
	"PAGER_TEMPLATE" => "",	// Название шаблона
	"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
	"PAGER_SHOW_ALL" => "Y",	// Показывать ссылку "Все"
	"COMPARE_NAME" => "CATALOG_COMPARE_LIST",	// Уникальное имя для списка сравнения
	"COMPARE_FIELD_CODE" => array(	// Поля
		0 => "ID",
		1 => "NAME",
		2 => "PREVIEW_TEXT",
		3 => "PREVIEW_PICTURE",
		4 => "DETAIL_TEXT",
		5 => "DETAIL_PICTURE",
	),
	"COMPARE_PROPERTY_CODE" => array(	// Свойства
		0 => "col_model_code",
		1 => "col_price",
		2 => "col_sizes",
	),
	"DISPLAY_ELEMENT_SELECT_BOX" => "N",	// Выводить список элементов инфоблока
	"ELEMENT_SORT_FIELD_BOX" => "name",	// По какому полю сортируем список элементов
	"ELEMENT_SORT_ORDER_BOX" => "asc",	// Порядок сортировки списка элементов
	"COMPARE_ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем товары в разделе
	"COMPARE_ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки товаров в разделе
	"AJAX_OPTION_SHADOW" => "Y",	// Включить затенение
	"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
	"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
	"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
	"SEF_FOLDER" => "/collection/",	// Каталог ЧПУ (относительно корня сайта)
	"SEF_URL_TEMPLATES" => array(
		"section" => "#SECTION_CODE#/",
		"element" => "#SECTION_CODE#/#ELEMENT_ID#/",
		"compare" => "compare.php?action=#ACTION_CODE#",
	),
	"VARIABLE_ALIASES" => array(
		"section" => "",
		"element" => "",
		"compare" => array(
			"ACTION_CODE" => "action",
		),
	)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>