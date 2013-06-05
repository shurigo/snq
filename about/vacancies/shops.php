<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Вакансии в магазинах");
	$APPLICATION->IncludeComponent(
		"custom:vacancies", 
		"", 
		Array(
			"IBLOCK_TYPE" => "vacancies",	// Тип инфо-блока
			"IBLOCK_ID" => "6",	// Инфо-блок
			"IBLOCK_SHOPS_ID" => "7",	// Инфо-блок
			"CACHE_TYPE" => "N",	// Тип кеширования
			"CACHE_TIME" => "3600",	// Время кеширования (сек.)
			"CACHE_FILTER" => "N",	// Кэшировать при установленном фильтре
			"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		),
		false
	);
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
