<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
//echo "<pre>"; print_r($arResult); echo "</pre>";
?>
<?if (!empty($arResult)):?>
<table align="right">
	<tr>
<?foreach($arResult as $arItem):?>
        <td style="padding:0 0 0 17px;"><a href="<?=$arItem["LINK"]?>"><img src="/images/mainmenu/<?=$arItem["PARAMS"]["code"]?>.jpg" height="11" alt="<?=$arItem["TEXT"]?>" title="<?=$arItem["TEXT"]?>" /></a></td>
<?endforeach?>
</tr>
</table>
<?endif?>