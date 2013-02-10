<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
  <?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
	<article>
		<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
			<span class="photo">
				<span class="cell">
					<!--[if lte IE 7]><span><span><![endif]-->
					<? if(is_array($arElement['PREVIEW_PICTURE'])):?>
						<img width="<?=$arElement["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arElement["PREVIEW_PICTURE"]["HEIGHT"]?>" alt=" " src="<?$arElement["PREVIEW_PICTURE"]["SRC"]?>"></img>
					<?elseif(is_array($arElement['DETAIL_PICTURE'])):?>
						<img width="<?=$arElement["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arElement["DETAIL_PICTURE"]["HEIGHT"]?>" alt=" " src="<?$arElement["DETAIL_PICTURE"]["SRC"]?>"></img>
					<?endif?>
      		<!--[if lte IE 7]></span></span><![endif]-->
				</span>
			</span>
			<!-- end .photo -->
			<span class="text">
				<span class="name">
				<?=strip_tags($arElement['DISPLAY_PROPERTIES']['col_brand']['DISPLAY_VALUE']);?>
				</span>
				<?=$arElement['PROPERTIES']['col_title']['VALUE']?>
			</span>
			<!-- end .text -->
			<?if(is_array($arElement['PROPERTIES']['col_price_new'])):?>
			<span class="price bg-red">
				<?=$arElement['PROPERTIES']['col_price_new']['VALUE']?>
				<del>
					<?=$arElement['PROPERTIES']['col_price']['VALUE']?>
				</del>
			<?else:?>
			<span class="price">
				<?$arElement['PROPERTIES']['col_price']['VALUE']?>
			<?endif?>
			</span>
      <!-- end .price-->
		</a>
	</article>
	<!-- end .article -->
<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
