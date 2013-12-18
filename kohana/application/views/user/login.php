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
<?= Form::open('user/login'); ?>
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
<?= Form::submit('login', 'Вход'); ?> <?= Form::submit('create', 'Зарегистрироваться'); ?>
<?= Form::close(); ?>
<?//require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog.php');?>
