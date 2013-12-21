<?
  require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
  $APPLICATION->SetTitle('Вход в Личный Кабинет');
?>
<?if($message):?>
	<h3 class="message">
		<?= $message; ?>
	</h3>
<? endif; ?>
<br />
<form action="/user/login" method="post" accept-charset="utf-8">
<p>
	<?= Form::label('email', 'Адрес электронной почты'); ?><br />
	<?= Form::input('email', HTML::chars(Arr::get($_POST, 'email'))); ?>
</p>
<p>
	<?= Form::label('password', 'Пароль'); ?><br />
	<?= Form::password('password'); ?>
</p>
<p>
	<?= Form::checkbox('remember'); ?>
	<?= Form::label('remember', 'Запомнить меня'); ?>
</p>
<? 
?>
<input type="submit" name="login" value="ВХОД" /> <input type="submit" name="create" value="ВСТУПИТЬ В КЛУБ" />
<?= Form::close(); ?>
