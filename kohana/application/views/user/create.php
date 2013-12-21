<?
  require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
  $APPLICATION->SetTitle('Вступить в клуб');
//	echo(HTML::script('/js/user.js'));
?>
<?if($message):?>
	<h3 class="message">
		<?= $message; ?>
	</h3>
<? endif; ?>
<form action="/user/create" method="post" accept-charset="utf-8">
<p>
	<?= Form::label('first_name', 'Имя'); ?>
	<?= Form::input('first_name', iconv('utf-8', 'cp1251', HTML::chars(Arr::get($_POST, 'first_name')))); ?>
	<div class="error">
		<?= Arr::get($errors, 'first_name'); ?>
	</div>
</p>
<p>
	<?= Form::label('last_name', 'Фамилия'); ?>
	<?= Form::input('last_name', iconv('utf-8', 'cp1251', HTML::chars(Arr::get($_POST, 'last_name')))); ?>
	<div class="error">
		<?= Arr::get($errors, 'last_name'); ?>
	</div>
</p>
<p>
	<?= Form::label('patronymic', 'Отчество'); ?>
	<?= Form::input('patronymic', iconv('utf-8', 'cp1251', HTML::chars(Arr::get($_POST, 'patronymic')))); ?>
	<div class="error">
		<?= Arr::get($errors, 'patronymic'); ?>
	</div>
</p>
<p>
	<?= Form::label('birthday', 'Дата рождения'); ?>
	<?= Form::input('birthday', HTML::chars(Arr::get($_POST, 'birthday')), array('id'=>'birthday', 'type'=>'text', 'readonly')); ?>
	<div class="error">
		<?= Arr::get($errors, 'birthday'); ?>
	</div>
</p>
<p>
	<?= Form::label('phone', 'Телефон (10 цифр) +7:'); ?>
	<?= Form::input('phone', HTML::chars(Arr::get($_POST, 'phone')), array('maxlength' => '10')); ?>
	<div class="error">
		<?= Arr::get($errors, 'phone'); ?>
	</div>
</p>
<p>
	<?= Form::label('email', 'e-mail'); ?>
	<?= Form::input('email', HTML::chars(Arr::get($_POST, 'email'))); ?>
	<div class="error">
		<?= Arr::get($errors, 'email'); ?>
	</div>
</p>
<p>
	<?= Form::label('deliver_card_to', 'Выберете предпочтительный способ получения Карты Кролевского Клуба'); ?>
</p>
<p>
<?= Form::label('subscribe', 'Подписка на рассылки:'); ?>  
<?= Form::label('subscribe_sms', 'SMS'); ?>
<?= Form::checkbox('subscribe_sms', 1, HTML::chars(Arr::get($_POST, 'subscribe_sms')) > 0); ?>
<?= Form::label('subscribe_sms', 'email'); ?>
<?= Form::checkbox('subscribe_email', 1, HTML::chars(Arr::get($_POST, 'subscribe_email')) > 0); ?>
</p>
<p>
	<?= Form::label('password', 'Пароль'); ?>
	<?= Form::password('password'); ?>
	<div class="error">
		<?= Arr::path($errors, '_external.password'); ?>
	</div>
</p>
<p>
	<?= Form::label('password_confirm', 'Подтвердите пароль'); ?>
	<?= Form::password('password_confirm'); ?>
	<div class="error">
		<?= Arr::path($errors, '_external.password_confirm'); ?>
	</div>
</p>
<?if(!$captcha->promoted()):?>
<p>
  <?= $captcha->render(); ?>
</p>
<p>
	<?= Form::label('captcha', 'Код с картинки'); ?>
  <?= Form::input('captcha', ''); ?>
	<div class="error">
		<?= Arr::get($errors, 'captcha'); ?>
	</div>
</p>
<?endif;?>
<p>
	<?= Form::submit('create', 'ВСТУПИТЬ В КЛУБ'); ?>
	<?= Form::close(); ?>
</p>
