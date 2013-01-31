<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
if (!IsModuleInstalled("vote")): 
	ShowError(GetMessage("VOTE_MODULE_IS_NOT_INSTALLED"));
	return;
elseif (intVal($arParams["VOTE_ID"]) <= 0):
	ShowError(GetMessage("VOTE_EMPTY"));
	return;
endif;

require_once($_SERVER["DOCUMENT_ROOT"].$componentPath."/functions.php");
/********************************************************************
				Input params
********************************************************************/
/************** BASE ***********************************************/
	$arParams["VOTE_ID"] = intVal($arParams["VOTE_ID"]);
/************** URL ************************************************/
	$URL_NAME_DEFAULT = array(
			"vote_result" => "PAGE_NAME=vote_result&VOTE_ID=#VOTE_ID#");
	foreach ($URL_NAME_DEFAULT as $URL => $URL_VALUE):
		if (strLen(trim($arParams[strToUpper($URL)."_TEMPLATE"])) <= 0)
			$arParams[strToUpper($URL)."_TEMPLATE"] = $APPLICATION->GetCurPage()."?".$URL_VALUE;
		$arParams["~".strToUpper($URL)."_TEMPLATE"] = $arParams[strToUpper($URL)."_TEMPLATE"];
		$arParams[strToUpper($URL)."_TEMPLATE"] = htmlspecialchars($arParams["~".strToUpper($URL)."_TEMPLATE"]);
	endforeach;
/************** CACHE **********************************************/
	if ($arParams["CACHE_TYPE"] == "Y" || ($arParams["CACHE_TYPE"] == "A" && COption::GetOptionString("main", "component_cache_on", "Y") == "Y"))
		$arParams["CACHE_TIME"] = intval($arParams["CACHE_TIME"]);
	else
		$arParams["CACHE_TIME"] = 0;

	$arParams["ADDITIONAL_CACHE_ID"] = (isset($arParams["ADDITIONAL_CACHE_ID"]) && strlen($arParams["ADDITIONAL_CACHE_ID"]) > 0 ?
		$arParams["ADDITIONAL_CACHE_ID"] : $USER->GetGroups());
/********************************************************************
				/Input params
********************************************************************/
if ($GLOBALS["VOTING_OK"] == "Y") 
{
	$strNavQueryString = DeleteParam(array("VOTE_ID", "VOTING_OK", "VOTE_SUCCESSFULL"));
	$strNavQueryString = ($strNavQueryString <> "" ? "&".$strNavQueryString : $strNavQueryString);
	$url = CComponentEngine::MakePathFromTemplate(
			$arParams["VOTE_RESULT_TEMPLATE"]."&VOTE_SUCCESSFULL=Y".$strNavQueryString,
			array("VOTE_ID" => $arParams["VOTE_ID"]));
	LocalRedirect($url);
}
/********************************************************************
				Default values
********************************************************************/
$arResult["OK_MESSAGE"] = "";
$arResult["ERROR_MESSAGE"] = "";
$arResult["CHANNEL"] = array();
$arResult["VOTE"] = array();
$arResult["QUESTIONS"] = array();
$arResult["GROUP_ANSWERS"] = array();
$arResult["~CURRENT_PAGE"] = $APPLICATION->GetCurPageParam("", array("VOTE_ID","VOTING_OK","VOTE_SUCCESSFULL"));
$arResult["CURRENT_PAGE"] = htmlspecialchars($arResult["~CURRENT_PAGE"]);
$cache = new CPHPCache;
$cache_path_main = str_replace(array(":", "//"), "/", "/".SITE_ID."/".$componentName."/");

$arError = array(); $arNote = array();
if ($GLOBALS["VOTING_OK"] == "Y" || $_REQUEST["VOTE_SUCCESSFULL"] == "Y") 
	$arNote[] = array(
		"id" => "ok", 
		"text" => GetMessage("VOTE_OK"));

if ($GLOBALS["USER_ALREADY_VOTE"] == "Y")
	$arError[] = array(
		"id" => "already vote", 
		"text" => GetMessage("VOTE_ALREADY_VOTE"));
if ($GLOBALS["VOTING_LAMP"] == "red") 
	$arError[] = array(
		"id" => "red lamp", 
		"text" => GetMessage("VOTE_RED_LAMP"));

/********************************************************************
				/Default values
********************************************************************/

