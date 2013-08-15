<?
  require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
	if(!empty($_GET['d'])) {
		if(strtolower($_GET['d'])==='y') {
			$_SESSION['discount_only'] = 'Y';
		} else {
    	$_SESSION['discount_only'] = 'N';
		}
	}

?>
