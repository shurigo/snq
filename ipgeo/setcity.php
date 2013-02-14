<? session_start(); require_once($_SERVER['DOCUMENT_ROOT'].'/ipgeo/common.php');?>
<? require_once($_SERVER['DOCUMENT_ROOT'].'/ipgeo/geohelper.php');?>
<?
	$geo = new geohelper();
	$geo->override_city($_GET['id'], $_GET['city']);
	echo($_GET['id'].$_GET['city']);
?>
