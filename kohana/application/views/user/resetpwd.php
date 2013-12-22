<?
  require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
  $APPLICATION->SetTitle('Сброс пароля');
?>
<?if($message):?>
	<div class="message error">
		<?= $message; ?>
	</div>
<? endif; ?>
<br />
<form action="/user/resetpwd" method="post" accept-charset="utf-8">
<p>
	<?= Form::label('email', 'Адрес электронной почты'); ?>&nbsp;
	<?= Form::input('email', HTML::chars(Arr::get($_POST, 'email'))); ?>
	<div class="error red">
		<?= Arr::get($errors, 'controllers'); ?>
	</div>
</p>
<input type="submit" name="resetpwd" value="Получить новый пароль" />
<?= Form::close(); ?>
