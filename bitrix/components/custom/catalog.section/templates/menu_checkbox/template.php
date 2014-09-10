<br>
<form class="ajax-load" id="filter_form" action="<?=$APPLICATION->GetCurPage()?>">
	<fieldset>
		<section class="filter">
			<div class="hr"></div>
			<!--
			<div style="vertical-align: middle;">
				<label for="d_cb" class="label red" style="display:inline-block;">
				<input type="checkbox" class="discount_only" id="d_cb" <?=$_SESSION['discount_only'] === 'Y' ? 'value="on" checked' : '';?> />
				<input type="hidden" name="d" id="d_o" value="<?=$_SESSION['discount_only'];?>" />
				Только со скидкой
				</label>
		    </div>
		    -->
			<!--<label class="label">Бренд</label>  -->
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
		</section>
	</fieldset>
</form>
<!-- end .filter-->
