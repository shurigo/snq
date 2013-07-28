<?
  spl_autoload_register('__autoload');

  define("PREFIX_PATH_404", "/404.php");
	function getIblockIdByName($iblock_name) {
		$iblocks = CIBlock::GetList(array(), array('CODE' => $iblock_name, 'CHECK_PERMISSIONS' => 'N'), false);
		if($iblock = $iblocks->Fetch()) {
			return $iblock['ID'];
		}
		return -1;
	}

  AddEventHandler("main", "OnAfterEpilog", "Prefix_FunctionName");

  function Prefix_FunctionName() {
    global $APPLICATION;
    $path = explode('/', $APPLICATION->GetCurPage());
    if($APPLICATION->GetCurPage() === '/services/coupon/') {
      LocalRedirect('/404.php', true, '404 Not Found');
      exit();
    }
		
    while ("" === end($path)) { 
      array_pop($path); 
    }

    array_pop($path);
    $redirect_url = '/404.php';
    if(!empty($path)) {
      $redirect_url = implode('/', $path).'/';
    }

    // Check if we need to show the content of the 404 page
    if (!defined('ERROR_404') || ERROR_404 != 'Y') {
      return;
    }
    
    // Display the 404 page unless it is already being displayed
    if ($APPLICATION->GetCurPage() != PREFIX_PATH_404) {
      LocalRedirect($redirect_url, false, '301 Moved permanently');
      header('X-Accel-Redirect: '.$redirect_url);
      exit();
    }
  }
?>
