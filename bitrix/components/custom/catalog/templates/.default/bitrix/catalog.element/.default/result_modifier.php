<?
	$nomenclature = CIBlockElement::GetList(
		$sort,
		array(
			'IBLOCK_ID' => IntVal(getIblockIdByName('collection', 'nomenclature')), 
			'PROPERTY_col_item_id' => $arResult['ID'])
	);
	$arResult['SIZES'] = array();
	while($e = $nomenclature->GetNextElement()) {
		$fields = $e->GetFields();
		$props = $e->GetProperties();
		if(!$props) continue;
		$arResult['SIZES'][] = array(
			'SIZE' => $props['col_size']['VALUE'], 
			'NOM_ID' => $fields['NAME']);
	}
?>
