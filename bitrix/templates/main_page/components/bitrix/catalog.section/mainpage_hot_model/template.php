<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
//echo "<pre>"; print_r($arResult); echo "</pre>";
?>
<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
<table class="white_table">
	<tr>
        <td class="left_top"></td>
        <td class="top"></td>
        <td class="right_top"></td>
    </tr>
    <tr>
        <td class="left"></td>
        <td class="center">
        	<table style="width:100%;">
            	<tr>
                	<td style="width:50%; padding:0 5px 0 0;">
                    	<?if(is_array($arElement["PREVIEW_PICTURE"])):?>
							<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><img src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arElement["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arElement["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" /></a>
        				<?endif?>
                    </td>
                    <td style="width:50%; padding:0 0 0 5px;">
                       	<div class="header">Вещь недели</div>
                    	<div style="font-size:14px; font-weight:bold; color:#000; margin:30px 0 0 0;"><?
							$arElement["NAME"][0] = mb_strtoupper($arElement["NAME"][0], "windows-1251");
							echo $arElement["NAME"];
						?></div>
                        <?
						if (strlen($arElement["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]) > 0)
						{
							?><div style="padding:3px 0 0 0; font-size:11px; font-weight:bold; color:#000;"><?=strip_tags($arElement["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"])?></div><?
						}
						if (intval($arElement["DISPLAY_PROPERTIES"]["col_price_new"]["VALUE"]) > 0)
                         {
                            ?>
                            <noindex>
                            <div class="price_block">
                                <table style="width:auto;">
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div style="padding:6px 0 0 10px; float:left; width:27px; height:6px;"><img src="/images/price_block/arrow.png" width="18" height="6" /></div>
                                            <div style="font-size:11px; float:right; width:67px; height:12px; color:#2f618c; font-weight:bold;">Новая цена</div>
                                            <div class="clear_both"></div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="left_top"></td>
                                        <td class="top"></td>
                                        <td class="right_top"></td>
                                    </tr>
                                    <tr>
                                        <td class="left"></td>
                                        <td class="center"><?=number_format($arElement["DISPLAY_PROPERTIES"]["col_price_new"]["VALUE"], 0, '.', ' ')?> руб.</td>
                                        <td class="right"></td>
                                    </tr>
                                    <tr>
                                        <td class="left_bot"></td>
                                        <td class="bot"></td>
                                        <td class="right_bot"></td>
                                    </tr>
                                    <?
                                    if (intval($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"]) > 0)
                                    {
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td style="text-decoration:line-through; text-align:right; font-size:14px; padding:2px 0 0 0;"><?=number_format($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')?> руб.</td>
                                            <td></td>
                                        </tr>
                                        <?
                                    }
                                    ?>
                                </table>
                            </div>
                            </noindex>
                         <?
                         }
                         else
                         {
                            ?>
                            <noindex>
                            <div class="price_block">
                                <table style="width:auto;">
                                    <tr>
                                        <td></td>
                                        <td class="arrow"><div align="left"><img src="/images/price_block/arrow.png" width="18" height="6" /></div></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="left_top"></td>
                                        <td class="top"></td>
                                        <td class="right_top"></td>
                                    </tr>
                                    <tr>
                                        <td class="left"></td>
                                        <td class="center"><?=number_format($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')?> руб.</td>
                                        <td class="right"></td>
                                    </tr>
                                    <tr>
                                        <td class="left_bot"></td>
                                        <td class="bot"></td>
                                        <td class="right_bot"></td>
                                    </tr>
                                </table>
                            </div>
                            </noindex>
                         <?
                         }
						?>
                    </td>
                </tr>
            </table>
        </td>
        <td class="right"></td>
    </tr>
    <tr>
        <td class="left_bot"></td>
        <td class="bot"></td>
        <td class="right_bot"></td>
    </tr>
</table>
<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>