<?
  session_start();
  require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
  require_once($_SERVER['DOCUMENT_ROOT'].'/ipgeo/geo.php');
  require_once($_SERVER['DOCUMENT_ROOT'].'/ipgeo/common.php');

	class geohelper
	{
  public function get_my_city () {
	$def_id = 16; $def_name = 'Москва';
	if(!CModule::IncludeModule('iblock')) return $res_default;
	$geo = new Geo();
	$ip = $geo->get_ip();
	$ip = '95.24.22.7';// ??????
	//$ip = '195.224.222.227'; // ?? ??????
	//$ip = '217.199.218.0'; // ?????
	//$ip = '217.149.188.152'; // ?????????
	if(empty($ip)) return $def_id;
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
	if(!$element) return $def_id;
	$props = $element->GetProperties();
	$city_id = $props['col_city_id']['VALUE'];
	if(empty($city_id) || !is_numeric($city_id)) return $def_id;
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
	if(!$element) return $def_id;
	$fields = $element->GetFields();
	$cities = $this->get_available_cities();
	if(!in_multiarray($fields['NAME'], $cities)) {
			$_SESSION['city_id'] = $def_id;
			$_SESSION['city_name'] = $def_name;
			return $res_default;
	}
	$_SESSION['city_id'] = $fields['XML_ID'];
	$_SESSION['city_name'] = $fields['NAME'];
	return $_SESSION['city_id'];
  }

  public function get_available_cities() {
    if(!CModule::IncludeModule('iblock')) return Array();
    $filter = Array(
      'IBLOCK_ID' => 7, //our shops
       'ACTIVE' => 'Y',
    );
    $sort = Array('NAME' => 'ASC');
    $sections = CIBlockSection::GetList($sort, $filter, false, array(), false);
    $ret = Array();
    while($section = $sections->GetNext()) {
      $ret[] = Array($section['NAME'], $section['ID']);
    }
    return $ret;
  }

  public function print_city_option_html() {
 		$cities = $this->get_available_cities();
		if(!in_multiarray($_SESSION['city_id'], $cities)) {
		  $this->override_city(16, 'Москва');
		}
   	foreach($cities as $c) {
	  echo '<option value="'.$c[1].'"'.($c[1] == $_SESSION['city_id'] ? 'selected="selected"':'').'>'.$c[0].'</option>';
	}
  }

	public function override_city($id, $newcity) {
		$_SESSION['city_id'] = $id;
		$_SESSION['city_name'] = $newcity;
	}
	}
?>
