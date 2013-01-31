<?
define("UPDATE_SYSTEM_VERSION", "99.0.0");
error_reporting(E_ALL &~E_NOTICE);

if (!function_exists("file_get_contents"))
{
	function file_get_contents($filename)
	{
		$fd = fopen("$filename", "rb");
		$content = fread($fd, filesize($filename));
		fclose($fd);
		return $content;
	}
}

if (function_exists('mb_internal_encoding'))
	mb_internal_encoding('ISO-8859-1');

if ($_REQUEST['lang']=='en')
	define("LANGUAGE_ID",'en');
else
	define("LANGUAGE_ID",'ru');

require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/tools.php");
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/lang/".LANGUAGE_ID."/classes/general/update_update5.php");
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/lang/".LANGUAGE_ID."/interface/auth/authorize.php");

require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/dbconn.php");
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/classes/".$DBType."/database.php");

if (defined("BX_UTF"))
	header("Content-Type: text/html; charset=utf-8");
elseif (LANGUAGE_ID == "ru")
	header("Content-Type: text/html; charset=windows-1251");

$strError = "";
$include_file = $_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include.php";
$license_file = $_SERVER['DOCUMENT_ROOT']."/bitrix/license_key.php";

$DB = new CDatabase;
$DB->debug = $DBDebug;

$bSuccess = false;

$DB->Connect($DBHost, $DBName, $DBLogin, $DBPassword);

