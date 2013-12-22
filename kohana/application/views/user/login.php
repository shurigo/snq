<?
  require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
  $APPLICATION->SetTitle('Вход в Личный Кабинет');
?>
<h4>Войти в Личный Кабинет</h4>
<?if($message):?>
	<div class="message red">
		<?= $message; ?>
	</div>
<? endif; ?>
<br />
<form action="/user/login" method="post" accept-charset="utf-8">
<p>
	<?= Form::label('email', 'Адрес электронной почты'); ?><br />
	<?= Form::input('email', HTML::chars(Arr::get($_POST, 'email')),array("size" =>"30px")); ?>
</p>
<p>
	<?= Form::label('password', 'Пароль'); ?><br />
	<?= Form::password('password',null,array("size" =>"30px")); ?>
</p>
<p>
	<?= Form::checkbox('remember'); ?>
	<?= Form::label('remember', 'Запомнить меня'); ?>
</p>
<input type="submit" name="login" value="ВХОД" /> <input type="submit" name="create" value="ВСТУПИТЬ В КЛУБ" />
<br/>
<br/>
<?= HTML::anchor('user/resetpwd', 'Сбросить пароль'); ?>
<?= Form::close(); ?>
