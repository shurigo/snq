<br>
<hr>
<?
$code = $APPLICATION->CaptchaGetCode();
?>
<h1>������</h1>
<form method="post">
<fieldset>
<table>
<tr><td width="30%">�������:*</td><td width="70%"><input type="text"   name="last_name" size="40" maxlength="40"></td></tr>
<tr><td width="30%">���:*</td><td width="70%"><input type="text"   name="first_name" size="40" maxlength="40"></td></tr>
<tr><td width="30%">��������:*</td><td width="70%"><input type="text"   name="middle_name" size="40" maxlength="40"></td></tr>
<tr><td width="30%">���� ��������:*</td><td width="70%"><input type="text"   name="middle_name" size="40" maxlength="40"></td></tr>
<tr><td width="30%">�����������:*</td><td width="70%"><input type="text"   name="middle_name" size="40" maxlength="40"></td></tr>
<tr><td width="30%">����� ������������ ����������:</td><td width="70%"><input type="text"   name="middle_name" size="40" maxlength="40"></td></tr>
<tr><td width="30%">���������� ��������:*</td><td width="70%">���������:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+7<input type="text"   name="mobile_phone" size="10" maxlength="40"><br /><br />&nbsp;��� ��������: +7<input type="text"   name="home_phone" size="10" maxlength="40"></td></tr>
<tr><td width="30%">Email:*</td><td width="70%"><input type="text"   name="email" size="40" maxlength="40"></td></tr>
<tr><td width="30%">�����������:*</td><td width="70%"><select name="education"><option>������</option><option>������������� ������</option><option>�������</option><option>�������-�����������</option><option>�������</option></select></td></tr>
<tr><td width="30%">��������� ����� ������:</td><td width="70%"></td></tr>
<tr><td width="30%" align="right">�������� ��������:</td><td width="70%"><input type="text"   name="company_name" size="40" maxlength="40"></td></tr>
<tr><td width="30%" align="right">���������:</td><td width="70%"><input type="text"   name="job" size="40" maxlength="40"></td></tr>
<tr><td width="30%" align="right">���������� �����������:</td><td width="70%"><textarea  name="duties" cols="42" rows="5"></textarea></td></tr>
<tr><td width="30%" align="right">������ ������:</td><td width="70%"><input type="text"  name="duties" size="40" maxlength="40"></td></tr>
<tr><td width="30%" align="right">���� �� � ��� �����������?</td><td width="70%"><input type="radio" name="management" value="���" checked> ���<input type="radio" name="management" value="��"> ��</td></tr>
<tr><td width="30%">���������� ����� �� ���������� ����� ������:</td>
<td width="70%">
<input type="checkbox"  name="soc_package" value="���">��� (������������ ����������� �����������)<br />
<input type="checkbox"  name="soc_package" value="����������� �����">����������� �����<br />
<input type="checkbox"  name="soc_package" value="������ ����� ������� �����">������ ����� ������� �����<br />
<input type="checkbox"  name="soc_package" value="������ ������">������ ������<br />
<input type="checkbox"  name="soc_package" value="��������">��������<br />
<input type="checkbox"  name="soc_package" value="������">������� <input type="text"   name="soc_package_other" size="40" maxlength="40"><br />
</td></tr>
<tr><td width="30%">������� ����������</td><td width="70%">����������� ������� �� <input type="radio" name="passport" value="���"> ���<input type="radio" name="passport" value="��" checked> ��<br />������� ����� (��������� �������������)<input type="radio" name="svidet" value="���"> ���<input type="radio" name="cvidet" value="��" checked> ��</td></tr>
<tr><td width="30%">���������������� ������</td><td width="70%"><input type="text" name="vacancy" size="40" maxlength="40" value="<?=$vacancy_name?>" disabled></td></tr>
<tr><td width="30%">��� �� ������ � ��������:</td><td width="70%"><input type="text"  name="info" size="40" maxlength="40"></td></tr>
<tr><td width="30%">����� �� ������ ���������� ���� ������:</td><td width="70%"><input type="file"  name="cv" size="40" maxlength="40"></td></tr>
</table>
<div class="form_name">������� ��� � �������� � ���� ����:</div> <?="test=".$code?>
							<div class="form_field"><img src="../../bitrix/tools/captcha.php?captcha_sid=<?=$code;?>" width="180" height="40" alt="������� ��� � ���� �������� � ���� ����" title="������� ��� � ���� �������� � ���� ����" /></div>
							<div class="form_field<?=(strlen($error_array['captcha_word_error']) > 0)?' error':'';?>">
								<input type="input" name="captcha_word" value="" />
							</div>
							<?
							if(strlen($error_array['captcha_word_error']) > 0)
							{
								?><div class="form_error"><?=$error_array['captcha_word_error']?></div><?
							}
							?>
<table>
<tr><td>&nbsp;</td><td><input type="submit" name="send" value="���������"></td></tr>
</table>
</fieldset>
</form>
</table>