<?if($message):?>
	<div class="message red">
		<?= $message; ?>
	</div>
<? endif; ?>
<div class="furcert">
	<?if($fur_cert && $fur_cert->loaded()):?>
		<span class="user-name"><?=iconv('utf-8', 'cp1251', $fur_cert->owner);?></span>
		<span class="cert"><?=$fur_cert->cert;?></span>
		<span class="card_no"><?=$fur_cert->card_no;?></span>
		<span class="issue_date"><?=$fur_cert->issue_date;?></span>
		<table width="1780" border="0" cellpadding="0" cellspacing="0" style="line-height:0;white-space:nowrap">
			<tr>
				<td><img src="/images/certsq/part1x1.png" width="445" height="316" border="0"/></td>
				<td><img src="/images/certsq/part1x2.png" width="445" height="316" border="0"/></td>
				<td><img src="/images/certsq/part1x3.png" width="445" height="316" border="0"/></td>
				<td><img src="/images/certsq/part1x4.png" width="445" height="316" border="0"/></td>
			</tr>
			<tr>
				<td><img src="/images/certsq/part2x1.png" width="445" height="316" border="0"/></td>
				<td><img src="/images/certsq/part2x2.png" width="445" height="316" border="0"/></td>
				<td><img src="/images/certsq/part2x3.png" width="445" height="316" border="0"/></td>
				<td><img src="/images/certsq/part2x4.png" width="445" height="316" border="0"/></td>
			</tr>
			<tr>
				<td><img src="/images/certsq/part3x1.png" width="445" height="316" border="0"/></td>
				<td><img src="/images/certsq/part3x2.png" width="445" height="316" border="0"/></td>
				<td><img src="/images/certsq/part3x3.png" width="445" height="316" border="0"/></td>
				<td><img src="/images/certsq/part3x4.png" width="445" height="316" border="0"/></td>
			</tr>
			<tr>
				<td><img src="/images/certsq/part4x1.png" width="445" height="318" border="0"/></td>
				<td><img src="/images/certsq/part4x2.png" width="445" height="318" border="0"/></td>
				<td><img src="/images/certsq/part4x3.png" width="445" height="318" border="0"/></td>
				<td><img src="/images/certsq/part4x4.png" width="445" height="318" border="0"/></td>
			</tr>
		</table>
	<?else:?>
		<form action="/furcert/index" method="post" target="_blank" accept-charset="utf-8">
			<table border=0 cellpadding="5px">
				<tr style="vertical-align:top;">
					<td align="left"><?= Form::label('cert', 'Номер сертификата'); ?></td>
					<td><?= Form::input('cert', HTML::chars(Arr::get($_POST, 'cert'))); ?></td>
				</tr>
				<?if(!$captcha->promoted()):?>
					<tr>
						<td><b><?= Form::label('captcha', 'Введите код с картинки'); ?></b></td>
					</tr>
					<tr>
						<td><?= $captcha->render();?></td>
						<td><?= Form::input('captcha', '');?></td>
					</tr>
					<tr>
						<td><div class="error red"><?= Arr::get($errors, 'captcha');?></div></td>
					</tr>
				<?endif;?>
			</table>
			<input type="submit" name="check" value="Проверить" />
			<div class="error red">
				<?=Arr::get($errors, 'controllers');?>
			</div>
		</form>
	<?endif;?>
