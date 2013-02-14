<?
  require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php'); 
  require_once($_SERVER['DOCUMENT_ROOT'].'/ipgeo/geo.php'); 
  require_once($_SERVER['DOCUMENT_ROOT'].'/ipgeo/common.php'); 
	
	session_start();

	class geohelper
	{
  public function get_my_city () {
	  if(isset($_SESSION['city'])) return $_SESSION['city'];
    $res_default = implode(' ', Array(105, 'Москва'));
	if(!CModule::IncludeModule('iblock')) return $res_default;
	$geo = new Geo(); 
	$ip = $geo->get_ip();
	$ip = '95.24.22.7';// ??????
	$ip = '195.224.222.227'; // ?? ??????
	$ip = '217.199.218.0'; // ?????
	$ip = '217.149.188.152'; // ?????????
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
	$cities = $this->get_available_cities();
	if(!in_multiarray($fields['NAME'], $cities)) {
			$_SESSION['city'] = $res_default;
			return $res_default;
	}
	$ret = implode(' ', Array($fields['XML_ID'], $fields['NAME']));
	$_SESSION['city'] = $ret;
	return $ret;
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
		$c = explode(' ', $_SESSION['city']);
		$my_city = $c[1];
		if(!in_multiarray($my_city, $cities)) {
		  $this->override_city(105, 'Москва');
		}
   	foreach($cities as $c) {
	  echo '<option value="'.$c[1].'"'.($c[0] == $my_city[1] ? 'selected="selected"':'').'>'.$c[0].'</option>';
	} 
  }

	public function override_city($id, $newcity) {
		$ret = implode(' ', $id, $newcity);
		$_SESSION['city'] = $ret;
	}
	}
?>
