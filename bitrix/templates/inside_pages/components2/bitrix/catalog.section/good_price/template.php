<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="catalog-section">

<?
if (strlen($arResult["DESCRIPTION"]) > 0)
{
	echo $arResult["DESCRIPTION"];
}
?>

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?
//echo "<pre>"; print_r($arResult); echo "</pre>";
?>

<table>
		<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>

		<?if($cell%$arParams["LINE_ELEMENT_COUNT"] == 0):?>
		<tr>
		<?else:?>
		<td class="space"></td>
		<?endif;?>
		<td class="cat-elem" valign="top">
        	<?
            //echo "<pre>"; print_r($arElement); echo "</pre>";
            if(is_array($arElement["PREVIEW_PICTURE"]))
			{
				$image_width_changed = 0;
				$image_height_changed = 0;
				if ($arElement["PREVIEW_PICTURE"]["WIDTH"] > 215) 
				{
					$image_width = 215;
					$image_width_changed = 1;
				}
				else
				{
					$image_width = $arElement["PREVIEW_PICTURE"]["WIDTH"];
				}
				if ($arElement["PREVIEW_PICTURE"]["HEIGHT"] > 304) 
				{
					$image_height = 304;
					$image_height_changed = 1;
				}
				else
				{
					$image_height = $arElement["PREVIEW_PICTURE"]["HEIGHT"];
				}
	            ?>
                <div class="cat_elem" style="height:304px;"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><img src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" <?=($image_width_changed)?'width="'.$image_width.'"':"";?> <?=($image_height_changed)?'height="'.$image_height.'"':"";?>  class="cat_elem" alt="<?=$arElement["NAME"]?>"<?=($image_height)?' style="margin:'.round((304-$image_height)/2).'px 0 0 0;"':"";?> /></a></div>
				<?
			}
			 ?>
             <?
             if (intval($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"]) > 0)
			 {
				 echo '<div align="right" style="font-size:14px; font-weight:bold; margin:7px 0 0 0;" class="snq_color">'.number_format($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')." Р</div>";
			 }
			 ?>
             <div style="font-size:14px; font-weight:bold; margin:7px 0 0 0;" class="snq_color"><?=$arElement["NAME"]?></div>
             <?
             if (strlen($arElement["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]) > 0)
			 {
				 echo '<div style="font-size:12px; margin:3px 0 0 0;">'.strip_tags($arElement["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]).'</div>';
			 }
             if (strlen($arElement["DISPLAY_PROPERTIES"]["col_model_code"]["VALUE"]) > 0)
			 {
				 echo '<div style="font-size:11px; margin:7px 0 0 0;">'.strip_tags($arElement["DISPLAY_PROPERTIES"]["col_model_code"]["VALUE"]).'</div>';
			 }
             /*if($arParams["DISPLAY_COMPARE"])
             {
				 echo '<noindex><div style="margin:10px 0 0 0;"><a href="'.$arElement["COMPARE_URL"].'" rel="nofollow" style="font-size:11px;">Выбрать для сравнения</a></div></noindex>';
			 }*/
			 ?>
        </td>
        

		<?$cell++;
		if($cell%$arParams["LINE_ELEMENT_COUNT"] == 0):?>
			</tr>
		<?endif?>

		<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>

		<?if($cell%$arParams["LINE_ELEMENT_COUNT"] != 0):?>
			<?while(($cell++)%$arParams["LINE_ELEMENT_COUNT"] != 0):?>
				<td>&nbsp;</td>
			<?endwhile;?>
			</tr>
		<?endif?>

</table>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>