/********************************************************************
				Data
********************************************************************/
$cache_id = serialize(array($arParams["ADDITIONAL_CACHE_ID"], $arParams["VOTE_ID"], $GLOBALS["USER"]->GetGroups()));
$cache_path = $cache_path_main;
if ($arParams["CACHE_TIME"] > 0 && $cache->InitCache($arParams["CACHE_TIME"], $cache_id, $cache_path))
{
	$res = $cache->GetVars();
	$arResult["CHANNEL"] = $res["CHANNEL"];
	$arResult["VOTE"] = $res["VOTE"];
	$arResult["QUESTIONS"] = $res["QUESTIONS"];
	$arResult["GROUP_ANSWERS"] = $res["GROUP_ANSWERS"];
}
else
{
	CModule::IncludeModule("vote");
	$arParams["VOTE_ID"] = GetVoteDataByID($arParams["VOTE_ID"], $arChannel, $arVote, $arQuestions, $arAnswers, $arDropDown, $arMultiSelect, $arGroupAnswers, "N");
	if (intval($arParams["VOTE_ID"]) <= 0)
	{
		ShowError(GetMessage("VOTE_NOT_FOUND"));
		return;
	}
	elseif (CVoteChannel::GetGroupPermission($arChannel["ID"]) < 2)
	{
		$arError[] = array(
			"id" => "access denied", 
			"text" => GetMessage("VOTE_ACCESS_DENIED"));
	}
	else
	{
		$defaultWidth = "10";
		$defaultHeight = "5";
		$questionSize = count($arQuestions);
		for ($questionIndex = 0; $questionIndex < $questionSize; $questionIndex++)
		{
			$QuestionID = $arQuestions[$questionIndex]["ID"];
	
			if (!array_key_exists($QuestionID, $arAnswers))
			{
				unset($arQuestions[$questionIndex]);
				unset($arAnswers[$QuestionID]);
				continue;
			}
	
			$arQuestions[$questionIndex]["ANSWERS"] = Array();
	
			$foundDropdown = $foundMultiselect = false;
			
			foreach ($arAnswers[$QuestionID] as $arAnswer)
			{
				if ($arAnswer["FIELD_TYPE"] == 2)
				{
					if ($foundDropdown == false)
					{
						$arQuestions[$questionIndex]["ANSWERS"][] = $arAnswer + Array(
							"DROPDOWN" => _GetAnswerArray($QuestionID, $arAnswer["FIELD_TYPE"], $arAnswers),
							"MULTISELECT" => Array(),
						);
						$foundDropdown = true;
					}
				}
				elseif($arAnswer["FIELD_TYPE"] == 3)
				{
					if ($foundMultiselect == false)
					{
						$arQuestions[$questionIndex]["ANSWERS"][] = $arAnswer + Array(
							"MULTISELECT" => _GetAnswerArray($QuestionID, $arAnswer["FIELD_TYPE"], $arAnswers),
							"DROPDOWN" => Array(),
						);
						$foundMultiselect = true;
					}
				}
				else
				{
					if ($arAnswer["FIELD_TYPE"] == 4)
					{
						$arAnswer["FIELD_WIDTH"] = (intval($arAnswer["FIELD_WIDTH"]) > 0 ? intval($arAnswer["FIELD_WIDTH"]) : $defaultWidth);
					}
					elseif($arAnswer["FIELD_TYPE"] == 5)
					{
						$arAnswer["FIELD_WIDTH"] = (intval($arAnswer["FIELD_WIDTH"]) > 0 ? intval($arAnswer["FIELD_WIDTH"]) : $defaultWidth);
						$arAnswer["FIELD_HEIGHT"] = (intval($arAnswer["FIELD_HEIGHT"]) > 0 ? intval($arAnswer["FIELD_HEIGHT"]) : $defaultHeight);
					}
	
					$arQuestions[$questionIndex]["ANSWERS"][] = $arAnswer + Array("DROPDOWN" => Array(), "MULTISELECT" => Array());
				}
			}
			//Images
			$arQuestions[$questionIndex]["IMAGE"] = CFile::GetFileArray($arQuestions[$questionIndex]["IMAGE_ID"]);
		}
	
		//Vote Image
		$arVote["IMAGE"] = CFile::GetFileArray($arVote["IMAGE_ID"]);
		
		$arResult["CHANNEL"] = $arChannel;
		$arResult["VOTE"] = $arVote;
		$arResult["QUESTIONS"] = $arQuestions;
		$arResult["GROUP_ANSWERS"] = $arGroupAnswers;
		if ($arParams["CACHE_TIME"] > 0):
			$cache->StartDataCache($arParams["CACHE_TIME"], $cache_id, $cache_path);
			$cache->EndDataCache(array(
				"CHANNEL" => $arResult["CHANNEL"], 
				"VOTE" => $arResult["VOTE"], 
				"QUESTIONS" => $arResult["QUESTIONS"], 
				"GROUP_ANSWERS" => $arResult["GROUP_ANSWERS"]));
		endif;
	}
}
if (!empty($arNote)):
	$e = new CAdminException($arNote);
	$arResult["OK_MESSAGE"] = $e->GetString();
endif;

if (!empty($arError)):
	$e = new CAdminException($arError);
	$arResult["ERROR_MESSAGE"] = $e->GetString();
endif;
/********************************************************************
				/Data
********************************************************************/
unset($arQuestions);
unset($arChannel);
unset($arVote);
unset($arAnswers);
unset($arDropDown);
unset($arMultiSelect);

$this->IncludeComponentTemplate();
?>