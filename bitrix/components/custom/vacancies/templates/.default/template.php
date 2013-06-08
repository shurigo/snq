<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(empty($_GET['ajax'])):?>
<div id="ymaps-map-id_133707667107155769727" style="width: 998px; height: 400px;"></div>
<div style="width: 998px; text-align: right;"><a href="http://api.yandex.ru/maps/tools/constructor/?lang=ru-RU" target="_blank" style="color: #191a1e; font: 13px Arial,Helvetica,sans-serif;"></a></div>
<script type="text/javascript" src="http://api-maps.yandex.ru/2.0/?coordorder=longlat&load=package.full&wizard=constructor&lang=ru-RU&onload=fid_133707667107155769727"></script>
<div id="cities">
<script type="text/javascript">
  function fid_133707667107155769727(ymaps) {
    var map = new ymaps.Map(
      "ymaps-map-id_133707667107155769727", {
    <?foreach($arResult as $arElement):?>
      <?if($arElement['NAME'] == $_SESSION['city_name']):?>
        center: [<?=$arElement["UF_MAP_COORDINATE"]?>],
      <?endif;?>
    <?endforeach;?>
        zoom: <?=(is_numeric($arCity["UF_MAP_ZOOM"]) && $arCity["UF_MAP_ZOOM"] > 0)?$arCity["UF_MAP_ZOOM"]:8;?>,
        type: "yandex#map"});
    map.controls
      .add("zoomControl")
      .add("mapTools")
      .add(new ymaps.control.TypeSelector(["yandex#map", "yandex#satellite", "yandex#hybrid", "yandex#publicMap"]));
    <?foreach($arResult as $arElement):?>
      <?$pm_name='pm_'.$arElement['ID'];?>
    var <?=$pm_name?>=new ymaps.Placemark([<?=$arElement["UF_MAP_COORDINATE"]?>], {
        balloonContent: "<?=$arElement['NAME']?>"
      });
    <?=$pm_name?>.events.add('click', function() {
      alert('<?=htmlspecialchars($arElement['NAME'])?>');
    });
    map.geoObjects.add(<?=$pm_name?>);
    <?endforeach;?>
  }
</script>
</div>
<?endif;  /* if(empty($_GET['ajax'])) */ ?> 
<script>
  $(function() {
    $('#accordion').accordion({
      heightStyle: "content",
      collapsible: true
    });
  });
</script>
<div id="accordion">
<?foreach($arResult as $arCity):?>
  <?if (is_array($arCity["ITEMS"]) && count($arCity["ITEMS"]) > 0):?>
    <?foreach($arCity["ITEMS"] as $arElement):?>
      <h3><?=$arElement["NAME"]?></h3>
      <div>
        <p><?=$arElement["PREVIEW_TEXT"]?></p>
      </div>
    <?endforeach;?>
  <?endif;?>
<?endforeach;?>
</div>