<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><div>
<h1><?=ucfirst($arResult["NAME"])?></h1>
<noindex><div style="margin:10px 0 0 0;"><strong>Внимание (!)</strong> Цены на сайте могут отличаться от действующих.<br />
Точную цену товара узнавайте в магазинах или уточняйте по телефону <strong>(495) 777-8-999.</strong></div></noindex>
<table style="width:100%;">
	<tr>
    	<?if(is_array($arResult["PREVIEW_PICTURE"]) || is_array($arResult["DETAIL_PICTURE"])):?>
			<td style="width:339px; padding:10px 0 0 0;" valign="top">
				<?if(is_array($arResult["DETAIL_PICTURE"])):?>
					<img border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
				<?elseif(is_array($arResult["PREVIEW_PICTURE"])):?>
					<img border="0" src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arResult["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arResult["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
				<?endif?>
			</td>
		<?endif;?>
        <td valign="top" style="width:auto; padding:30px 0 0 30px;">
        <?
		 if (strlen($arResult["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]) > 0)
		 {
			 echo '<div style="font-size:12px; margin:3px 0 0 0;"><strong>'.strip_tags($arResult["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]).'</strong></div>';
		 }
		 if (strlen($arResult["DISPLAY_PROPERTIES"]["col_model_code"]["VALUE"]) > 0)
		 {
			 echo '<div style="font-size:11px; margin:7px 0 0 0;">'.strip_tags($arResult["DISPLAY_PROPERTIES"]["col_model_code"]["VALUE"]).'</div>';
		 }
         if (intval($arResult["DISPLAY_PROPERTIES"]["col_price"]["VALUE"]) > 0)
		 {
			 echo '<div style="font-size:24px; font-weight:bold; margin:7px 0 0 0;" class="snq_color">'.number_format($arResult["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')." Р</div>";
		 }
		?>
          <br>
          <script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
          <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="button" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir"></div> 

        </td>
    </tr>
</table>

</div>