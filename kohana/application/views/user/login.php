<h2>����� � ������ �������</h2>
<? if ($message) : ?>
	<h3 class="message">
		<?= $message; ?>
	</h3>
<? endif; ?>
<br />
<?= Form::open('user/login'); ?>
<p>
	<?= Form::label('email', '����� ����������� �����'); ?><br />
	<?= Form::input('email', HTML::chars(Arr::get($_POST, 'email'))); ?>
</p>

<p>
	<?= Form::label('password', '������'); ?><br />
	<?= Form::password('password'); ?>
</p>

<p>
	<?= Form::checkbox('remember'); ?>
	<?= Form::label('remember', '��������� ����'); ?>
</p>

<?= Form::submit('login', '����'); ?> <?= Form::submit('create', '������������������'); ?>
<?= Form::close(); ?>
