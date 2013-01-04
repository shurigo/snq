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
                            <?if(is_array($arResult["DETAIL_PICTURE"])):?>
                                <img border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="330" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
                            <?elseif(is_array($arResult["PREVIEW_PICTURE"])):?>
                                <img border="0" src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" width="330" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
                            <?endif?>
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
                            if (intval($arResult["DISPLAY_PROPERTIES"]["col_price"]["VALUE"]) > 0)
                            {
								?><div class="price_block">
                                    <table style="width:auto;">
                                        <tr>
                                            <td></td>
                                            <td><div align="left" style="padding:0 0 0 10px;"><img src="/images/price_block/arrow.png" width="17" height="6" /></div></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="left_top"></td>
                                            <td class="top"></td>
                                            <td class="right_top"></td>
                                        </tr>
                                        <tr>
                                            <td class="left"></td>
                                            <td class="center"><?=number_format($arResult["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')?> ���.</td>
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
                                <td class="center"><div style="margin:10px 0 0 0;"><strong>�������� (!)</strong> ���� �� ����� ����� ���������� �� �����������.<br />
������ ���� ������ ��������� � ��������� ��� ��������� �� �������� <strong>(495) 777-8-999.</strong></div></td>
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