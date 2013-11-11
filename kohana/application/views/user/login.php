<h2></h2>
<? if ($message) : ?>
	<h3 class="message">
		<?= $message; ?>
	</h3>
<? endif; ?>

<?= Form::open('user/login'); ?>
<p>
	<?= Form::label('email', 'e-mail'); ?>
	<?= Form::input('email', HTML::chars(Arr::get($_POST, 'email'))); ?>
</p>

<p>
	<?= Form::label('password', 'Пароль'); ?>
	<?= Form::password('password'); ?>
</p>

<p>
	<?= Form::checkbox('remember'); ?>
	<?= Form::label('remember', 'Запомнить меня'); ?>
</p>

<?= Form::submit('login', 'Вход'); ?>
<?= Form::close(); ?>

<p>
	<?= HTML::anchor('user/create', 'Зарегистрироваться'); ?>
</p>