if ($_POST['TYPE']=='SAVE_KEY') // Проверяем данные формы
{
	$res = $DB->Query('SELECT PASSWORD,ID FROM b_user WHERE LOGIN="'.mysql_escape_string($_POST['USER_LOGIN']).'"');
	$f=$res->Fetch();
	$f['ID'] = intval($f['ID']);
	$salt = substr($f["PASSWORD"], 0, strlen($f["PASSWORD"]) - 32);
	if ($f['ID'] && $f['PASSWORD']==$salt.md5($salt.$_POST['USER_PASSWORD'])) // авторизовались 
	{
		$res1 = $DB->Query('SELECT GROUP_ID FROM b_user_group WHERE USER_ID="'.$f['ID'].'" AND GROUP_ID=1');
		$f1 = $res1->Fetch();
		$f1['GROUP_ID'] = intval($f1['GROUP_ID']);
		if ($f1['GROUP_ID']==1) // имеет админские права
		{
			if (!($f=fopen($license_file,"wb")))
				$strError = str_replace("#FILE#",$license_file,GetMessage("SUPP_RV_NO_WRITE"));
			else
			{
				fputs($f,'<? $LICENSE_KEY = "'.htmlspecialchars($_POST['NEW_LICENSE_KEY']).'"; ?>');
				fclose($f);

				unset($LICENSE_KEY);
				require($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/classes/general/version.php");
				require($_SERVER['DOCUMENT_ROOT']."/bitrix/license_key.php");

				$strVars = "LICENSE_KEY=".urlencode(md5($LICENSE_KEY)).
					"&CLIENT_SITE=".urlencode($_SERVER["SERVER_NAME"]).
					"&CANGZIP=".urlencode("N").
					"&UTYPES=".urlencode("R").
					"&COUNT_ONLY=".urlencode("F").
					"&VERSION=".urlencode(SM_VERSION).
					"&SUPD_STS=".urlencode(2). // число сайтов
					"&SUPD_DBS=".urlencode($GLOBALS["DB"]->type).
					"&XE=".urlencode($DB->XE ? "Y" : "N").
					"&SUPD_VER=".urlencode(UPDATE_SYSTEM_VERSION).
					"&CLIENT_PHPVER=".urlencode(phpversion()).
					"&lang=".urlencode($_REQUEST['lang']);

				$strRes = HTTPPost($strVars, $strError);
				if (preg_match('#<ERROR[^>]*>([^<]+)</ERROR>#i',$strRes,$regs))
					$strError = $regs[1];
					if (function_exists("html_entity_decode"))
						$strError = html_entity_decode($strError);

				if (!$strError)
				{
					$pointer = 0;
					if (read(strlen("BITRIX"))!="BITRIX")
						$strError = GetMessage("SUPP_PSD_BAD_RESPONSE");
					else
					{
						while (true)
						{
							$add_info_size = read(5);
							if ($add_info_size=='RTIBE')
								break;

							$add_info_size = intval(trim($add_info_size));
							$add_info = read($add_info_size);
							$add_info_arr = explode("|", $add_info);
							if (count($add_info_arr) != 3)
							{
								$strError = GetMessage("SUPP_PSD_BAD_RESPONSE");
								break;
							}

							$size = $add_info_arr[0];
							$curpath = $add_info_arr[1];
							$crc32 = $add_info_arr[2];

							$contents = read($size);
							$crc32_new = dechex(crc32($contents));
							if ($crc32_new != $crc32)
							{
								$strError = GetMessage("SUPP_PSD_BAD_TRANS");
								break;
							}
							elseif (preg_match('#include.php$#',$curpath))
							{
								if (is_writable($include_file))
								{
									$f=fopen($include_file,"wb");
									fputs($f,$contents);
									fclose($f);
									
									if (dechex(crc32(file_get_contents($include_file)))==$crc32)
										$bSuccess = true;
									else
										$strError = GetMessage("SUPP_RV_ERR_COPY");
								}
								else
									$strError = str_replace("#FILE#", $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules", GetMessage("SUPP_CU_MAIN_ERR_CAT"));
							}
							elseif (preg_match('#update_info.xml$#',$curpath))
							{
								if (preg_match('#CRC_CODE="([^\"]+)"#i',$contents,$regs))
								{
									$crc_new = $regs[1];
									$res = $DB->Query(
											"DELETE ".
											"FROM b_option ".
											"WHERE MODULE_ID='main' AND NAME='crc_code'",
											true
											);
									$res = $DB->Query(
											"INSERT INTO b_option ".
											"(MODULE_ID,NAME,VALUE) ".
											"VALUES ('main', 'crc_code', \"".addslashes($crc_new)."\")",
											true
											);
									@unlink($_SERVER['DOCUMENT_ROOT']."/bitrix/managed_cache/".strtoupper($DBType)."/e5/".md5("b_option").".php");
								}
							}
						}
					}
				}

				if(!$strError && !$bSuccess) // не найден файл include.php в ответе сервера 
					$strError = GetMessage("SUPP_RV_NO_FILE");
			}
		}
		else
			$strError = GetMessage("admin_authorize_error");
	}
	else
		$strError = GetMessage("admin_authorize_error");
}


?>
<html><head>
<link rel="stylesheet" type="text/css" href="/bitrix/themes/.default/sysupdate.css">
<link rel="stylesheet" type="text/css" href="/bitrix/themes/.default/adminstyles.css">
</head><body>
<?

if ($bSuccess)
	Message(GetMessage("SUP_SUCCESS"));
else
{
	if ($strError)
		Error($strError);

	/// ФОРМА
	$sMess = GetMessage("SUP_NO_KEY_PROMT_SRC", array("#URL_SET#"=>"/bitrix/admin/settings.php", "#URL#"=>"http://www.bitrixsoft.".(LANGUAGE_ID=="ru"? "ru" : "com")."/support/"));
	ob_start();
	?>
		<input type="text" name="NEW_LICENSE_KEY" value="" size="30">
		<input type="hidden" name="TYPE" value="SAVE_KEY">
		<input type="hidden" name="lang" value="<?= LANGUAGE_ID ?>">

		<input type="submit" value="<?= GetMessage("SUP_NO_KEY_ENTER_DO") ?>">
	</form>
	<?
	$sForm = ob_get_contents();
	ob_end_clean();
	?>
	<form method="POST" action="/bitrix/register.php">
	<table align=center width=600 cellpadding=0 cellspacing=0><tr><td>
	<div class="bx-auth-form">
		<div class="bx-auth-header"><?=GetMessage("SUP_AUTH_ADMIN")?></div>

		<div class="bx-auth-picture"></div>
		<div class="bx-auth-table">
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td class="bx-auth-label"><?=GetMessage("AUTH_LOGIN")?>:</td>
				<td><input type="text" name="USER_LOGIN" maxlength="50" size="20" value="<?echo htmlspecialchars($_POST['USER_LOGIN'])?>" class="input-text"></td>
			</tr>
			<tr>
				<td class="bx-auth-label"><?=GetMessage("AUTH_PASSWORD")?>:</td>
				<td><input type="password" name="USER_PASSWORD" maxlength="50" size="20" class="input-text"></td>
			</tr>
		</table>
		</div>
		<br clear="all">
	</div>
	<?= ShowBlock($sMess, $sForm, "icon-licence");?>
	</tr></td></table>
	<?
}

////////// FUNCTIONS ////////////////////
function read($val)
{
	global $pointer, $strRes;
	$res = substr($strRes,$pointer,$val);
	$pointer+=$val;
	return $res;
}

function Error($str)
{
	echo "
	<br>
	<table width=600 align=center cellspacing=2 cellpadding=10 bgcolor=red><tr><td align=center bgcolor=white>
	<font style='color:red'><b>".$str."</b></font>
	</td></tr></table>
	<br>
	";
}

function Message($str)
{
	echo "
	<br>
	<table width=600 align=center cellspacing=2 cellpadding=10 bgcolor=green><tr><td align=center bgcolor=white>
	<font style='color:green'><b>".$str."</b></font>
	</td></tr></table>
	<br>
	";
}

function HTTPPost($strVars, &$strError)
{
	global $SERVER_NAME, $DB;

	$page="bit_sysserver.php";
	$ServerIP="www.bitrixsoft.com";

	$res = $DB->Query(
			"SELECT SITE_ID, NAME, VALUE ".
			"FROM b_option ".
			"WHERE MODULE_ID='main' AND NAME='crc_code'",
			true
			);

	$ar = $res->Fetch();
	$CRCCode = $ar['VALUE'];
	$strVars .= "&spd=".urlencode($CRCCode);

	$FP = fsockopen($ServerIP, 80, $errno, $errstr, 5);

	if ($FP)
	{
		$strRequest = "";

		$strRequest .= "POST /bitrix/updates/".$page." HTTP/1.0\r\n";

		$strRequest .= "User-Agent: BitrixSMUpdater\r\n";
		$strRequest .= "Accept: */*\r\n";
		$strRequest .= "Host: ".$ServerIP."\r\n";
		$strRequest .= "Accept-Language: en\r\n";
		$strRequest .= "Content-type: application/x-www-form-urlencoded\r\n";
		$strRequest .= "Content-length: ".strlen($strVars)."\r\n\r\n";
		$strRequest .= "$strVars";
		$strRequest .= "\r\n";

		fputs($FP, $strRequest);

		while (($line = fgets($FP, 4096)) && $line!="\r\n");

		$content = "";
		while ($line = fread($FP, 4096))
		{
			$content .= $line;
		}

		fclose($FP);
	}
	else
	{
		$content = "";
		$strError .= GetMessage("SUPP_GHTTP_ER").": [".$errno."] ".$errstr.". ";
		if (IntVal($errno)<=0) $strError .= GetMessage("SUPP_GHTTP_ER_DEF")." ";
	}
	return $content;
}

	function ShowBlock($top, $bottom="", $icon="")
	{
		$s = '
<div class="update-block">
<table cellspacing="0" cellpadding="0" border="0" class="update-block">
	<tr class="top">
		<td class="left"><div class="empty"></div></td>
		<td><div class="empty"></div></td>
		<td class="right"><div class="empty"></div></td>
	</tr>
	<tr>
		<td class="left"><div class="empty"></div></td>
		<td class="content">
			<div class="top">
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td class="icon"><div class="icon '.$icon.'"></div></td>
						<td>'.$top.'</td>
					</tr>
				</table>
			</div>';

		if($bottom <> "")
		{
			$s .= '
			<div class="bottom">
				<table cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td class="icon" width="0%"><div class="icon"></div></td>
						<td width="100%">'.$bottom.'</td>
					</tr>
				</table>
			</div>
';			
		}
		
		$s .= '
		</td>
		<td class="right"><div class="empty"></div></td>
	</tr>
	<tr class="bottom">
		<td class="left"><div class="empty"></div></td>
		<td><div class="empty"></div></td>
		<td class="right"><div class="empty"></div></td>
	</tr>
</table>
</div>
';
		return $s;
	}
?>
