<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h2 style="margin-top:0;"><?=$arResult["NAME"]?></h2>
<script>
function showVacancy(param1, param2)
{
	var cities = document.getElementById(param1);
	var cities_childs = cities.childNodes;
	//alert(cities_childs[3].tagName);
	var i = 0;
	for (i = 0; i < cities_childs.length; i++)
	{
		if (cities_childs[i].tagName == "div" || cities_childs[i].tagName == "DIV")
		{
			if (cities_childs[i].id == param2)
			{
				cities_childs[i].style.display = "block";
			}
			else
			{
				cities_childs[i].style.display = "none";
			}
		}
	}
	return false;
}
</script>

<div id="allVacancies">
<?
$cnt = 0;
foreach($arResult["ITEMS"] as $cell=>$arElement):?>
    <p><a href="" style="font-size:14px;" onclick="showVacancy('allVacancies', 'vacancy<?=$arElement["ID"]?>'); return false;"><?=$arElement["NAME"]?></a></p>
    <div id="vacancy<?=$arElement["ID"]?>" style="display:<?=($cnt == 0)?'block':'none';?>;"><?=$arElement["PREVIEW_TEXT"]?></div>
<?
$cnt++;
endforeach; // foreach($arResult["ITEMS"] as $arElement):?>
</div>