<?
  require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
  $APPLICATION->SetTitle('���� � ������ �������');
?>
<?if($message):?>
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
<?//require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog.php');?>
