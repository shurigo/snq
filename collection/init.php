<?
	// Function for basic field validation (present and neither empty nor only white space
	if(!function_exists('IsNullOrEmptyString')) {
		function IsNullOrEmptyString($question){
			return (!isset($question) || trim($question)==='');
		}
	}
  // output JSON?
	$json = "n"; // default
	if(isset($_GET['json'])) {
    if(in_array(strtolower($_GET['json']), array('y', 'n'))) {
		  $json = strtolower($_GET['json']);
		}
	}
  // sort field selector
  $url_array = explode("/", $APPLICATION->GetCurPage());
  //$category_price_sort_array=array('wdress','mskincoat','wskincoat','wmink','wfox','wkarakul','wrabbit','wfurvest','wfurother','wfurs','wpaddedcoat','wtopjacket','mpaddedcoat','mtopjacket');
  $category_price_sort_array=array('wfurs_bestsell','wmink','wfox','wkarakul','wrabbit','wfurvest','wfurother','wfurs');
  $category_show_banner=array('wfurs_bestsell');
  $category_show_banner2=array('wmink','wfox','wkarakul','wrabbit','wfurvest','wfurother','wfurs','wskincoat','wpaddedcoat','mskincoat','mpaddedcoat');

  /*
  if (in_array($url_array[2], $category_show_banner))
  echo '<div style="padding:0 0 5px 0;"><img src="/images/banners/banner_from_15_to_31_july.jpg" alt="" border="0"></div>';

  if (in_array($url_array[2], $category_show_banner2))
  echo '<div style="padding:0 0 5px 0;"><img src="/images/banners/banner_furs_autumn-winter_14_15.jpg" alt="" border="0"></div>';
  */
  
  if(isset($_GET['sort']))
  {
		if($_GET['sort'] == 'sort') { $sort_field = 'sort'; $sort_order = 'asc'; }
		if($_GET['sort'] == 'price_asc') { $sort_field = 'property_col_price'; $sort_order = 'asc'; }
		if($_GET['sort'] == 'price_desc') { $sort_field = 'property_col_price'; $sort_order = 'desc'; }
	}
  else
  {
    $sort_field = 'sort';
    $sort_order = 'asc';
  }
  //if ((!isset($_GET['sort']) || $_GET['sort'] == 'sort') && in_array($url_array[2], $category_price_sort_array)) {
// always sort by price_asc
  $default_sort = array('woman','man');
  if ((!isset($_GET['sort']) || $_GET['sort'] == 'sort') && !in_array($url_array[2], $default_sort)) {
		$sort_field = 'property_col_price';
    $_GET['sort'] = 'price_asc';
    $sort_order = 'asc';
  }
	// output JSON
	if($json=="y") {
		while (ob_get_level()) {
			ob_end_clean();
		}
		ob_start();
		header("Content-Type: application/json");
		include $_SERVER['DOCUMENT_ROOT'].'/collection/index_json.php';
		$buf = ob_get_clean();
		if(IsNullOrEmptyString($buf)) { // has data?
			$flag = 'false';
		} else {
			$flag = 'true';
		}
		ob_start();
		echo '{
						"data": {
							"next": '.$flag.',
							"html":';
		echo json_encode(iconv('cp1251', 'utf-8',($buf))); //utf8_encode() incorrectly converts cyrillic symbols
		echo '}}';
		exit;
  } // if($json=="y")
?>
