<?
	global $DBType; $DBType = 'mysql';
  //require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'bitrix/header.php');
?>	
<div id="content">
		<?=$content; ?>
	</div>
<?
	require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog.php');
?>
