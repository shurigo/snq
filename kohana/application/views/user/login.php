<h2>Войти в Личный Кабинет</h2>
<? if ($message) : ?>
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
