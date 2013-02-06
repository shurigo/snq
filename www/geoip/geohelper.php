<?
  require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php'); 
  require_once($_SERVER['DOCUMENT_ROOT'].'/geoip/geo.php'); 

  function get_my_city () {
//	if(isset($_COOKIE['city'])) return $_COOKIE['city'];
    $res_default = implode(' ', Array(2097, 'Москва'));
	if(!CModule::IncludeModule('iblock')) return $res_default;
	$geo = new Geo(); 
	$ip = $geo->get_ip();
	$ip = '95.24.22.7';// Москва
	$ip = '195.224.222.227'; // Не Россия
	$ip = '217.199.218.0'; // Киров
	if(empty($ip)) return $res_default;
	$ip_long = ip2long($ip);
	// convert negative values to positive
	if($ip_long < 0) $ip_long = 4294967296 + $ip_long;
	$filter = Array(
	  'IBLOCK_ID' => 14,
	  'IBLOCK_ACTIVE' => 'Y',
	  'ACTIVE_DATE' => 'Y',
	  'ACTIVE' => 'Y',
	  'CHECK_PERMISSIONS' => 'Y',
	  'ACTIVE' => 'Y',
	  'PROPERTY' => Array('<=col_range_start' => $ip_long, '>=col_range_end' => $ip_long)
	);
	$select = Array('ID', 'NAME', 'IBLOCK_ID');
	// find a city by IP range
	$elements = CIBlockElement::GetList(
	  Array(),
	  $filter, 
	  false,
	  false,
	  $select
	);
	$element = $elements->GetNextElement();
	if(!$element) return $res_default;
	$props = $element->GetProperties();
	$city_id = $props['col_city_id']['VALUE'];
	if(empty($city_id) || !is_numeric($city_id)) return $res_default;		
	$filter = Array(
	  'IBLOCK_ID' => 13,
	  'ACTIVE' => 'Y',
	  'XML_ID' => IntVal($city_id));
	$select = Array('ID', 'NAME', 'IBLOCK_ID');
	$elements = CIBlockElement::GetList(
	  Array(),
	  $filter,
	  false,
	  false,
	  array()
	);
    $element = $elements->GetNextElement();
	if(!$element) return $res_default;
	$fields = $element->GetFields();
	$ret = implode(' ', Array($fields['XML_ID'], $fields['NAME']));
	setcookie('city', $ret, time() + 60 * 60 * 24 * 30);

	return $ret;
  }
	
  function get_available_cities() {
    if(!CModule::IncludeModule('iblock')) return Array();
    $filter = Array(
      'IBLOCK_ID' => 7, //our shops
       'ACTIVE' => 'Y',
    );
    $sort = Array('NAME' => 'ASC');
    $sections = CIBlockSection::GetList($sort, $filter, false, array(), false);
    $ret = Array();
    while($section = $sections->GetNext()) {
      //$ret[$section['NAME']] = $section['ID'];
      $ret[] = Array($section['NAME'], $section['ID']);
    }
    return $ret;
  }
?>
