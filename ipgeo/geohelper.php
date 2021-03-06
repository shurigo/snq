<?
  require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
  include($_SERVER['DOCUMENT_ROOT'].'/ipgeo/common.php');
  require_once($_SERVER['DOCUMENT_ROOT'].'/ipgeo/geo.php');

  if(!function_exists('set_def_city')) {
    function set_def_city() {
      $_SESSION['city_id'] = 2097;
      $_SESSION['city_name'] = '������, ��';
    }
  }

  if(!function_exists('get_my_city')) {
    function get_my_city () {
      if(!CModule::IncludeModule('iblock')) { set_def_city(); return; }
      $geo = new Geo();
      $ip = $geo->get_ip();
      //$ip = '95.24.22.7';// ??????
      //$ip = '195.224.222.227'; // ?? ??????
      //$ip = '217.199.218.0'; // ?????
      //$ip = '217.149.188.152'; // ?????????
      //$ip = '178.76.244.98';// ??????

      if(empty($ip)) { set_def_city(); return; }

      $ip_long = ip2long($ip);
      // convert negative values to positive
      if($ip_long < 0) $ip_long = 4294967296 + $ip_long;

      $filter = Array(
        'IBLOCK_ID' => 14,
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

      if(!$element) { set_def_city(); return; }
      $props = $element->GetProperties();

      $city_id = $props['col_city_id']['VALUE'][0];

      if(empty($city_id) || !is_numeric($city_id)) { set_def_city(); return; }
      $filter = Array(
        'IBLOCK_ID' => 13,
        'ACTIVE' => 'Y',
        'XML_ID' => IntVal($city_id));
      $select = Array('ID', 'NAME', 'IBLOCK_ID', 'XML_ID');
      $elements = CIBlockElement::GetList(
        Array(),
        $filter,
        false,
        false,
        array()
      );
      $element = $elements->GetNextElement();
      if(!$element) { set_def_city(); return; }
      $fields = $element->GetFields();
      $cities = get_available_cities();
      if(!in_multiarray($fields['NAME'], $cities)) { set_def_city(); return; }
      $_SESSION['city_id'] = $fields['XML_ID'];
      $_SESSION['city_name'] = iconv('utf-8', 'cp1251', $fields['NAME']);
    }
  }

  if(!function_exists('get_available_cities')) { 
    function get_available_cities() {
      if(!CModule::IncludeModule('iblock')) return Array();
      $filter = Array(
        'IBLOCK_ID' => 7, //our shops
        'ACTIVE' => 'Y',
      );
      $sort = Array('SORT' => 'ASC');
      $sections = CIBlockSection::GetList($sort, $filter, false, array(), false);
      $ret = Array();
      while($section = $sections->GetNext()) {
        $ret[] = Array($section['NAME'], $section['ID']);
      }  
      return $ret;
    }
  }

	if(!function_exists('get_city_by_name')) {
		function get_city_by_name($name, $iblock_id = 7) {
			$default_ret = 16;
			if(!CModule::IncludeModule('iblock')) return $default_ret;
			$filter = Array(
				'IBLOCK_ID' => $iblock_id,
				'NAME' => $name
			);
			$sections = CIBlockSection::GetList($sort, $filter, false, array('ID', 'IBLOCK_ID'), false);
			$section = $sections->GetNext();
			return $section ? $section['ID'] : $default_ret;
		}
	}

	if(!function_exists('print_city_option_html')) {
    function print_city_option_html() {
 		  $cities = get_available_cities();
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
	  		$select
			);

	    while($element = $elements->GetNextElement()) {
				$fields = $element->GetFields();
        $all_cities['XML_ID'][] = $fields['XML_ID'];
	    	$all_cities['NAME'][] = $fields['NAME'];
			}
   		
			foreach($cities as $c) {
				$k = array_search($c[0], $all_cities['NAME']);
				$xml_id = $all_cities['XML_ID'][IntVal($k)];
	    	echo '<option value="'.$xml_id.'"'.($xml_id == $_SESSION['city_id'] ? ' selected':'').'>'.$c[0].'</option>';
			}
		}
  }

	if(!function_exists('override_city')) {
  	function override_city($id, $newcity) {
			$_SESSION['city_id'] = $id;
			$_SESSION['city_name'] = iconv('utf-8', 'cp1251', $newcity);
		}
	}
?>
