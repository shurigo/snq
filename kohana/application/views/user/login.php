<?
  require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
  $APPLICATION->SetTitle('���� � ������ �������');
?>
<h4>����� � ������ �������</h4>
<?if($message):?>
	<div class="message red">
		<?= $message; ?>
	</div>
<? endif; ?>
<br />
<form action="/user/login" method="post" accept-charset="utf-8">
<p>
	<?= Form::label('email', '����� ����������� �����'); ?><br />
	<?= Form::input('email', HTML::chars(Arr::get($_POST, 'email')),array("size" =>"30px")); ?>
</p>
<p>
	<?= Form::label('password', '������'); ?><br />
	<?= Form::password('password',null,array("size" =>"30px")); ?>
</p>
<p>
	<?= Form::checkbox('remember'); ?>
	<?= Form::label('remember', '��������� ����'); ?>
</p>
<input type="submit" name="login" value="����" /> <input type="submit" name="create" value="�������� � ����" />
<br/>
<br/>
<?= HTML::anchor('user/resetpwd', '�������� ������'); ?>
<?= Form::close(); ?>
