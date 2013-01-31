<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<script>
function showCity(param1, param2)
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
<div id="cities">
	<?foreach($arResult["SECTIONS"] as $arSection):?>
		<p><span onclick="javascript:showCity('cities', 'city<?=$arSection["ID"]?>');" style="text-decoration:underline; cursor:pointer;"><?=$arSection["NAME"]?></span></p>
		<div id="city<?=$arSection["ID"]?>" style="padding:0 0 0 16px; display:none;"><?
			foreach($arSection["ITEMS"] as $arElement):
				?>
				<span onclick="javascript:showCity('city<?=$arSection["ID"]?>', 'shop<?=$arElement["ID"]?>');" style="text-decoration:underline; line-height:2; cursor:pointer;"><?=$arElement["NAME"]?></span><br />
				<div id="shop<?=$arElement["ID"]?>" style="display:none;"><p><?=$arElement["PREVIEW_TEXT"]?></div>
				<?
			endforeach; // foreach($arResult["ITEMS"] as $arElement):?>
        </div>
	<?endforeach?>
</div>