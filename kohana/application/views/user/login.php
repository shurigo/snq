<?
  require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
  $APPLICATION->SetTitle('���� � ������ �������');
?>
<?if($message):?>
	<div class="message error">
		<?= $message; ?>
	</div>
<? endif; ?>
<br />
<form action="/user/login" method="post" accept-charset="utf-8">
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
<?
?>
<input type="submit" name="login" value="����" /> <input type="submit" name="create" value="�������� � ����" />
<?= Form::close(); ?>
