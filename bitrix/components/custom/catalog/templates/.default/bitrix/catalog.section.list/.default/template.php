<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<ul class="side-menu">
<?
  $CURRENT_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"] + 1;
  foreach($arResult["SECTIONS"] as $arSection):
    if($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"])
      echo "<ul>";
    elseif($CURRENT_DEPTH > $arSection["DEPTH_LEVEL"])
     echo str_repeat("</ul>", $CURRENT_DEPTH - $arSection["DEPTH_LEVEL"]);
    
    $CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
?>
    <li><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a></li>
<?endforeach?>
  </ul>
</ul>
<!-- end .side-menu-->
