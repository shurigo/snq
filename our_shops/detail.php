<?php
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	// check the arguments, if invalid - redirect to the shop list
	if(!isset($id) || !is_numeric($id)) {
		LocalRedirect('/our_shops', true);
	} else {
?>
  <a href="/our_shops/">Наши магазины</a>
<?	
		$select = array("ID", "NAME", 'PREVIEW_TEXT', "PROPERTY_*");
		$filter = array(
			'IBLOCK_ID' => getIblockIdByName('our_shops'),
			"ID" => $id
		);

		$res = CIBlockElement::GetList(Array(), $filter, false, false, $select);
		$el_shop = $res->GetNextElement();
		if(!$el_shop) { // shop id not found -> redirect to the shop list
			LocalRedirect('/our_shops', true);
		} else { // print the shop's details
			$fields = $el_shop->GetFields();
			$APPLICATION->SetTitle($fields['NAME'].'. '.$fields['PREVIEW_TEXT']);
			echo "<h1>".$fields['NAME']."</h1>";
			echo $fields['PREVIEW_TEXT'];
		}
	}
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>

