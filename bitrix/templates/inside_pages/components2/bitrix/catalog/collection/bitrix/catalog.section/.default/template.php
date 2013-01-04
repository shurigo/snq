<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><div class="catalog-section">
<noindex>
<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
<div style="float: right;" class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="button" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir"></div> 
</noindex>
<h1><?
	$arResult["NAME"][0] = mb_strtoupper($arResult["NAME"][0], "windows-1251");
	echo $arResult["NAME"];
?></h1>
<noindex><div style="margin:0px 0 0 0;">На сайте представлена лишь часть всего ассортимента. Уточняйте цену по телефону (495) 777-8-999.</div></noindex>
<!--
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
-->

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
                <div class="cat_elem"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>" title="<?=$arElement["NAME"]?>"><img src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" <?=($image_width_changed)?'width="'.$image_width.'"':"";?> <?=($image_height_changed)?'height="'.$image_height.'"':"";?>  class="cat_elem" alt="<?=$arElement["NAME"]?>"<?=($image_height)?' style="margin:'.round((304-$image_height)/2).'px 0 0 0;"':"";?> /></a></div>
				<?
			}
			 ?>
             <?
             if (intval($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"]) > 0)
			 {
				 echo '<noindex><div class="cat_elem_price">'.number_format($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')." Р</div></noindex>";
			 }
			 ?>
             <div class="cat_elem_name"><?=$arElement["NAME"]?></div>
             <?
             if (strlen($arElement["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]) > 0)
			 {
				 echo '<noindex><div class="cat_elem_brand">'.strip_tags($arElement["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]).'</div></noindex>';
			 }
             if (strlen($arElement["DISPLAY_PROPERTIES"]["col_model_code"]["VALUE"]) > 0)
			 {
				 echo '<noindex><div class="cat_elem_brand">'.strip_tags($arElement["DISPLAY_PROPERTIES"]["col_model_code"]["VALUE"]).'</div></noindex>';
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
				<td></td>
			<?endwhile;?>
			</tr>
		<?endif?>

</table>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

</div>
<?
if (strlen($arResult["DESCRIPTION"]) > 0 && $APPLICATION->GetCurPageParam() == $arResult["SECTION_PAGE_URL"])
{
	echo $arResult["DESCRIPTION"];
}
?>