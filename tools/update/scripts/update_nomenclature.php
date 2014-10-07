<?
	set_time_limit(0);
  require_once('updater.php');

  $_SERVER = array();
  $_SERVER['DOCUMENT_ROOT'] = realpath(dirname(__FILE__).'/../../..');
  require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

  $nomenclature_loader = new NomenclatureLoader(NOMENCLATURE_UPLOAD_FILE, false);
 	$nomenclature_loader->init();
	$nomenclature_loader->load();
?>
