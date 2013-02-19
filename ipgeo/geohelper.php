<?
  include($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
  include($_SERVER['DOCUMENT_ROOT'].'/ipgeo/common.php');

  function get_my_city () {
   //echo 'point1';
    include($_SERVER['DOCUMENT_ROOT'].'/ipgeo/geo.php');

	$def_id = 2097; $def_name = 'Москва';
	if(!CModule::IncludeModule('iblock')) return $res_default;
	$geo = new Geo();
	$ip = $geo->get_ip();
	//$ip = '95.24.22.7';// ??????
	//$ip = '195.224.222.227'; // ?? ??????
	//$ip = '217.199.218.0'; // ?????
	//$ip = '217.149.188.152'; // ?????????
    //$ip = '178.76.244.98';// ??????


	//echo 'point2';
	if(empty($ip)) return $def_id;

	//echo 'point3';

	$ip_long = ip2long($ip);
	// convert negative values to positive

	//echo "before:".$ip_long;

	if($ip_long < 0) $ip_long = 4294967296 + $ip_long;

    //echo "after:".$ip_long;

	$filter = Array(
	  'IBLOCK_ID' => 14,
	 /* 'IBLOCK_ACTIVE' => 'Y',
	  'ACTIVE_DATE' => 'Y',
	  'ACTIVE' => 'Y',
	  'CHECK_PERMISSIONS' => 'Y',
	  'ACTIVE' => 'Y', */
	  'PROPERTY' => Array('<=col_range_start' => $ip_long, '>=col_range_end' => $ip_long)
	);
	$select = Array('ID', 'NAME', 'IBLOCK_ID','col_city_id', 'col_range_end', 'col_range_end');
	// find a city by IP range
	$elements = CIBlockElement::GetList(
	  Array(),
	  $filter,
	  false,
	  false,
	  $select
	);
	$element = $elements->GetNextElement();
	//echo "end:".$ip_long;

	//echo 'point4';
	if(!$element) return $def_id;
	$props = $element->GetProperties();

	//echo "props:".print_r($props);

	$city_id = $props['col_city_id']['VALUE'][0];
	//echo 'point5';

	//echo "city_id:".$city_id;

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
    //echo 'point6';
	if(!$element) return $def_id;
	$fields = $element->GetFields();
	$cities = get_available_cities();
	//echo 'point7';
	if(!in_multiarray($fields['NAME'], $cities)) {
			$_SESSION['city_id'] = $def_id;
			$_SESSION['city_name'] = $def_name;
			return $res_default;
	}
	$_SESSION['city_id'] = $fields['XML_ID'];
	$_SESSION['city_name'] = $fields['NAME'];

	//echo "city".$_SESSION['city_id'];

    //echo 'point8';

	return $_SESSION['city_id'];
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
      $ret[] = Array($section['NAME'], $section['ID']);
    }
    return $ret;
  }

  function print_city_option_html() {
 		$cities = get_available_cities();
//		if(!in_multiarray($_SESSION['city_name'], $cities)) {
//		  $this->override_city(2097, 'Москва');
//		}
		$all_cities['XML_ID'] = array();
		$all_cities['NAME'] = array();

		$filter = Array(
	  		'IBLOCK_ID' => 13,
		  'ACTIVE' => 'Y');
		$select = Array('ID', 'NAME', 'IBLOCK_ID', 'XML_ID');
	$elements = CIBlockElement::GetList(
	  Array(),
	  $filter,
	  false,
	  false,
	  array()
	);

	    while($element = $elements->GetNextElement()) {
		$fields = $element->GetFields();
        array_push($all_cities['XML_ID'],$fields['XML_ID']);
	    array_push($all_cities['NAME'],$fields['NAME']);
	}
	//print_r($all_cities['NAME']);
	//print_r($all_cities['XML_ID']);
	//echo "test=".$all_cities['XML_ID'][5];
   	foreach($cities as $c) {
   		//echo 'c[0]='.$c[0];
		$k = array_search($c[0], $all_cities['NAME']);
		//echo 'k='.$k."<br>";
		$xml_id = $all_cities['XML_ID'][IntVal($k)];

		//print_r($all_cities['XML_ID']);

		//echo $xml_id;
	    echo '<option value="'.$xml_id.'"'.($xml_id == $_SESSION['city_id'] ? ' selected':'').'>'.$c[0].'</option>';
	}
  }

  function override_city($id, $newcity) {
		$_SESSION['city_id'] = $id;
		$_SESSION['city_name'] = $newcity;
	}
?>
