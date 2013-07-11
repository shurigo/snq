<?
function writeToLogFile($file_name, $text, $color="black", $writeToFile)
{
	if ($writeToFile)
	{
		$text = "<span style=\"color:".$color.";\">(".date("d.m.Y H:i:s").") ".$text."</span><br>\n";
		file_put_contents($file_name, $text, FILE_APPEND);
	}
}
?>
