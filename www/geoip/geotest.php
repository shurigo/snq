<?
  require($_SERVER['DOCUMENT_ROOT'].'/geoip/geo.php');
  $geo = new Geo();
  $city = $geo->get_value('city');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <body>
    <pre>IP: <? echo $geo->ip;?></pre>
    <pre>City: <? echo $city ?></pre>
  </body>
</html>
