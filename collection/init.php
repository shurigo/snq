<?
  // output JSON?
	$json = "n"; // default
	if(isset($_GET['json'])) {
    if(in_array(strtolower($_GET['json']), array('y', 'n'))) {
		  $json = strtolower($_GET['json']);
		}
	}
  // sort field selector
  $sort_field = 'sort';
  $sort_order = 'asc';
	if(isset($_GET['sort'])){
		if($_GET['sort'] == 'sort') { $sort_field = 'sort'; $sort_order = 'asc'; }
		if($_GET['sort'] == 'price_asc') { $sort_field = 'property_col_price'; $sort_order = 'asc'; }
		if($_GET['sort'] == 'price_desc') { $sort_field = 'property_col_price'; $sort_order = 'desc'; }
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
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
  $APPLICATION->SetTitle("Коллекция");

  $_POST['component_url']=$APPLICATION->GetCurPage(true);
  $url_array = explode("/", $APPLICATION->GetCurPage());

  // Collection root undefined -> redirect to Woman collection
  if($url_array[1] == 'collection' && empty($url_array[2])) {
    LocalRedirect('/collection/woman/', true);
	}
?>
