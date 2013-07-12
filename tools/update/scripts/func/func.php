<?
function writeToLogFile($file_name, $text, $color="black", $writeToFile)
{
	$text = "<span style=\"color:".$color.";\">(".date("d.m.Y H:i:s").") ".$text."</span><br>\n";
	if ($writeToFile)
	{
		file_put_contents($file_name, $text, FILE_APPEND);
	}
        return $text;
}
?>
