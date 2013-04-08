<br>
<form class="ajax-load" id="filter_form" action="<?=$APPLICATION->GetCurPage()?>">
	<fieldset>
		<section class="filter">
			<div class="hr"></div>
			<label class="label">Бренд</label>
			<div class="checks">
				<ul>
					<?foreach($arResult['BRANDS'] as $item):?>
						<li>
							<input style="float:left;" name="<?='brand'.++$index;?>" class="customCheckbox" type="checkbox" value="<?=$item['ID'];?>">
							<label style="display:block;overflow:hidden;" title="<?=$item['NAME'];?> (<?=$item['CNT']?>)"><?=$item['NAME'];?> <strong>(<?=$item['CNT']?>)</strong></label>
						</li>
					<?endforeach;?>
				</ul>
			</div>
			<!-- end .checks-->
			<br>
			<label class="label">Ценовой диапазон, руб</label>
			<div class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
				<div class="ui-slider-range ui-widget-header" style="left: 15%; width: 45%;"></div>
				<a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 15%;"></a><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 60%;"></a>
			</div>
			<!-- end .ui-slider-->
			<div class="slider-values">
				<input type="text" name="min" readonly class="l" value="<?=$arResult['PRICE_MIN']?>" />
				<input type="text" name="max" readonly class="r" value="<?=$arResult['PRICE_MAX']?>" />
			</div>
			<!-- end .slider-values-->
		</section>
	</fieldset>
</form>
<!-- end .filter--> 
