<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?foreach($arResult["ITEMS"] as $arElement):?>
	<article>
		<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
          <span class="photo"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
          <img src="<?=$arElement["DETAIL_PICTURE"]["SRC"]?>" width="127" height="211" alt=""> <!--[if lte IE 7]></span></span><![endif]--></span></span> <!-- end .photo-->

			<span class="text">
				<span class="name">
				<?=strip_tags($arElement['DISPLAY_PROPERTIES']['col_brand']['DISPLAY_VALUE']);?>
				</span>
				<?=$arElement['NAME']?>
			</span>
			<!-- end .text -->
			<?if(!empty($arElement['PROPERTIES']['col_price_new']['VALUE'])):?>
			<span class="price bg-red">
				<?=number_format($arElement['PROPERTIES']['col_price_new']['VALUE'], 0, '.', ' ').' руб.';?>
				<del>
					<?=number_format($arElement['PROPERTIES']['col_price']['VALUE'], 0, '.', ' ').' руб.';?>
				</del>
			<?else:?>
			<span class="price">
				<?=number_format($arElement['PROPERTIES']['col_price']['VALUE'], 0, '.', ' ').' руб.';?>
			<?endif?>
			</span>
      <!-- end .price-->
		</a>
	</article>
	<!-- end .article -->

<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>