<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="ymaps-map-id_133707667107155769727" style="width: 998px; height: 400px;"></div>
<div style="width: 998px; text-align: right;"><a href="http://api.yandex.ru/maps/tools/constructor/?lang=ru-RU" target="_blank" style="color: #191a1e; font: 13px Arial,Helvetica,sans-serif;"></a></div>
<script type="text/javascript" src="http://api-maps.yandex.ru/2.0/?coordorder=longlat&load=package.full&wizard=constructor&lang=ru-RU&onload=fid_133707667107155769727"></script>
<div id="cities">
<script type="text/javascript">
	function fid_133707667107155769727(ymaps) {
		var map = new ymaps.Map(
			"ymaps-map-id_133707667107155769727", {
			center: [55.76, 37.64],
			zoom: 10,
			type: "yandex#map"
		});
		map.controls
			.add("zoomControl")
			.add("mapTools")
			.add(new ymaps.control.TypeSelector(["yandex#map", "yandex#satellite", "yandex#hybrid", "yandex#publicMap"]));
		map.geoObjects
		<?foreach($arResult as $arElement):?>
		.add(new ymaps.Placemark(
			[<?=$arElement["UF_MAP_COORDINATE"]?>], {
				balloonContent: "<?=$arElement['NAME']?>"}))
		<?endforeach;?>
	  }
		</script>
</div>
<div>
<table style="width:100%;">
	<tr>
    	<td valign="top" style="width:50%; padding:0 20px 0 0;">
		<?
/*        foreach($arResult as $arCity)
        {
            if (is_array($arCity["ITEMS"]) && count($arCity["ITEMS"]) > 0)
            {
                $shop_counter = 1;
                $second_column_showed = 0;
				?><ol><?
                foreach($arCity["ITEMS"] as $arElement)
                {
                    if ($shop_counter > ceil(count($arCity["ITEMS"]) / 2) && !$second_column_showed)
                    {
                        ?></ol></td><td valign="top" style="width:50%; padding:0 0 0 20px;"><ol start="<?=$shop_counter?>"><?
                        $second_column_showed = 1;
                    }
                    ?>
                    <li style="margin:20px 0 0 20px;">
                        <div style="color:#191a1e; font-weight:bold; font-size:14px;"><?=$arElement["NAME"]?></div>
                        <div style="margin:10px 0 0 0; font-weight:bold;">�����:</div>
                        <div><?=$arElement["PREVIEW_TEXT"]?></div>
                    </li>
                    <?
                    $shop_counter++;
                }
				?></ol><?
            }
				}*/
        ?>
        </td>
    </tr>
</table>
</div>
