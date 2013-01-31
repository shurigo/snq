<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
//echo "<pre>"; print_r($arResult); echo "</pre>";
?>
<?if (!empty($arResult)):?>
<table>
	<tr>
<?foreach($arResult as $arItem):?>
        <td style="padding:0 0 0 30px;"><a href="<?=$arItem["LINK"]?>"><img src="/images/mainmenu_footer/<?=$arItem["PARAMS"]["code"]?>.jpg" alt="<?=$arItem["TEXT"]?>" title="<?=$arItem["TEXT"]?>" /></a></td>
<?endforeach?>
</tr>
</table>
<?endif?>