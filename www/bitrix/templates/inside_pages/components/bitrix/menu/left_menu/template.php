<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
//echo "<pre>"; print_r($arResult); echo "</pre>";
?>
<?if (!empty($arResult)):?>
<table>
	
<?foreach($arResult as $arItem):?>
        <tr><td style="padding:6px 0"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></td></tr>
<?endforeach?>

</table>
<?endif?>