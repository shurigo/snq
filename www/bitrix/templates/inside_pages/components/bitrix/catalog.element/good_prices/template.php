<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div>
<?
//echo "<pre>"; print_r($arResult); echo "</pre>";
?>
<div style="font-size:24px;"><strong><?=ucfirst($arResult["NAME"])?></strong></div>

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
        </td>
    </tr>
</table>
<div><a href="/actions/1059/">Вернуться к условиям акции</a></div>
</div>
