<?
	require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php"); 

	header('Content-type: application/xml');

	CModule::IncludeModule('iblock'); 

		// Filter
	$ar_filter = Array(
		'IBLOCK_ID' => '1',
    'PROPERTY_col_availability' => '1' 
	);	
	
	//CIBlockElement->GetList($ar_sort, );

	$xml = new XMLWriter();
  $xml->openMemory();
	$xml->startDocument('1.0', 'UTF-8');
		$xml->startElement('yml_catalog');
			$date = new DateTime();
			$xml->writeAttribute('date', $date->format('Y-m-d H:i:s'));
			$xml->startElement('shop');
				$xml->writeElement('name', 'Снежная Королева');
				$xml->writeElement('company', 'Снежная Королева');
				$xml->writeElement('url', 'www.snowqueen.ru');
				$xml->startElement('currencies');
					$xml->startElement('currency');
						$xml->writeAttribute('id', 'RUR');
						$xml->writeAttribute('rate', '1');
						$xml->writeAttribute('plus', '0');
					$xml->endElement(); // currency
				$xml->endElement(); // currencies
				$xml->startElement('categories');
				$xml->endElement(); // categories
				$xml->writeElement('local_delivery_cost', '300');
				$xml->startElement('offers');
				$xml->endElement(); // offers	
			$xml->endElement(); // shop
		$xml->endElement(); // yml_catalog
	$xml->endDocument();
	print $xml->outputMemory();

//	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); 
?>
