<?php
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	// check the arguments, if invalid - redirect to the shop list
	if(!isset($id) || !is_numeric($id)) {
		LocalRedirect('/our_shops', true);
	} else {
?>

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
			$props = $el_shop->GetProperties();
			$APPLICATION->SetTitle($props['col_title']['VALUE'].'. '.$props['col_address']['VALUE']);
?>
			<!--<h1><?=$fields['NAME']?></h1>
			<?if(!empty($props['PREVIEW_TEXT']['VALUE'])):?>
				<div id="description"><?=$props['PREVIEW_TEXT']['VALUE']?>
			<?endif;?>
			-->
			<div class="shop">
			<?if(!empty($props['col_title']['VALUE'])):?>
				<h1 id="title"><?=$props['col_title']['VALUE']?></h1>
			<?endif;?>
			<?if(!empty($props['col_waymark']['VALUE'])):?>
				<div id="waymark">
				<?=$props['col_waymark']['VALUE']?>
				<?if(!empty($props['col_google_tour']['VALUE'])):?>
				&nbsp;(<a href="<?=$props['col_google_tour']['VALUE']?>"><b>виртуальный тур по магазину</b></a>)
   			    <?endif;?>
				</div>
			<?endif;?>
			<?if(!empty($props['col_web']['VALUE'])):?>
			    <? if(substr($props['col_web']['VALUE'],7)!="http://")
			       $props['col_web']['VALUE']="http://".$props['col_web']['VALUE'];
			    ?>
				<div id="web"><a href="<?=$props['col_web']['VALUE']?>" target="_blank"><?=$props['col_web']['VALUE']?></a></div>
			<?endif;?>
            <?if(!empty($props['col_phone']['VALUE'])):?>
				<div id="phone"><?=$props['col_phone']['VALUE']?></div>
			<?endif;?>
			<br />
            <h1 class="shop">Адрес:</h1>
			<?if(!empty($props['col_address']['VALUE'])):?>
				<div id="address"><?=$props['col_address']['VALUE']?></div>
			<?endif;?>
			<?if(!empty($props['col_subway_station']['VALUE'])):?>
				<div id="subway_station"><?=$props['col_subway_station']['VALUE']?></div>
			<?endif;?>
			<br />
            <h1 class="shop">Проезд:</h1>
            <?if(!empty($props['col_shuttle']['VALUE'])):?>
				<div id="shuttle"><?=$props['col_shuttle']['VALUE']?></div>
			<?endif;?>
			<?if(!empty($props['col_transport']['VALUE'])):?>
				<div id="transport"><?=$props['col_transport']['VALUE']?></div>
			<?endif;?>
			<br />
			<h1 class="shop">Время работы:</h1>
			<?if(!empty($props['col_schedule']['VALUE'])):?>
				<div id="schedule"><?=$props['col_schedule']['VALUE']?></div>
			<?endif;?>
			<?if(!empty($props['col_atelier']['VALUE'])):?>
				<div id="atelier"><?=$props['col_atelier']['VALUE']?></div>
			<?endif;?>
			</div>
			<br />
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
<br /><a href="/our_shops/">Все магазины</a>
<?
		}
	}
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>

