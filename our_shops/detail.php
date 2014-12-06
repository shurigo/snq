<?php
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	// check the arguments, if invalid - redirect to the shop list
	if(!isset($id) || !is_numeric($id)) {
		LocalRedirect('/our_shops', true);
	} else {
?>
		<a href="/our_shops/">Наши магазины</a>
<?	
		$select = array("ID", "NAME", 'PREVIEW_TEXT', 'PROPERTY_*', 'UF_*');
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
?>
			<h1><?=$fields['NAME']?></h1>
			<div id="description"><?=$fields['PREVIEW_TEXT']?>
			<div id="ymaps-map-id_133707667107155769727" style="width: 998px; height: 400px;"></div>
			<div style="width: 998px; text-align: right;"><a href="http://api.yandex.ru/maps/tools/constructor/?lang=ru-RU" target="_blank" style="color: #191a1e; font: 13px Arial,Helvetica,sans-serif;"></a></div>
			<script type="text/javascript" src="http://api-maps.yandex.ru/2.0/?coordorder=longlat&load=package.full&wizard=constructor&lang=ru-RU&onload=fid_133707667107155769727"></script>
			<div id="map">
				<script type="text/javascript">
					function fid_133707667107155769727(ymaps) {
						var map = new ymaps.Map("ymaps-map-id_133707667107155769727", {
							center: [<?=$fields['PROPERTY_8']?>],
							zoom: 14,
							type: "yandex#map"
						});
						map.controls
							.add("zoomControl")
							.add("mapTools")
							.add(new ymaps.control.TypeSelector(["yandex#map", "yandex#satellite", "yandex#hybrid", "yandex#publicMap"]));
						map.geoObjects.add(
							new ymaps.Placemark(
								[<?=$fields["PROPERTY_8"]?>], {
									balloonContent: '<?=trim(str_replace(array("\r\n", "\r", "\n"), ' ', $fields["PREVIEW_TEXT"]))?>',
									iconContent: ""
								}, {
									preset: "twirl#blackIcon"
								}));
					};
				</script>
			</div>
<?
		}
	}
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>

