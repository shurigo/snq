<br>
<form class="ajax-load" id="filter_form" action="<?=$APPLICATION->GetCurPage()?>">
	<fieldset>
		<section class="filter">
			<div class="hr"></div>
			<label class="label">�����</label>
			<div class="checks">
				<ul>
					<?foreach($arResult['BRANDS'] as $item):?>
						<li>
							<input name="<?='brand'.++$index;?>" class="customCheckbox" type="checkbox" value="<?=$item['ID'];?>">
							<label class="truncated" title="<?=$item['NAME'];?> (<?=$item['CNT']?>)"><?=$item['NAME'];?> <strong>(<?=$item['CNT']?>)</strong></label>
						</li>
					<?endforeach;?>
				</ul>
			</div>
			<!-- end .checks-->
			<br>
			<label class="label">������� ��������, ���</label>
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
      <br>
			<div>
        <input type="checkbox" name="d" />
				<label style="display:inline-block;" for="d" class="label">������ �� �������</label>
		 </div>
		</section>
	</fieldset>
</form>
<!-- end .filter--> 
