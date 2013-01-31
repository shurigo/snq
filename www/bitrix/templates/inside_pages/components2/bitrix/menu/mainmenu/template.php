<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?if (!empty($arResult)):?>
<table align="right">
	<tr>
<?foreach($arResult as $arItem):?>
        <td class="menu_item"><a href="<?=$arItem["LINK"]?>" rel="nofollow"><img src="/images/mainmenu/<?=$arItem["PARAMS"]["code"]?>.jpg" height="11" alt="<?=$arItem["TEXT"]?>" /></a></td>
<?endforeach?>
</tr>
<tr><td colspan="4" align="right"><br><span style="font-size: 14px;">(495)</span><span style="font-size: 24px; color: rgb(0, 36, 79);">777-8-999</span></td></tr>
</table>
<?endif?>