<?
	global $DBType; $DBType = 'mysql';
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>
<div id="content">
		<?= $content; ?>
</div>
<?
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
