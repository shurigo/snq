<?
  require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
  $APPLICATION->SetTitle('Личный Кабинет');
?>
<h2>Личный кабинет: "<?= "$user->first_name $user->last_name $user->email"; ?>"</h2>
<? if ($message) : ?>
	<h3 class="message">
		<?= $message; ?>
	</h3>
<? endif; ?>
<?= Form::open('user/index'); ?>
<p>
	<?= Form::label('email', 'e-mail'); ?>
	<?= Form::input('email', $user->email, array('readonly')); ?>
</p>
<p>
	<?= Form::label('first_name', 'Имя'); ?>
	<?= Form::input('first_name', $user->first_name); ?>
	<div class="error">
		<?= Arr::get($errors, 'first_name'); ?>
	</div>
</p>
<p>
	<?= Form::label('last_name', 'Фамилия'); ?>
	<?= Form::input('last_name', $user->last_name); ?>
	<div class="error">
		<?= Arr::get($errors, 'last_name'); ?>
	</div>
</p>
<p>
	<?= Form::label('patronymic', 'Отчество'); ?>
	<?= Form::input('patronymic', $user->patronymic); ?>
	<div class="error">
		<?= Arr::get($errors, 'patronymic'); ?>
	</div>
</p>
<p>
	<?= Form::label('birthday', 'Дата рождения'); ?>
	<?= Form::input('birthday', $user->birthday, array('id'=>'birthday', 'type'=>'text', 'readonly')); ?>
	<div class="error">
		<?= Arr::get($errors, 'birthday'); ?>
	</div>
</p>
<p>
	<?= Form::label('phone', 'Телефон (10 цифр) +7:'); ?>
	<?= Form::input('phone', $user->phone, array('maxlength' => '10')); ?>
	<div class="error">
		<?= Arr::get($errors, 'phone'); ?>
	</div>
</p>
<p>
	<?= Form::label('password', 'Пароль'); ?>
	<?= Form::password('password'); ?>
	<div class="error">
		<?= Arr::get($errors, '_external.password'); ?>
	</div>
</p>
<p>
	<?= Form::label('password_confirm', 'Подтвердите пароль'); ?>
	<?= Form::password('password_confirm'); ?>
	<div class="error">
		<?= Arr::path($errors, '_external.password_confirm'); ?>
	</div>
</p>
<p>
	<?= Form::submit('index', 'Сохранить'); ?>
	<?= Form::close(); ?>
</p>
<?= HTML::anchor('user/logout', 'Выйти'); ?>
<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog.php');?>
