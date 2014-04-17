<?
  require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
  $APPLICATION->SetTitle('Проверка сертификата');
?>
<?if($message):?>
	<div class="message red">
		<?= $message; ?>
	</div>
<? endif; ?>
<br />
	<form action="/furcert/index" method="post" accept-charset="utf-8">
	<p>
	<table border=0 cellpadding="5px">
	<?if($fur_cert && $fur_cert->loaded()):?>
		<tr style="vertical-align:top;">
			<td align="left"><?= Form::label('cert', 'Сертификат'); ?></td>
			<td><?= Form::label('cert', $fur_cert->cert, array("size" =>"30px")); ?></td>
		</tr>
		<tr style="vertical-align:top;">
			<td align="left"><?= Form::label('name', 'Имя'); ?></td>
			<td><?= Form::label('name', iconv('utf-8', 'cp1251', $fur_cert->owner), array("size" =>"30px")); ?></td>
		</tr>
		<tr style="vertical-align:top;">
			<td align="left"><?= Form::label('card_no', 'Номер карты Королевского Клуба'); ?></td>
			<td><?= Form::label('card_no', $fur_cert->card_no, array("size" =>"30px")); ?></td>
		</tr>
		<tr style="vertical-align:top;">
			<td align="left"><?= Form::label('issue_date', 'Дата выдачи'); ?></td>
			<td><?= Form::label('issue_date', $fur_cert->issue_date, array("size" =>"30px")); ?></td>
		</tr>
		<input type="submit" name="index" value="Назад" />
	</table>
	<?else:?>
		<tr style="vertical-align:top;">
			<td align="left"><?= Form::label('cert', 'Номер сертификата'); ?></td>
			<td><?= Form::input('cert', HTML::chars(Arr::get($_POST, 'cert'))); ?></td>
		</tr>
		<?if(!$captcha->promoted()):?>
		<tr>
      <td>
				<b><?= Form::label('captcha', 'Введите код с картинки'); ?></b>
			</td>
		</tr>
		<tr>
			<td>
				<?= $captcha->render(); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?= Form::input('captcha','',array("size" =>"22px")); ?>
			</td>
		</tr>
		<tr>
			<td>
				<div class="error red">
					<?= Arr::get($errors, 'captcha'); ?>
				</div>
			</td>
    </tr>
		<?endif;?>
		</table>
		<input type="submit" name="check" value="Проверить" />
	<?endif;?>
	<div class="error red">
		<?= Arr::get($errors, 'controllers'); ?>
	</div>
</p>
<?= Form::close(); ?>
