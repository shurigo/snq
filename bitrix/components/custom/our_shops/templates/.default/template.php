<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="ymaps-map-id_133707667107155769727" style="width: 998px; height: 400px;"></div>
<div style="width: 998px; text-align: right;"><a href="http://api.yandex.ru/maps/tools/constructor/?lang=ru-RU" target="_blank" style="color: #191a1e; font: 13px Arial,Helvetica,sans-serif;"></a></div>
<script type="text/javascript" src="http://api-maps.yandex.ru/2.0/?coordorder=longlat&load=package.full&wizard=constructor&lang=ru-RU&onload=fid_133707667107155769727"></script>
<div id="cities">
	<?
    foreach($arResult as $arCity) {
		if (is_array($arCity["ITEMS"]) && count($arCity["ITEMS"]) > 0) {
    	$shop_counter = 1;
     	foreach($arCity["ITEMS"] as $arElement) {
      	if (strlen($arElement["PROPERTY_8"]) > 0) {
					if ($shop_counter == 1) { ?>
                        <script type="text/javascript">
                            function fid_133707667107155769727(ymaps) {
    							var map = new ymaps.Map("ymaps-map-id_133707667107155769727", {
                                    center: [<?=$arCity["UF_MAP_COORDINATE"]?>],
                                    zoom: <?=(is_numeric($arCity["UF_MAP_ZOOM"]) && $arCity["UF_MAP_ZOOM"] > 0)?$arCity["UF_MAP_ZOOM"]:10;?>,
                                    type: "yandex#map"
                                });
                                map.controls
                                    .add("zoomControl")
                                    .add("mapTools")
                                    .add(new ymaps.control.TypeSelector(["yandex#map", "yandex#satellite", "yandex#hybrid", "yandex#publicMap"]));
                                map.geoObjects
                        <?
                    }
                    ?>
                    .add(new ymaps.Placemark([<?=$arElement["PROPERTY_8"]?>], {
                        balloonContent: '<a target="_blank" href="/our_shops/detail.php?id=<?=$arElement['ID']?>"><?=trim(str_replace(array("\r\n", "\r", "\n"), ' ', $arElement["PREVIEW_TEXT"]))?></a>',
						iconContent: "<?=$shop_counter?>"
                    }, {
                        preset: "twirl#blackIcon"
                    }))
                    <?
                    $shop_counter++;
                }
            }
            if ($shop_counter > 1)
            {
                ?>};
                    </script>
                    <!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (конец) -->
                <?
            }
		}
	}
	?>
</div>
<div>
<table style="width:100%;">
	<tr>
    	<td valign="top" style="width:50%; padding:0 20px 0 0;">
		<?
        foreach($arResult as $arCity)
        {
             if (is_array($arCity["ITEMS"]) && count($arCity["ITEMS"]) > 0)
            {
                $shop_counter = 1;
                $second_column_showed = 0;
				?><ol><?
                foreach($arCity["ITEMS"] as $arElement)
                {
                    //print_r($arElement);

                    if ($shop_counter > ceil(count($arCity["ITEMS"]) / 2) && !$second_column_showed)
                    {
                        ?></ol></td><td valign="top" style="width:50%; padding:0 0 0 20px;"><ol start="<?=$shop_counter?>"><?
                        $second_column_showed = 1;
                    }
                    ?>

                    <li>
                        <a href="/our_shops/detail.php?id=<?=$arElement['ID']?>" id="<?=$arElement["ID"]?>" target="_blank"><h3><?=$arElement['PROPERTY_60']?></h3></a>
                        <div><b>Адрес: </b><?=$arElement["PROPERTY_63"]?></div><br />
                    </li>
                    <?
                    $shop_counter++;
                }
				?></ol><?
            }
        }
        ?>
        </td>
    </tr>
</table>
</div>
