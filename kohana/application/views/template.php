<?
  global $DBType; $DBType = 'mysql';
  $popup = isset($_GET['main']);
	if(!$popup) {
		require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
	}
?>
<div id="content">
	<?=$content; ?>
</div>
<?
	if(!$popup) {
		require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog.php');
	}
?>
