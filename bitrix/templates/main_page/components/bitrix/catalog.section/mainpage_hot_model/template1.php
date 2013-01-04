<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
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
                    	<div style="font-size:14px; font-weight:bold; color:#00244f; margin:30px 0 0 0;"><?
							$arElement["NAME"][0] = mb_strtoupper($arElement["NAME"][0], "windows-1251");
							echo $arElement["NAME"];
						?></div>
                        <?
						if (strlen($arElement["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]) > 0)
						{
							?><div style="padding:3px 0 0 0; font-size:11px; font-weight:bold; color:#00244f;"><?=strip_tags($arElement["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"])?></div><?
						}
						?>
                        <div class="price_block">
                        	<div style="position:relative;"><div style="position:absolute; top:-5px; left:20px;"><img src="/images/price_block/arrow.png" width="17" height="6" /></div></div>
                            <table style="width:auto;">
                                <tr>
                                    <td class="left_top"></td>
                                    <td class="top"></td>
                                    <td class="right_top"></td>
                                </tr>
                                <tr>
                                    <td class="left"></td>
                                    <td class="center"><?
                                        if (intval($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"]) > 0)
                                        {
                                            ?><?=number_format($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')?> руб.<?
                                        }
                                    ?></td>
                                    <td class="right"></td>
                                </tr>
                                <tr>
                                    <td class="left_bot"></td>
                                    <td class="bot"></td>
                                    <td class="right_bot"></td>
                                </tr>
                            </table>
                        </div>
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