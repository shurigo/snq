<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string

//echo "<pre>"; print_r($arResult); echo "</pre>";

if(empty($arResult))
	return "";

$strReturn = '<span><a href="/" rel="nofollow">Главная страница</a></span><span>&nbsp;/&nbsp;</span>';

for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
{
	if($index > 0)
		$strReturn .= '<span>&nbsp;/&nbsp;</span>';

	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($arResult[$index]["LINK"] <> CMain::GetCurDir())
		$strReturn .= '<span><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" rel="nofollow">'.$title.'</a></span>';
	else
		$strReturn .= '<span>'.$title.'</span>';
}

$strReturn = "<noindex><div class='breadcrumb'>".$strReturn."</div></noindex>";
return $strReturn;
?>
