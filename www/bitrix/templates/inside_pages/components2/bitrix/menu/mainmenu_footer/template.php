<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><noindex>
<?if (!empty($arResult)):?>
<div class="footer_menu"><table align="left">
	<tr>
<?foreach($arResult as $arItem):?>
        <td class="footer_menu"><a href="<?=$arItem["LINK"]?>" rel="nofollow"><img src="/images/mainmenu/<?=$arItem["PARAMS"]["code"]?>.jpg" height="11" alt="<?=$arItem["TEXT"]?>" /></a></td>
<?endforeach?>
</tr>
</table></div>
</noindex><?endif?>