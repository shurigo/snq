<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("������");
$APPLICATION->AddHeadString('<link rel="stylesheet" type="text/css" href="styles.css" />');
?>
<a name="anketa_form"></a>
<div style="margin:10px 45px 45px;">
<h1>������</h1>
<?
//$mail_to = "anketa@snq.ru, snowqueen@conmark.ru";
$mail_to = "anketa@snq.ru, snowqueen@conmark.ru, anketasnq@mail.ru";
$site_name = "snowqueen.ru";

$error_array = array();
if (isset($_POST['anketaformsent']))
{
	//�������
	if (isset($_POST["last_name"]) && strlen($_POST["last_name"]) > 0 && !preg_match("/^[�-��-�]+$/", $_POST['last_name']))
	{
		$error_array['last_name_error'] = "������: ��� ����� ����������� ������� �����!";
		$error_array['last_name_lang_error'] = 1;
	}
	elseif (isset($_POST["last_name"]) && strlen($_POST["last_name"]) > 0) 
	{
		$last_name = trim(strip_tags($_POST["last_name"]));
	}
	else 
	{
		$error_array['last_name_error'] = "������: ������� �� �������!";
	}
	//���
	if (isset($_POST["name"]) && strlen($_POST["name"]) > 0 && !preg_match("/^[�-��-�]+$/", $_POST['name']))
	{
		$error_array['name_error'] = "������: ��� ����� ����������� ������� �����!";
		$error_array['name_lang_error'] = 1;
	}
	elseif (isset($_POST["name"]) && strlen($_POST["name"]) > 0) 
	{
		$name = trim(strip_tags($_POST["name"]));
	}
	else 
	{
		$error_array['name_error'] = "������: ��� �� �������!";
	}
	//��������
	if (isset($_POST["patronymic"]) && strlen($_POST["patronymic"]) > 0 && !preg_match("/^[�-��-�]+$/", $_POST['patronymic']))
	{
		$error_array['patronymic_error'] = "������: ��� ����� ����������� ������� �����!";
		$error_array['patronymic_lang_error'] = 1;
	}
	elseif (isset($_POST["patronymic"]) && strlen($_POST["patronymic"]) > 0) 
	{
		$patronymic = trim(strip_tags($_POST["patronymic"]));
	}
	//���
	if (isset($_POST["sex"]) && strlen($_POST["sex"]) > 0 && $_POST["sex"] != "empty") 
	{
		$sex = trim(strip_tags($_POST["sex"]));
	}
	else 
	{
		$error_array['sex_error'] = "������: ��� �� ������!";
	}
	//���� ��������
	if (isset($_POST["birth_day"]) && strlen($_POST["birth_day"]) > 0 && $_POST["birth_day"] != "empty") 
	{
		$birth_day = trim(strip_tags($_POST["birth_day"]));
	}
	//����� ��������
	if (isset($_POST["birth_month"]) && strlen($_POST["birth_month"]) > 0 && $_POST["birth_month"] != "empty") 
	{
		$birth_month = trim(strip_tags($_POST["birth_month"]));
	}
	//��� ��������
	if (isset($_POST["birth_year"]) && strlen($_POST["birth_year"]) > 0 && $_POST["birth_year"] != "empty") 
	{
		$birth_year = trim(strip_tags($_POST["birth_year"]));
	}
	//� ���� �������� �� ����� ������� ���������
	if (isset($_POST["catalog_by_post"]) && is_numeric($_POST["catalog_by_post"]) && $_POST["catalog_by_post"] == 1) 
	{
		$catalog_by_post = 1;
	}
	//� ���� �������� ������� �� ������ �� SMS
	if (isset($_POST["news_by_sms"]) && is_numeric($_POST["news_by_sms"]) && $_POST["news_by_sms"] == 1) 
	{
		$news_by_sms = 1;
	}
	//� ���� �������� ������� �� ������ �� E-mail
	if (isset($_POST["news_by_email"]) && is_numeric($_POST["news_by_email"]) && $_POST["news_by_email"] == 1) 
	{
		$news_by_email = 1;
	}
	//�������
	if (isset($_POST["phone_prefix"]) && is_numeric($_POST["phone_prefix"]) && $_POST["phone_prefix"] > 0)
	{
		$phone_prefix = $_POST["phone_prefix"];
	}
	if (isset($_POST["phone_block1"]) && is_numeric($_POST["phone_block1"]) && $_POST["phone_block1"] > 0)
	{
		$phone_block1 = $_POST["phone_block1"];
	}
	if (isset($_POST["phone_block2"]) && is_numeric($_POST["phone_block2"]) && $_POST["phone_block2"] > 0)
	{
		$phone_block2 = $_POST["phone_block2"];
	}
	if (isset($_POST["phone_block3"]) && is_numeric($_POST["phone_block3"]) && $_POST["phone_block3"] > 0)
	{
		$phone_block3 = $_POST["phone_block3"];
	}
	$phone_full_number = trim(strip_tags($phone_prefix . $phone_block1 . $phone_block2 . $phone_block3));
	if (strlen($phone_full_number) > 0)
	{
		if (!is_numeric($phone_full_number))
		{
			$error_array['phone_error'] = "������: ��� ����� ����������� ������ �����!";
		}
		elseif (strlen($phone_full_number) < 10)
		{
			$error_array['phone_error'] = "������: ����� �������� ������ �������� �� 10 ����!";
		}
		$phone = "7".$phone_full_number;
	}
	elseif ($news_by_sms)
	{
		$error_array['phone_error'] = "������: ��� �������� �������� �� ������ �� SMS<br> ���������� ������ ����� ��������!";
	}
	//����������� �����
	if (isset($_POST["email"]) && strlen($_POST["email"]) > 0 && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) !== false)
	{
		$email = $_POST["email"];
	}
	elseif (isset($_POST["email"]) && strlen($_POST["email"]) > 0)
	{
		$error_array['email_error'] = "������: ����������� ����� ����� �� �����!";
	}
	elseif ($news_by_email)
	{
		$error_array['email_error'] = "������: ��� �������� �������� �� ������ �� E-mail<br> ���������� ������ ��� ����������� �����!";
	}
	//��� � ��������
	if (isset($_POST["captcha_word"]) && strlen($_POST["captcha_word"]) == 0)
	{
		$error_array['captcha_word_error'] = "������: ��� � �������� �� �����!";
	}
	elseif(!$APPLICATION->CaptchaCheckCode($_POST["captcha_word"], $_POST["captcha_sid"]))
	{
		$error_array['captcha_word_error'] = "������: �� ������ ��� � ��������!";
	}
	//�������� ������
	if (isset($_POST["post_index"]) && is_numeric($_POST["post_index"]) && strlen($_POST["post_index"]) == 6)
	{
		$post_index = $_POST["post_index"];
	}
	elseif (isset($_POST["post_index"]) && strlen($_POST["post_index"]) > 0 && (!is_numeric($_POST["post_index"]) || strlen($_POST["post_index"]) < 6))
	{
		$error_array['post_index_error'] = "������: �������� ������ ������ �������� �� 6 ����!";
	}
	//�����
	if (isset($_POST["city"]) && strlen($_POST["city"]) > 0 && !preg_match("/^[�-��-�0-9\s]+$/", $_POST['city']))
	{
		$error_array['city_error'] = "������: ��� ����� ����������� ������� �����!";
		$error_array['city_lang_error'] = 1;
	}
	elseif (isset($_POST["city"]) && strlen($_POST["city"]) > 0) 
	{
		$city = trim(strip_tags($_POST["city"]));
	}
	else 
	{
		$error_array['city_error'] = "������: ����� �� ������!";
	}
	//�����
	if (isset($_POST["street"]) && strlen($_POST["street"]) > 0 && !preg_match("/^[�-��-�0-9\s]+$/", $_POST['street']))
	{
		$error_array['street_error'] = "������: ��� ����� ����������� ������� �����!";
		$error_array['street_lang_error'] = 1;
	}
	elseif (isset($_POST["street"]) && strlen($_POST["street"]) > 0) 
	{
		$street = trim(strip_tags($_POST["street"]));
	}
	else 
	{
		$error_array['street_error'] = "������: ����� �� �������!";
	}
	//���
	if (isset($_POST["house"]) && strlen($_POST["house"]) > 0) 
	{
		$house = trim(strip_tags($_POST["house"]));
	}
	else 
	{
		$error_array['house_error'] = "������: ��� �� ������!";
	}
	//������
	if (isset($_POST["building"]) && strlen($_POST["building"]) > 0) 
	{
		$building = trim(strip_tags($_POST["building"]));
	}
	//��������
	if (isset($_POST["flat"]) && strlen($_POST["flat"]) > 0) 
	{
		$flat = trim(strip_tags($_POST["flat"]));
	}
	else 
	{
		$error_array['flat_error'] = "������: �������� �� �������!";
	}
}

