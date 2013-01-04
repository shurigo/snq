<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?if (!empty($arResult)):?>
<noindex>
<table>
<tr>
<?foreach($arResult as $arItem):?>
        <td class="footer_menu"><a href="<?=$arItem["LINK"]?>" rel="noindex nofollow"><img src="/images/mainmenu_footer/<?=$arItem["PARAMS"]["code"]?>.jpg" alt="<?=$arItem["TEXT"]?>" /></a></td>
<?endforeach?>
</tr>
</table>
</noindex>
<?endif?>