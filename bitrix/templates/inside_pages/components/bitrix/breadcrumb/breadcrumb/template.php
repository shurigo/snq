<?
  if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

  if(empty($arResult))
	return "";

  $strReturn = '<a href="/" rel="nofollow">�������</a> / ';
  for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
  {
  	  if($index > 0)
		$strReturn .= ' / ';

	  $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	  if($arResult[$index]["LINK"] <> CMain::GetCurDir())
		$strReturn .= '<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" '.($str=($index < 1)?('rel="nofollow"'):('')).'>'.$title.'</a>';
	  else
		$strReturn .= '<h1 class="nav">'.$title.'</h1>';
  }

  $strReturn = "<nav class=\"path\">".$strReturn."</nav> <!-- end .path-->";
  return $strReturn;
?>