if(isset($_POST['anketaformsent']) && count($error_array) == 0)
{
	$months = array(
		1 => "������",
		2 => "�������",
		3 => "�����",
		4 => "������",
		5 => "���",
		6 => "����",
		7 => "����",
		8 => "�������",
		9 => "��������",
		10 => "�������",
		11 => "������",
		12 => "�������",
	);
	$to = $mail_to;
	if ($_REQUEST["anketa_action"] == "w1213")
	{
		$subject  = '��������� ������ (������� ���� 12-13) �� ����� snowqueen.ru';
	}
	else
	{
		$subject  = '��������� ������ �� ����� snowqueen.ru';
	}
	$message  = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1251" /><title>'.$subject.'</title></head><body>';
	
	//echo "<pre>"; print_r(); echo "</pre>";
	$message .= '<strong>������ ������</strong><br>';
	$message .= '��� �������: ' . $last_name. ' ' . $name;
	if (strlen($patronymic) > 0)
	{
		$message .= ' ' . $patronymic;
	}
	$message .= '<br>';
	if ($sex == "m")
	{
		$message .= '���: �������';
	}
	elseif ($sex == "w")
	{
		$message .= '���: �������';
	}
	$message .= '<br>';
	if (((strlen($birth_day) > 0) && ($birth_day != "empty")) && ((strlen($birth_month) > 0) && ($birth_month != "empty")) && ((strlen($birth_year) > 0) && ($birth_year != "empty")))
	{
		$message .= '���� ��������: ' . $birth_day . ' ' . $months[$birth_month] . ' ' . $birth_year;
		$message .= '<br>';
	}
	if (strlen($phone) > 0)
	{
		$message .= '��������� �������: +'.$phone[0].'('.$phone[1].$phone[2].$phone[3].')'.$phone[4].$phone[5].$phone[6].'-'.$phone[7].$phone[8].'-'.$phone[9].$phone[10];
		$message .= '<br>';
	}
	if (strlen($email) > 0)
	{
		$message .= '����������� �����: <a href="mailto:'.$email.'">'.$email.'</a>';
		$message .= '<br>';
	}
	$message .= '<br><strong>����� ����������</strong><br>';
	if (strlen($post_index) > 0)
	{
		$message .= '�������� ������: '.$post_index;
		$message .= '<br>';
	}
	$message .= '�����: '.$city;
	$message .= '<br>';
	
	$message .= '�����: '.$street;
	$message .= '<br>';
	
	$message .= '���: '.$house;
	$message .= '<br>';

	if (strlen($building) > 0)
	{
		$message .= '������: '.$building;
		$message .= '<br>';
	}
	
	$message .= '��������: '.$flat;
	$message .= '<br>';
	
	$message .= '<br><strong>�������� �� ��������� ����������</strong><br>';
	$message .= '�������� ��������� �� ����� �������� ���������: ';
	$message .= ($catalog_by_post == 1)?'��':'���';
	$message .= '<br>';
	
	$message .= '�������� �� ��������� �������� �� ������ �� SMS: ';
	$message .= ($news_by_sms == 1)?'��':'���';
	$message .= '<br>';
	
	$message .= '�������� �� ��������� �������� �� ������ �� �-mail: ';
	$message .= ($news_by_email == 1)?'��':'���';
	$message .= '<br>';
	
	$message .= '</body></html>';
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=windows-1251' . "\r\n";

	$headers .= 'From: ' . $email . "\r\n" .
				'Reply-To: ' . $email . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
	if (mail($to, $subject, $message, $headers))
	{
		?>
		<div style="font-size:14px; margin:17px 0 0 0;"><span style="white-space:nowrap;">������� �� ���������� ������.</span></div>
		<div style="font-size:12px; margin:10px 0 0 0;">����� 5 ������ �� ������ �������������� �� ������� �������� �����.</div>
		<script>
			setTimeout( 'location="/";', 5000);
		</script>
		<?
	}
}
else
{
	$code = $APPLICATION->CaptchaGetCode(); 
	?>
	<form action="<?=$_SERVER['PHP_SELF']?>#anketa_form" method="post" enctype="multipart/form-data" id="anketa">
    	<input type="hidden" name="anketa_action" value="<?=$_REQUEST["anketa_action"]?>" />
        <input type="hidden" name="anketaformsent" value="1" />
        <input type="hidden" name="captcha_sid" value="<?=$code;?>" />
        <table style="width:800px;">
            <tr>
                <td style="width:50%;" valign="top">
                    <h3>������ ������</h3>
                    <div class="form_name">�������<span>*</span>:</div>
                    <div class="form_field<?=(strlen($error_array['last_name_error']) > 0)?" error":"";?>"><input type="text" name="last_name" value="<?=(isset($last_name))?$last_name:'';?>" maxlength="20" /></div>
                    <?
                    if(strlen($error_array['last_name_error']) > 0)
					{
						?><div class="form_error"><?=$error_array['last_name_error']?></div><?
                    }
					if (!isset($_POST['anketaformsent']) || (strlen($error_array['last_name_error']) > 0 && $error_array['last_name_lang_error'] != 1))
					{
						?><div class="form_field_descr">��� ����� ���������� ����������� ������� �����</div><?
					}
					?>
                    <div class="form_name">���<span>*</span>:</div>
                    <div class="form_field<?=(strlen($error_array['name_error']) > 0)?" error":"";?>"><input type="text" name="name" value="<?=(isset($name))?$name:'';?>" maxlength="20" /></div>
                    <?
                    if(strlen($error_array['name_error']) > 0)
					{
						?><div class="form_error"><?=$error_array['name_error']?></div><?
                    }
					if (!isset($_POST['anketaformsent']) || (strlen($error_array['name_error']) > 0 && $error_array['name_lang_error'] != 1))
					{
						?><div class="form_field_descr">��� ����� ���������� ����������� ������� �����</div><?
					}
					?>
                    <div class="form_name">��������:</div>
                    <div class="form_field<?=(strlen($error_array['patronymic_error']) > 0)?" error":"";?>"><input type="text" name="patronymic" value="<?=(isset($patronymic))?$patronymic:'';?>" maxlength="20" /></div>
                    <?
                    if(strlen($error_array['patronymic_error']) > 0)
					{
						?><div class="form_error"><?=$error_array['patronymic_error']?></div><?
                    }
					if (!isset($_POST['anketaformsent']) || (strlen($error_array['patronymic_error']) > 0 && $error_array['patronymic_lang_error'] != 1) || $patronymic == "")
					{
						?><div class="form_field_descr">��� ����� ���������� ����������� ������� �����</div><?
					}
					?>
                    <div class="form_name">���<span>*</span>:</div>
                    <div class="form_field"><select name="sex"<?=(strlen($error_array['sex_error']) > 0)?' class="error"':"";?>>
                        <option value="empty">�������� ���</option>
                        <option value="m" <?=($sex == "m")?' selected="selected"':'';?>>�������</option>
                        <option value="w" <?=($sex == "w")?' selected="selected"':'';?>>�������</option>
                    </select></div>
                    <?
                    if(strlen($error_array['sex_error']) > 0)
					{
						?><div class="form_error"><?=$error_array['sex_error']?></div><?
                    }
					?>
                    <div class="form_name">���� ��������:</div>
                    <div class="form_field"><select name="birth_day" class="select_birth_date<?=(strlen($error_array['birth_day_error']) > 0)?" error":"";?>">
                        <option value="empty">����</option>
                        <option<?=($birth_day == "1")?' selected="selected"':'';?>>1</option>
                        <option<?=($birth_day == "2")?' selected="selected"':'';?>>2</option>
                        <option<?=($birth_day == "3")?' selected="selected"':'';?>>3</option>
                        <option<?=($birth_day == "4")?' selected="selected"':'';?>>4</option>
                        <option<?=($birth_day == "5")?' selected="selected"':'';?>>5</option>
                        <option<?=($birth_day == "6")?' selected="selected"':'';?>>6</option>
                        <option<?=($birth_day == "7")?' selected="selected"':'';?>>7</option>
                        <option<?=($birth_day == "8")?' selected="selected"':'';?>>8</option>
                        <option<?=($birth_day == "9")?' selected="selected"':'';?>>9</option>
                        <option<?=($birth_day == "10")?' selected="selected"':'';?>>10</option>
                        <option<?=($birth_day == "11")?' selected="selected"':'';?>>11</option>
                        <option<?=($birth_day == "12")?' selected="selected"':'';?>>12</option>
                        <option<?=($birth_day == "13")?' selected="selected"':'';?>>13</option>
                        <option<?=($birth_day == "14")?' selected="selected"':'';?>>14</option>
                        <option<?=($birth_day == "15")?' selected="selected"':'';?>>15</option>
                        <option<?=($birth_day == "16")?' selected="selected"':'';?>>16</option>
                        <option<?=($birth_day == "17")?' selected="selected"':'';?>>17</option>
                        <option<?=($birth_day == "18")?' selected="selected"':'';?>>18</option>
                        <option<?=($birth_day == "19")?' selected="selected"':'';?>>19</option>
                        <option<?=($birth_day == "20")?' selected="selected"':'';?>>20</option>
                        <option<?=($birth_day == "21")?' selected="selected"':'';?>>21</option>
                        <option<?=($birth_day == "22")?' selected="selected"':'';?>>22</option>
                        <option<?=($birth_day == "23")?' selected="selected"':'';?>>23</option>
                        <option<?=($birth_day == "24")?' selected="selected"':'';?>>24</option>
                        <option<?=($birth_day == "25")?' selected="selected"':'';?>>25</option>
                        <option<?=($birth_day == "26")?' selected="selected"':'';?>>26</option>
                        <option<?=($birth_day == "27")?' selected="selected"':'';?>>27</option>
                        <option<?=($birth_day == "28")?' selected="selected"':'';?>>28</option>
                        <option<?=($birth_day == "29")?' selected="selected"':'';?>>29</option>
                        <option<?=($birth_day == "30")?' selected="selected"':'';?>>30</option>
                        <option<?=($birth_day == "31")?' selected="selected"':'';?>>31</option>
                    </select>&nbsp;&nbsp;&nbsp;
                    <select name="birth_month" class="select_birth_date<?=(strlen($error_array['birth_month_error']) > 0)?" error":"";?>">
                        <option value="empty">�����</option>
                        <option value="1"<?=($birth_month == "1")?' selected="selected"':'';?>>������</option>
                        <option value="2"<?=($birth_month == "2")?' selected="selected"':'';?>>�������</option>
                        <option value="3"<?=($birth_month == "3")?' selected="selected"':'';?>>����</option>
                        <option value="4"<?=($birth_month == "4")?' selected="selected"':'';?>>������</option>
                        <option value="5"<?=($birth_month == "5")?' selected="selected"':'';?>>���</option>
                        <option value="6"<?=($birth_month == "6")?' selected="selected"':'';?>>����</option>
                        <option value="7"<?=($birth_month == "7")?' selected="selected"':'';?>>����</option>
                        <option value="8"<?=($birth_month == "8")?' selected="selected"':'';?>>������</option>
                        <option value="9"<?=($birth_month == "9")?' selected="selected"':'';?>>��������</option>
                        <option value="10"<?=($birth_month == "10")?' selected="selected"':'';?>>�������</option>
                        <option value="11"<?=($birth_month == "11")?' selected="selected"':'';?>>������</option>
                        <option value="12"<?=($birth_month == "12")?' selected="selected"':'';?>>�������</option>
                    </select>&nbsp;&nbsp;&nbsp;
                    <select name="birth_year" class="select_birth_date<?=(strlen($error_array['birth_year_error']) > 0)?" error":"";?>">
                        <option value="empty">���</option>
                        <option<?=($birth_year == "2012")?' selected="selected"':'';?>>2012</option>
                        <option<?=($birth_year == "2011")?' selected="selected"':'';?>>2011</option>
                        <option<?=($birth_year == "2010")?' selected="selected"':'';?>>2010</option>
                        <option<?=($birth_year == "2009")?' selected="selected"':'';?>>2009</option>
                        <option<?=($birth_year == "2008")?' selected="selected"':'';?>>2008</option>
                        <option<?=($birth_year == "2007")?' selected="selected"':'';?>>2007</option>
                        <option<?=($birth_year == "2006")?' selected="selected"':'';?>>2006</option>
                        <option<?=($birth_year == "2005")?' selected="selected"':'';?>>2005</option>
                        <option<?=($birth_year == "2004")?' selected="selected"':'';?>>2004</option>
                        <option<?=($birth_year == "2003")?' selected="selected"':'';?>>2003</option>
                        <option<?=($birth_year == "2002")?' selected="selected"':'';?>>2002</option>
                        <option<?=($birth_year == "2001")?' selected="selected"':'';?>>2001</option>
                        <option<?=($birth_year == "2000")?' selected="selected"':'';?>>2000</option>
                        <option<?=($birth_year == "1999")?' selected="selected"':'';?>>1999</option>
                        <option<?=($birth_year == "1998")?' selected="selected"':'';?>>1998</option>
                        <option<?=($birth_year == "1997")?' selected="selected"':'';?>>1997</option>
                        <option<?=($birth_year == "1996")?' selected="selected"':'';?>>1996</option>
                        <option<?=($birth_year == "1995")?' selected="selected"':'';?>>1995</option>
                        <option<?=($birth_year == "1994")?' selected="selected"':'';?>>1994</option>
                        <option<?=($birth_year == "1993")?' selected="selected"':'';?>>1993</option>
                        <option<?=($birth_year == "1992")?' selected="selected"':'';?>>1992</option>
                        <option<?=($birth_year == "1991")?' selected="selected"':'';?>>1991</option>
                        <option<?=($birth_year == "1990")?' selected="selected"':'';?>>1990</option>
                        <option<?=($birth_year == "1989")?' selected="selected"':'';?>>1989</option>
                        <option<?=($birth_year == "1988")?' selected="selected"':'';?>>1988</option>
                        <option<?=($birth_year == "1987")?' selected="selected"':'';?>>1987</option>
                        <option<?=($birth_year == "1986")?' selected="selected"':'';?>>1986</option>
                        <option<?=($birth_year == "1985")?' selected="selected"':'';?>>1985</option>
                        <option<?=($birth_year == "1984")?' selected="selected"':'';?>>1984</option>
                        <option<?=($birth_year == "1983")?' selected="selected"':'';?>>1983</option>
                        <option<?=($birth_year == "1982")?' selected="selected"':'';?>>1982</option>
                        <option<?=($birth_year == "1981")?' selected="selected"':'';?>>1981</option>
                        <option<?=($birth_year == "1980")?' selected="selected"':'';?>>1980</option>
                        <option<?=($birth_year == "1979")?' selected="selected"':'';?>>1979</option>
                        <option<?=($birth_year == "1978")?' selected="selected"':'';?>>1978</option>
                        <option<?=($birth_year == "1977")?' selected="selected"':'';?>>1977</option>
                        <option<?=($birth_year == "1976")?' selected="selected"':'';?>>1976</option>
                        <option<?=($birth_year == "1975")?' selected="selected"':'';?>>1975</option>
                        <option<?=($birth_year == "1974")?' selected="selected"':'';?>>1974</option>
                        <option<?=($birth_year == "1973")?' selected="selected"':'';?>>1973</option>
                        <option<?=($birth_year == "1972")?' selected="selected"':'';?>>1972</option>
                        <option<?=($birth_year == "1971")?' selected="selected"':'';?>>1971</option>
                        <option<?=($birth_year == "1970")?' selected="selected"':'';?>>1970</option>
                        <option<?=($birth_year == "1969")?' selected="selected"':'';?>>1969</option>
                        <option<?=($birth_year == "1968")?' selected="selected"':'';?>>1968</option>
                        <option<?=($birth_year == "1967")?' selected="selected"':'';?>>1967</option>
                        <option<?=($birth_year == "1966")?' selected="selected"':'';?>>1966</option>
                        <option<?=($birth_year == "1965")?' selected="selected"':'';?>>1965</option>
                        <option<?=($birth_year == "1964")?' selected="selected"':'';?>>1964</option>
                        <option<?=($birth_year == "1963")?' selected="selected"':'';?>>1963</option>
                        <option<?=($birth_year == "1962")?' selected="selected"':'';?>>1962</option>
                        <option<?=($birth_year == "1961")?' selected="selected"':'';?>>1961</option>
                        <option<?=($birth_year == "1960")?' selected="selected"':'';?>>1960</option>
                        <option<?=($birth_year == "1959")?' selected="selected"':'';?>>1959</option>
                        <option<?=($birth_year == "1958")?' selected="selected"':'';?>>1958</option>
                        <option<?=($birth_year == "1957")?' selected="selected"':'';?>>1957</option>
                        <option<?=($birth_year == "1956")?' selected="selected"':'';?>>1956</option>
                        <option<?=($birth_year == "1955")?' selected="selected"':'';?>>1955</option>
                        <option<?=($birth_year == "1954")?' selected="selected"':'';?>>1954</option>
                        <option<?=($birth_year == "1953")?' selected="selected"':'';?>>1953</option>
                        <option<?=($birth_year == "1952")?' selected="selected"':'';?>>1952</option>
                        <option<?=($birth_year == "1951")?' selected="selected"':'';?>>1951</option>
                        <option<?=($birth_year == "1950")?' selected="selected"':'';?>>1950</option>
                        <option<?=($birth_year == "1949")?' selected="selected"':'';?>>1949</option>
                        <option<?=($birth_year == "1948")?' selected="selected"':'';?>>1948</option>
                        <option<?=($birth_year == "1947")?' selected="selected"':'';?>>1947</option>
                        <option<?=($birth_year == "1946")?' selected="selected"':'';?>>1946</option>
                        <option<?=($birth_year == "1945")?' selected="selected"':'';?>>1945</option>
                        <option<?=($birth_year == "1944")?' selected="selected"':'';?>>1944</option>
                        <option<?=($birth_year == "1943")?' selected="selected"':'';?>>1943</option>
                        <option<?=($birth_year == "1942")?' selected="selected"':'';?>>1942</option>
                        <option<?=($birth_year == "1941")?' selected="selected"':'';?>>1941</option>
                        <option<?=($birth_year == "1940")?' selected="selected"':'';?>>1940</option>
                    </select></div>
                    <?
                    if(strlen($error_array['birth_day_error']) > 0)
					{
						?><div class="form_error"><?=$error_array['birth_day_error']?></div><?
                    }
                    if(strlen($error_array['birth_month_error']) > 0)
					{
						?><div class="form_error"><?=$error_array['birth_month_error']?></div><?
                    }
                    if(strlen($error_array['birth_year_error']) > 0)
					{
						?><div class="form_error"><?=$error_array['birth_year_error']?></div><?
                    }
					?>
                    <script>
                    function autoFocus(fieldValue, fieldMaxLength, nextFieldID)
					{
						if (fieldValue.length == fieldMaxLength)
						{
							//alert(fieldValue);
							document.getElementById(nextFieldID).focus();
						}
					}
                    </script>
                    <div class="form_name">��������� �������:</div>
                    <div class="form_field<?=(strlen($error_array['phone_error']) > 0)?" error":"";?>">
                    	<div style="float:left; margin:6px 4px 0 0;">+7</div>
                        <div style="float:left; font-size:18px; margin:0 5px 0 0;">(<input type="text" name="phone_prefix" id="phone_prefix" value="<?=(isset($phone_prefix))?$phone_prefix:'';?>" maxlength="3" style="width:23px; padding:0 4px;" onkeyup="javascript:autoFocus(this.value, 3, 'phone_block1');" />)</div>
                    	<div style="float:left; font-size:18px; margin:0 5px 0 0;"><input type="text" name="phone_block1" id="phone_block1" maxlength="3" value="<?=(isset($phone_block1))?$phone_block1:'';?>" style="float:left; width:23px; padding:0 4px; margin:0 5px 0 0;" onkeyup="javascript:autoFocus(this.value, 3, 'phone_block2');" /> - </div>
                    	<div style="float:left; font-size:18px; margin:0 5px 0 0;"><input type="text" name="phone_block2" id="phone_block2" maxlength="2" value="<?=(isset($phone_block2))?$phone_block2:'';?>" style="float:left; width:15px; padding:0 4px; margin:0 5px 0 0;" onkeyup="javascript:autoFocus(this.value, 2, 'phone_block3');" /> - </div>
                    	<div style="float:left; font-size:18px; margin:0 5px 0 0;"><input type="text" name="phone_block3" id="phone_block3" maxlength="2" value="<?=(isset($phone_block3))?$phone_block3:'';?>" style="float:left; width:15px; padding:0 4px; margin:0 5px 0 0;" /></div>
                    </div>
                    <div style="clear:both;"></div>
                    <?
                    if(strlen($error_array['phone_error']) > 0)
					{
						?><div class="form_error"><?=$error_array['phone_error']?></div><?
                    }
					if (!isset($_POST['anketaformsent']) || (strlen($error_array['phone_error']) > 0 && $error_array['phone_lang_error'] != 1) || $phone == "")
					{
						?><div class="form_field_descr">��������: (495) 777-89-99</div><?
					}
					?>
                    <div class="form_name">����������� �����:</div>
                    <div class="form_field<?=(strlen($error_array['email_error']) > 0)?" error":"";?>"><input type="text" name="email" value="<?=(isset($email))?$email:'';?>" maxlength="30" /></div>
                    <?
                    if(strlen($error_array['email_error']) > 0)
					{
						?><div class="form_error"><?=$error_array['email_error']?></div><?
                    }
					?>
                    <div class="form_field checkbox_float"><input type="checkbox" name="catalog_by_post" id="catalog_by_post" value="1" class="checkbox"<?=($catalog_by_post == 1)?' checked="checked"':'';?> /></div>
                    <div class="checkbox_descr">&mdash;&nbsp;<label for="catalog_by_post">� ���� �������� �� ����� ������� ���������</label></div>
                    <div class="clear_both"></div>
                    <div class="form_field checkbox_float"><input type="checkbox" name="news_by_sms" id="news_by_sms" value="1" class="checkbox"<?=($news_by_sms == 1)?' checked="checked"':'';?> /></div>
                    <div class="checkbox_descr">&mdash;&nbsp;<label for="news_by_sms">� ���� �������� ������� �� ������ �� SMS</label></div>
                    <div class="clear_both"></div>
                    <div class="form_field checkbox_float"><input type="checkbox" name="news_by_email" id="news_by_email" value="1" class="checkbox"<?=($news_by_email == 1)?' checked="checked"':'';?> /></div>
                    <div class="checkbox_descr">&mdash;&nbsp;<label for="news_by_email">� ���� �������� ������� �� ������ �� E-mail</label></div>
                    <div class="clear_both"></div>
                </td>
                <td style="width:50%;" valign="top">
                    <h3>����� ����������</h3>
                    <div class="form_name">�������� ������:</div>
                    <div class="form_field"><input type="text" name="post_index" value="<?=(isset($post_index))?$post_index:'';?>" maxlength="6" /></div>
                    <?
                    if(strlen($error_array['post_index_error']) > 0)
					{
						?><div class="form_error"><?=$error_array['post_index_error']?></div><?
                    }
					if (!isset($_POST['anketaformsent']) || (strlen($error_array['post_index_error']) > 0 && $error_array['phone_lang_error'] != 1) || $post_index == "")
					{
						?><div class="form_field_descr">��������: 141408</div><?
					}
					?>
                    <div class="form_name">�����<span>*</span>:</div>
                    <div class="form_field"><input type="text" name="city" value="<?=(isset($city))?$city:'';?>" maxlength="30" /></div>
                    <?
                    if(strlen($error_array['city_error']) > 0)
					{
						?><div class="form_error"><?=$error_array['city_error']?></div><?
                    }
					if (!isset($_POST['anketaformsent']) || (strlen($error_array['city_error']) > 0 && $error_array['city_error'] != 1))
					{
						?><div class="form_field_descr">��� ����� ���������� ����������� ������� �����</div><?
					}
					?>
                    <div class="form_name">�����<span>*</span>:</div>
                    <div class="form_field"><input type="text" name="street" value="<?=(isset($street))?$street:'';?>" maxlength="30" /></div>
                    <?
                    if(strlen($error_array['street_error']) > 0)
					{
						?><div class="form_error"><?=$error_array['street_error']?></div><?
                    }
					if (!isset($_POST['anketaformsent']) || (strlen($error_array['street_error']) > 0 && $error_array['street_error'] != 1))
					{
						?><div class="form_field_descr">��� ����� ���������� ����������� ������� �����</div><?
					}
					?>
                    <div class="form_name">���<span>*</span>:</div>
                    <div class="form_field"><input type="text" name="house" value="<?=(isset($house))?$house:'';?>" maxlength="3" /></div>
                    <?
                    if(strlen($error_array['house_error']) > 0)
					{
						?><div class="form_error"><?=$error_array['house_error']?></div><?
                    }
					?>
                    <div class="form_name">������:</div>
                    <div class="form_field"><input type="text" name="building" value="<?=(isset($building))?$building:'';?>" maxlength="3" /></div>
                    <?
                    if(strlen($error_array['building_error']) > 0)
					{
						?><div class="form_error"><?=$error_array['building_error']?></div><?
                    }
					?>
                    <div class="form_name">��������<span>*</span>:</div>
                    <div class="form_field"><input type="text" name="flat" value="<?=(isset($flat))?$flat:'';?>" maxlength="3" /></div>
                    <?
                    if(strlen($error_array['flat_error']) > 0)
					{
						?><div class="form_error"><?=$error_array['flat_error']?></div><?
                    }
					?>
                    <div class="form_name">������� ��� � �������� � ���� ����<span>*</span>:</div>
                    <div class="form_name"><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$code;?>" width="180" height="40" alt="������� ��� � ���� �������� � ���� ����" title="������� ��� � ���� �������� � ���� ����" /></div>
                    <div class="form_field<?=(strlen($error_array['captcha_word_error']) > 0)?' error':'';?>">
                        <input type="input" name="captcha_word" value="" />
                    </div>
					<?
                    if(strlen($error_array['captcha_word_error']) > 0)
                    {
                        ?><div class="form_error"><?=$error_array['captcha_word_error']?></div><?
                    }
                    ?>
                    <div class="form_name">����, ���������� (<span>*</span>), ����������� ��� ����������.</div>
                </td>
            </tr>
        </table>
        <div class="form_submit"><input type="submit" name="submit" value="���������" /></div>
    </form>
	<?
}
?>



</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
