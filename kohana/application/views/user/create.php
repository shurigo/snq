<?
  require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
  $APPLICATION->SetTitle('Вступить в клуб');
  require($_SERVER['DOCUMENT_ROOT'].'/ipgeo/geohelper.php');
?>
<p>тут надо разместить прекрасный короткий и информативный текст про преимущества которые дает Клуб.</p>
<h2>Регистрация</h2>
<hr>
<?if($message):?>
	<div class="message red" style="font-size:17px">
		<?= $message; ?>
	</div>
<? endif; ?>
<form action="/user/create" method="post" accept-charset="utf-8">
<table border=0 cellpadding="8px">
<tr style="vertical-align:top;"><td>
	<b><?= Form::label('first_name', 'Имя'); ?></b><br />
	<?= Form::input('first_name', iconv('utf-8', 'cp1251', HTML::chars(Arr::get($_POST, 'first_name'))),array("size" =>"40px")); ?>
	<div class="error red">
		<?= Arr::get($errors, 'first_name'); ?>
	</div>
    </td><td>
	<b><?= Form::label('patronymic', 'Отчество'); ?></b><br />
	<?= Form::input('patronymic', iconv('utf-8', 'cp1251', HTML::chars(Arr::get($_POST, 'patronymic'))),array("size" =>"40px")); ?>
	<div class="error red">
		<?= Arr::get($errors, 'patronymic'); ?>
	</div>
	</td><td>
	<b><?= Form::label('last_name', 'Фамилия'); ?></b><br />
	<?= Form::input('last_name', iconv('utf-8', 'cp1251', HTML::chars(Arr::get($_POST, 'last_name'))),array("size" =>"40px")); ?>
	<div class="error red">
		<?= Arr::get($errors, 'last_name'); ?>
	</div>
</td></tr>
<tr style="vertical-align:top;">
  <td>
		<b><?=Form::label('gender', 'Пол'); ?></b><br />
		<?=Form::select('gender', array('F'=>'Женский', 'M'=>'Мужской'), HTML::chars(Arr::get($_POST, 'gender')), array('class'=>'customSelect'));?>
		<div class="error red">
			<?= Arr::get($errors, 'gender'); ?>
		</div>
	</td>
</tr>
<tr style="vertical-align:top;"><td>
	<b><?= Form::label('birthday', 'Дата рождения'); ?></b><br />
	<?= Form::input('birthday', HTML::chars(Arr::get($_POST, 'birthday')), array('id'=>'birthday', 'type'=>'text', 'readonly','size' =>'40px')); ?>
	<div class="error red">
		<?= Arr::get($errors, 'birthday'); ?>
	</div>
</td><td>
	<b><?= Form::label('phone', 'Телефон'); ?></b><br />
	<?= Form::input('phone', HTML::chars(Arr::get($_POST, 'phone')), array('maxlength' => '10',"size" =>"40px","id" => "phone")); ?>
	<div class="error red">
		<?= Arr::get($errors, 'phone'); ?>
	</div>
</td><td>
	<b><?= Form::label('email', 'E-mail'); ?></b><br />
	<?= Form::input('email', HTML::chars(Arr::get($_POST, 'email')),array("size" =>"40px")); ?>
	<div class="error red">
		<?= Arr::get($errors, 'email'); ?>
	</div>
</td>
</tr>
<br />
<tr style="vertical-align:top;">
<td>
	<b><?= Form::label('password', 'Пароль'); ?></b><br />
	<?= Form::password('password',null,array("size" =>"40px")); ?>
	<div class="error red">
		<?= Arr::path($errors, '_external.password'); ?>
	</div>
</td>
<td colspan=2>
	<b><?= Form::label('password_confirm', 'Подтвердите пароль'); ?></b><br />
	<?= Form::password('password_confirm',null,array("size" =>"40px")); ?>
	<div class="error red">
		<?= Arr::path($errors, '_external.password_confirm'); ?>
	</div>
</td>
</tr><tr>
<tr style="vertical-align:top;"><td colspan=3>
<b><?= Form::label('subscribe', 'Подписка на рассылки:'); ?></b>
&nbsp;<?= Form::label('subscribe_sms', 'SMS'); ?>
<?= Form::checkbox('subscribe_sms', 1, HTML::chars(Arr::get($_POST, 'subscribe_sms')) == 1); ?>
&nbsp;<?= Form::label('subscribe_email', 'E-mail'); ?>
<?= Form::checkbox('subscribe_email', 1, HTML::chars(Arr::get($_POST, 'subscribe_email')) == 1); ?>
</td></tr>
<td colspan=3>
<?if(!$captcha->promoted()):?>
  <?= $captcha->render(); ?>
  <br />
  <b><?= Form::label('captcha', 'Введите код с картинки'); ?></b> <br />
  <?= Form::input('captcha','',array("size" =>"22px")); ?>
	<div class="error red">
		<?= Arr::get($errors, 'captcha'); ?>
	</div>
<?endif;?>
</td></tr>
<tr><td colspan=3>
	<?= Form::submit('register', 'ВСТУПИТЬ В КЛУБ',array('style' => 'background:#11acdc;border:1px solid #11acdc;')); ?>
	<?= Form::close(); ?>
</td></tr></table>
