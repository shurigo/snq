<?
  require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
  $APPLICATION->SetTitle('�����������');
?>
<? if ($message) : ?>
	<h3 class="message">
		<?= $message; ?>
	</h3>
<? endif; ?>
<?= Form::open('user/create'); ?>
<p>
	<?= Form::label('first_name', '���'); ?>
	<?= Form::input('first_name', HTML::chars(Arr::get($_POST, 'first_name'))); ?>
	<div class="error">
		<?= Arr::get($errors, 'first_name'); ?>
	</div>
</p>
<p>
	<?= Form::label('last_name', '�������'); ?>
	<?= Form::input('last_name', HTML::chars(Arr::get($_POST, 'last_name'))); ?>
	<div class="error">
		<?= Arr::get($errors, 'last_name'); ?>
	</div>
</p>
<p>
	<?= Form::label('patronymic', '��������'); ?>
	<?= Form::input('patronymic', HTML::chars(Arr::get($_POST, 'patronymic'))); ?>
	<div class="error">
		<?= Arr::get($errors, 'patronymic'); ?>
	</div>
</p>
<p>
	<?= Form::label('birthday', '���� ��������'); ?>
	<?= Form::input('birthday', HTML::chars(Arr::get($_POST, 'birthday')), array('id'=>'birthday', 'type'=>'text', 'readonly')); ?>
	<div class="error">
		<?= Arr::get($errors, 'birthday'); ?>
	</div>
</p>
<p>
	<?= Form::label('phone', '������� (10 ����) +7:'); ?>
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
	<?= Form::label('password', '������'); ?>
	<?= Form::password('password'); ?>
	<div class="error">
		<?= Arr::path($errors, '_external.password'); ?>
	</div>
</p>
<p>
	<?= Form::label('password_confirm', '����������� ������'); ?>
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
	<?= Form::label('captcha', '��� � ��������'); ?>
  <?= Form::input('captcha', ''); ?>
	<div class="error">
		<?= Arr::get($errors, 'captcha'); ?>
	</div>
</p>
<?endif;?>
<p>
	<?= Form::submit('create', '�����������'); ?>
	<?= Form::close(); ?>
</p>
<p>
  <?= HTML::anchor('user/login', '�����'); ?> 
	� ������ �������
</p>
<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog.php');?>
