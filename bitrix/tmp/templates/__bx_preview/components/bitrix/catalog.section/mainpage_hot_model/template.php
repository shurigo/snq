<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
<div style="width:100%; text-align:center; padding:11px 0 0 0;">
<div align="center"><table>
    <tr>
        <?if(is_array($arElement["PREVIEW_PICTURE"])):?>
            <td valign="top"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><img src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arElement["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arElement["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" style="border:3px solid #f0f0f0;" /></a></td>
        <?endif?>
    </tr>
    <?
    if (intval($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"]) > 0)
	{
		?>
        <tr>
        	<td><div style="position:relative;"><div style="position:absolute; width:103px; height:33px; background:url(/images/price_label.gif) no-repeat; font-size:14px; font-weight:bold; color:#ffffff; text-align:left; padding:11px 0 0 8px; top:-18px; left:<?=($arElement["PREVIEW_PICTURE"]["WIDTH"] + 14 - 103)?>px;"><?=number_format($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')?> Ð</div></div></td>
    	</tr>
		<?
	}
	?>
    <tr>
        <td style="padding:24px 0 0 0;">
            <div style="font-size:14px; font-weight:bold; color:#00244f;"><?=$arElement["NAME"]?></div>
            <?
            if (strlen($arElement["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]) > 0)
			{
				?><div style="padding:3px 0 0 0;"><?=strip_tags($arElement["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"])?></div><?
			}
			?>
        </td>
    </tr>
</table>
</div></div>
<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>