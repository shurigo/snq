<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><div style="margin:45px;">
<h1><?
	$arResult["NAME"][0] = mb_strtoupper($arResult["NAME"][0], "windows-1251");
	echo $arResult["NAME"];
?></h1>
<table style="width:100%;">
	<tr>
    	<td style="width:206px; vertical-align:top;">
        	<?
			$APPLICATION->IncludeComponent(
				"custom:catalog.section.list",
				"collection_mainpage",
				Array(
					"IBLOCK_TYPE" => "collection",
					"IBLOCK_ID" => 1,
					"SECTION_ID" => $arResult["IBLOCK_SECTION_ID"],
					"DISPLAY_PANEL" => "N",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "3600",
					"CACHE_GROUPS" => "Y",
					"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				)
			);?>
        </td>
        <td style="width:auto; vertical-align:top; padding:0 0 0 23px;">
            <table style="width:100%;">
                <tr>
                    <?if(is_array($arResult["PREVIEW_PICTURE"]) || is_array($arResult["DETAIL_PICTURE"])):?>
                        <td style="width:339px; padding:10px 0 0 0;" valign="top">
                            <div style="width:339px; float:left;">
                                <div class="clearfix" id="content">
                                    <div class="clearfix">
                                    	<div style="position:relative; display:block;" id="jqzoom_icon"><div style="position:absolute; z-index:100; left:284px; top:5px;"><img src="/images/icons/zoom.png" width="46" height="46" /></div></div>
                                        <a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="jqzoom" rel='gal1' title="<?=$arResult["NAME"]?><?=(strlen($arResult["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]) > 0)?" ".strip_tags($arResult["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]):"";?>"><img style="width: auto!important; width: 330px; max-width: 330px;" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" title="<?=$arResult["NAME"]?><?=(strlen($arResult["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]) > 0)?" ".strip_tags($arResult["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]):"";?>" alt="<?=$arResult["NAME"]?><?=(strlen($arResult["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]) > 0)?" ".strip_tags($arResult["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]):"";?>" /></a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    <?endif;?>
                    <td valign="top" style="width:auto; padding:30px 0 0 30px;">
                        <?
                            if (strlen($arResult["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]) > 0)
                            {
								echo '<div style="font-size:14px; margin:3px 0 0 0;"><strong>'.strip_tags($arResult["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]).'</strong></div>';
                            }
                            if (strlen($arResult["DISPLAY_PROPERTIES"]["col_model_code"]["VALUE"]) > 0)
                            {
								echo '<div style="font-size:11px; margin:7px 0 0 0;">'.strip_tags($arResult["DISPLAY_PROPERTIES"]["col_model_code"]["VALUE"]).'</div>';
                            }
							if (strlen($arResult["DISPLAY_PROPERTIES"]["col_sizes"]["VALUE"]) > 0)
                            {
								echo '<div style="font-size:11px; margin:7px 0 0 0;">Размеры: '.strip_tags($arResult["DISPLAY_PROPERTIES"]["col_sizes"]["VALUE"]).'</div>';
                            }
							if (intval($arResult["DISPLAY_PROPERTIES"]["col_price_new"]["VALUE"]) > 0)
                            {
								?>
                                <div class="price_block">
                                    <table style="width:auto;">
                                        <tr>
                                            <td></td>
                                            <td>
                                            	<div style="padding:6px 0 0 10px; float:left; width:27px; height:6px;"><img src="/images/price_block/arrow.png" width="17" height="6" /></div>
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
                                            <td class="center"><?=number_format($arResult["DISPLAY_PROPERTIES"]["col_price_new"]["VALUE"], 0, '.', ' ')?> руб.</td>
                                            <td class="right"></td>
                                        </tr>
                                        <tr>
                                            <td class="left_bot"></td>
                                            <td class="bot"></td>
                                            <td class="right_bot"></td>
                                        </tr>
                                        <?
										if (intval($arResult["DISPLAY_PROPERTIES"]["col_price"]["VALUE"]) > 0)
										{
											?>
											<tr>
												<td></td>
												<td style="padding:10px 0 0 0;">
														<div style="font-size:11px; height:12px; color:#2f618c; font-weight:bold;" align="right">Старая цена</div>
														<div align="right"><?=number_format($arResult["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')?> руб.</div>
												</td>
												<td></td>
											</tr>
											<?
										}
										?>
                                    </table>
                                </div>
                             
							 <?
                        	}
							else
                            {
								?>
                                <div class="price_block">
                                    <table style="width:auto;">
                                        <tr>
                                            <td></td>
                                            <td><div style="padding:6px 0 0 10px; float:left; width:27px; height:6px;"><img src="/images/price_block/arrow.png" width="17" height="6" /></div></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="left_top"></td>
                                            <td class="top"></td>
                                            <td class="right_top"></td>
                                        </tr>
                                        <tr>
                                            <td class="left"></td>
                                            <td class="center"><?=number_format($arResult["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')?> руб.</td>
                                            <td class="right"></td>
                                        </tr>
                                        <tr>
                                            <td class="left_bot"></td>
                                            <td class="bot"></td>
                                            <td class="right_bot"></td>
                                        </tr>
                                    </table>
                                </div>
                             
							 <?
                        	}
                            
							
							
                        ?><br><br>
                        <noindex><table class="grey_table">
                            <tr>
                                <td class="left_top"></td>
                                <td class="top"></td>
                                <td class="right_top"></td>
                            </tr>
                            <tr>
                                <td class="left"></td>
                                <td class="center"><div style="margin:10px 0 0 0;"><strong>Внимание (!)</strong> Цены на сайте могут отличаться от действующих.<br />
Точную цену товара узнавайте в магазинах или уточняйте по телефону <strong>(495) 777-8-999.</strong></div></td>
                                <td class="right"></td>
                            </tr>
                            <tr>
                                <td class="left_bot"></td>
                                <td class="bot"></td>
                                <td class="right_bot"></td>
                            </tr>
                        </table></noindex>
                        <br><br><br>
                        <script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
                        <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="button" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir"></div> 
                    </td>
                </tr>
            </table>
		</td>
    </tr>
</table>
</div>