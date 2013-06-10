<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="ymaps-map-id_133707667107155769727" style="width: 998px; height: 400px;"></div>
  <div style="width: 998px; text-align: right;"><a href="http://api.yandex.ru/maps/tools/constructor/?lang=ru-RU" target="_blank" style="color: #191a1e; font: 13px Arial,Helvetica,sans-serif;"></a></div>
  <script type="text/javascript" src="http://api-maps.yandex.ru/2.0/?coordorder=longlat&load=package.full&wizard=constructor&lang=ru-RU&onload=fid_133707667107155769727"></script>
  <div id="cities">
  <script type="text/javascript">
    function fid_133707667107155769727(ymaps) {
      var map = new ymaps.Map(
        "ymaps-map-id_133707667107155769727", {
          center: [106.905535,60.815115],
          zoom: 3,
          type: "yandex#map"});
      map.controls
        .add("zoomControl")
        .add("mapTools")
        .add(new ymaps.control.TypeSelector(["yandex#map", "yandex#satellite", "yandex#hybrid", "yandex#publicMap"]));
  <?foreach($arResult as $city):?>
  <?if (is_array($city["ITEMS"]) && count($city["ITEMS"]) > 0):?>
  <?$pm_name='pm_'.$city['ID'];?>
      var <?=$pm_name?>=new ymaps.Placemark([<?=$city["UF_MAP_COORDINATE"]?>], {
        balloonContent:'<strong>Вакансии в г.<?=$city['NAME']?>:</strong><br/><?foreach($city['ITEMS'] as $vacancy):?><a href="/about/vacancies/detail.php?id=<?=$vacancy['ID']?>&c=<?=$city['ID']?>"><?=$vacancy['NAME']?></a><br/><?endforeach;?>',
        iconContent:<?=count($city['ITEMS'])?>,
        zIndexHover:<?=$city['SORT']?>
      });
      map.geoObjects.add(<?=$pm_name?>);
  <?endif;?>
  <?endforeach;?>
    }
  </script>
</div>