<?
	require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php"); 

	header('Content-type: application/xml');

	CModule::IncludeModule('iblock'); 
	$root_url = 'http://www.snowqueen.ru';

	$xml = new XMLWriter();
	$xml->setIndent(true);
  $xml->openMemory();
	$xml->startDocument('1.0', 'UTF-8');
	$xml->writeDTD('html');
		$xml->startElement('yml_catalog');
			$date = new DateTime();
			$xml->writeAttribute('date', $date->format('Y-m-d H:i:s'));
			$xml->startElement('shop');
				$xml->writeElement('name', 'Снежная Королева');
				$xml->writeElement('company', 'Снежная Королева');
				$xml->writeElement('url', $root_url);
				$xml->startElement('currencies');
					$xml->startElement('currency');
						$xml->writeAttribute('id', 'RUR');
						$xml->writeAttribute('rate', '1');
						$xml->writeAttribute('plus', '0');
					$xml->endElement(); // currency
				$xml->endElement(); // currencies
				$xml->startElement('categories');
					$ar_select = Array('ID', 'NAME', 'IBLOCK_ID', 'SECTION_ID', 'SECTION_CODE', 'LEFT_MARGIN', 'RIGHT_MARGIN', 'DEPTH_LEVEL');
					$dbSec = CIBlockSection::GetList(
						Array('LEFT_MARGIN' => 'ASC', 'NAME' => 'ASC'),
						Array('IBLOCK_ID' => '1'),
						false,
						$ar_select,
						false
					);
					while($arSec = $dbSec->GetNext())
					{
						if($arSec['DEPTH_LEVEL'] >= 3) { // Ignore the root category
							$xml->startElement('category');
							$xml->writeAttribute('id', $arSec['ID']);
								if($arSec['DEPTH_LEVEL'] == 3) {
									$parent_id = $arSec['ID'];
								}
								if($arSec['DEPTH_LEVEL'] == 4) {
									$xml->writeAttribute('parentId', $parent_id);
								}
								$xml->text(iconv('cp1251', 'utf-8', $arSec['NAME']));
							$xml->endElement(); // category
						}
					}
				$xml->endElement(); // categories
				$xml->writeElement('local_delivery_cost', '300');
				$xml->startElement('offers');
					$ar_filter_collection = Array('IBLOCK_ID' => '1', 'PROPERTY_col_availability' => '1');
					$ar_sort = Array('SECTION_CODE' => 'ASC', 'NAME' => 'ASC');
					$ar_select = array(
						'ID',
						'NAME',
						'CODE',
						'DATE_CREATE',
						'ACTIVE_FROM',
						'CREATED_BY',
						'IBLOCK_ID',
						'SECTION_ID',
						'LANG_DIR',
						'SECTION_CODE',
						'IBLOCK_SECTION_ID',
						'DETAIL_PAGE_URL',
						'DETAIL_TEXT',
						'DETAIL_TEXT_TYPE',
						'DETAIL_PICTURE',
						'PREVIEW_TEXT',
						'PREVIEW_TEXT_TYPE',
						'PREVIEW_PICTURE',
						'PROPERTY_COL_MODEL_CODE',
						'PROPERTY_COL_PRICE_NEW',
						'PROPERTY_COL_PRICE',
						'PROPERTY_COL_TITLE',
						'PROPERTY_COL_BRAND',
						'PROPERTY_COL_DESCRIPTION'
					);  
					$ar_result = CIBlockElement::GetList($ar_sort, $ar_filter_collection, false, false, $ar_select);
					while($element = $ar_result->GetNext()) {
						$xml->startElement('offer');
						$xml->writeAttribute('id', $element['ID']);
						$xml->writeAttribute('available', 'true');
						$xml->writeElement('url', $root_url.$element['DETAIL_PAGE_URL']);
						$price = $element['PROPERTY_COL_PRICE_VALUE'];
						$price_new = $element['PROPERTY_COL_PRICE_NEW_VALUE'];
						$xml->writeElement('price', $price_new != 0 ? $price_new : $price);
						$xml->writeElement('currencyId', 'RUR');
						$xml->writeElement('categoryId', $element['IBLOCK_SECTION_ID']);
						$xml->writeElement('picture', $root_url.CFile::GetPath($element['PREVIEW_PICTURE']));
						$xml->writeElement('vendorCode', iconv('cp1251', 'utf-8', $element['PROPERTY_COL_MODEL_CODE_VALUE']));
						$xml->writeElement('store', 'true');
						$xml->writeElement('pickup', 'true');
						$res = CIBlockElement::GetByID($element['PROPERTY_COL_BRAND_VALUE']);
						$brand = $res->GetNext();
						$xml->writeElement('vendor', iconv('cp1251', 'utf-8', $brand['NAME']));
						$xml->writeElement('model', iconv('cp1251', 'utf-8', $element['PROPERTY_COL_TITLE_VALUE']));
						$xml->writeElement('description', iconv('cp1251', 'utf-8', $element['PROPERTY_COL_DESCRIPTION_VALUE']));
						$xml->endElement(); // offer
					}
				$xml->endElement(); // offers	
			$xml->endElement(); // shop
		$xml->endElement(); // yml_catalog
	$xml->endDocument();
	print $xml->outputMemory();
?>
