<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вакансии в офисе");
?>

<h1>Вакансии в офисе</h1>
<div id="wrapper">
<?
  $filter = array(
    "NAME"=>"Вакансии в офисе",
    "ACTIVE"=>"Y",
    "GLOBAL_ACTIVE"=>"Y",
    "IBLOCK_ID"=>6,
    "IBLOCK_ACTIVE"=>"Y",
  );
  $ofice_section_list = CIBlockSection::GetList(array("NAME"=>"ASC"), $arFilter, false, array('ID', 'NAME'));
  $ofice_section = $ofice_section_list->GetNext();

  $res = CIBlockSection::GetList(
     Array(),
     Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y","SECTION_ID"=>$ofice_section['ID']),
     true,
     Array("ID", "NAME", "DESCRIPTION")
  );
  while($arSection = $res->GetNext())
  {
    echo '<div class="accordionButton" title="'.$arSection['DESCRIPTION'].'">'.$arSection['NAME'].'-'.$arSection['ELEMENT_CNT'].'</div><div class="accordionContent">';

    /*
    $APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"office_vacancies",
	Array(
		"IBLOCK_TYPE" => "vacancies",
		"IBLOCK_ID" => "6",
		"SECTION_ID" => $arSection['ID'],
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"COUNT_ELEMENTS" => "N",
		"TOP_DEPTH" => "2",
		"DISPLAY_PANEL" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y"
	)
);*/

   $APPLICATION->IncludeComponent("bitrix:catalog.section", "office_vacancies", Array(
	"AJAX_MODE" => "N",	// Включить режим AJAX
	"IBLOCK_TYPE" => "vacancies",	// Тип инфо-блока
	"IBLOCK_ID" => "6",	// Инфо-блок
	"SECTION_ID" => $arSection['ID'],	// ID раздела
	"SECTION_CODE" => "",	// Код раздела
	"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
	"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
	"FILTER_NAME" => "arrFilter",	// Имя массива со значениями фильтра для фильтрации элементов
	"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
	"SHOW_ALL_WO_SECTION" => "N",	// Показывать все элементы, если не указан раздел
	"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
	"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
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
	"PAGE_ELEMENT_COUNT" => "30",	// Количество элементов на странице
	"LINE_ELEMENT_COUNT" => "1",	// Количество элементов выводимых в одной строке таблицы
	"PROPERTY_CODE" => "",	// Свойства
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
	"PAGER_TITLE" => "Вакансии",	// Название категорий
	"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
	"PAGER_TEMPLATE" => "",	// Название шаблона
	"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
	"PAGER_SHOW_ALL" => "Y",	// Показывать ссылку "Все"
	"AJAX_OPTION_SHADOW" => "Y",	// Включить затенение
	"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
	"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
	"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
	),
	false
);

      echo '</div>';
  };
?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>