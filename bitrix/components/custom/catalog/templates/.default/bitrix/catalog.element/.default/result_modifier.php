<?
  // Get nomenclature by the item's IDMFC field
  $sort = array('PROPERTY_col_size' => 'ASC');
  $nomenclature_iblock_id = IntVal(getIblockIdByName('nomenclature')); 
  $idmfc = IntVal($arResult['PROPERTIES']['col_idmfc']['VALUE']);
  $filter = array(
		'IBLOCK_ID'          => $nomenclature_iblock_id,
		'PROPERTY_col_idmfc' => $idmfc);
  $nomenclature = CIBlockElement::GetList($sort, $filter);
	$arResult['SIZES'] = array();
	while($e = $nomenclature->GetNextElement()) {
		$fields = $e->GetFields();
		$props = $e->GetProperties();
		if(!$props) continue;
		$arResult['SIZES'][] = array(
			'SIZE'   => $props['col_size']['VALUE'], 
			'NOM_ID' => $fields['NAME']);
	}
?>
