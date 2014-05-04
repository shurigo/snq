<?
  global $DBType; $DBType = 'mysql';
  $popup = isset($_GET['main']);
	$popup = false; //HACK
	if(!isset($show_header))
	{
		$show_header = true;
	}
	if($show_header):
		require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
		if(isset($title))
    {
      $APPLICATION->SetTitle($title);
		}
?>
	<div id="content">
		<?=$content; ?>
	</div>
	<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog.php');?>
<?else:?>
	<html>
		<head>
			<title><?=$title;?></title>
			<link href="/css/style.css" rel="stylesheet" type="text/css">
		</head>
		<body>
			<?=$content;?>
		</body>
	</html>
<?endif?>
