<div class="hr"></div>
<label class="label">�����</label>
	<div class="checks">
		<ul>
		<?foreach($arResult['ITEMS'] as $item):?>
			<li>
				<input name="<?='brand'.++$index;?>" class="customCheckbox" type="checkbox" value="<?=$item['ID'];?>">
				<label><?=$item['NAME'];?></label>
			</li>
		<?endforeach;?>
	</ul>
</div>
<!-- end .checks-->
