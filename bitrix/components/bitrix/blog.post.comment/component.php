<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!CModule::IncludeModule("blog"))
{
	ShowError(GetMessage("BLOG_MODULE_NOT_INSTALL"));
	return;
}
$arParams["SOCNET_GROUP_ID"] = IntVal($arParams["SOCNET_GROUP_ID"]);
$bSoNet = false;
$bGroupMode = false;
if (CModule::IncludeModule("socialnetwork") && (IntVal($arParams["SOCNET_GROUP_ID"]) > 0 || IntVal($arParams["USER_ID"]) > 0))
{
	$bSoNet = true;

	if(IntVal($arParams["SOCNET_GROUP_ID"]) > 0)
		$bGroupMode = true;
	
	if($bGroupMode)
	{
		if(!CSocNetFeatures::IsActiveFeature(SONET_ENTITY_GROUP, $arParams["SOCNET_GROUP_ID"], "blog"))
		{
			return;
		}
	}
	else
	{
		if (!CSocNetFeatures::IsActiveFeature(SONET_ENTITY_USER, $arParams["USER_ID"], "blog"))
		{
			return;
		}
	}
}

$arParams["ID"] = intval($arParams["~ID"]);
if($arParams["ID"] > 0 && $arParams["ID"]."" != $arParams["~ID"])
{
	return;
}
$arParams["BLOG_URL"] = preg_replace("/[^a-zA-Z0-9_-]/is", "", Trim($arParams["BLOG_URL"]));
if(!is_array($arParams["GROUP_ID"]))
	$arParams["GROUP_ID"] = array($arParams["GROUP_ID"]);
foreach($arParams["GROUP_ID"] as $k=>$v)
	if(IntVal($v) <= 0)
		unset($arParams["GROUP_ID"][$k]);

if ($arParams["CACHE_TYPE"] == "Y" || ($arParams["CACHE_TYPE"] == "A" && COption::GetOptionString("main", "component_cache_on", "Y") == "Y"))
	$arParams["CACHE_TIME"] = intval($arParams["CACHE_TIME"]);
else
	$arParams["CACHE_TIME"] = 0;	
if(strLen($arParams["BLOG_VAR"])<=0)
	$arParams["BLOG_VAR"] = "blog";
if(strLen($arParams["PAGE_VAR"])<=0)
	$arParams["PAGE_VAR"] = "page";
if(strLen($arParams["USER_VAR"])<=0)
	$arParams["USER_VAR"] = "id";
if(strLen($arParams["POST_VAR"])<=0)
	$arParams["POST_VAR"] = "id";
if(strLen($arParams["NAV_PAGE_VAR"])<=0)
	$arParams["NAV_PAGE_VAR"] = "pagen";
if(strLen($arParams["COMMENT_ID_VAR"])<=0)
	$arParams["COMMENT_ID_VAR"] = "commentId";
if(IntVal($_GET[$arParams["NAV_PAGE_VAR"]])>0)
	$pagen = IntVal($_REQUEST[$arParams["NAV_PAGE_VAR"]]);
else
	$pagen = 1;

if(IntVal($arParams["COMMENTS_COUNT"])<=0)
	$arParams["COMMENTS_COUNT"] = 25;
	
if($arParams["USE_ASC_PAGING"] != "Y")
	$arParams["USE_DESC_PAGING"] = "Y";

$arParams["PATH_TO_BLOG"] = trim($arParams["PATH_TO_BLOG"]);
if(strlen($arParams["PATH_TO_BLOG"])<=0)
	$arParams["PATH_TO_BLOG"] = htmlspecialchars($APPLICATION->GetCurPage()."?".$arParams["PAGE_VAR"]."=blog&".$arParams["BLOG_VAR"]."=#blog#");

$arParams["PATH_TO_USER"] = trim($arParams["PATH_TO_USER"]);
if(strlen($arParams["PATH_TO_USER"])<=0)
	$arParams["PATH_TO_USER"] = htmlspecialchars($APPLICATION->GetCurPage()."?".$arParams["PAGE_VAR"]."=user&".$arParams["USER_VAR"]."=#user_id#");

$arParams["PATH_TO_POST"] = trim($arParams["PATH_TO_POST"]);
if(strlen($arParams["PATH_TO_POST"])<=0)
	$arParams["PATH_TO_POST"] = htmlspecialchars($APPLICATION->GetCurPage()."?".$arParams["PAGE_VAR"]."=post&".$arParams["BLOG_VAR"]."=#blog#"."&".$arParams["POST_VAR"]."=#post_id#");

$arParams["PATH_TO_SMILE"] = strlen(trim($arParams["PATH_TO_SMILE"]))<=0 ? false : trim($arParams["PATH_TO_SMILE"]);

if (!array_key_exists("PATH_TO_CONPANY_DEPARTMENT", $arParams))
	$arParams["PATH_TO_CONPANY_DEPARTMENT"] = "/company/structure.php?set_filter_structure=Y&structure_UF_DEPARTMENT=#ID#";
if (!array_key_exists("PATH_TO_MESSAGES_CHAT", $arParams))
	$arParams["PATH_TO_MESSAGES_CHAT"] = "/company/personal/messages/chat/#user_id#/";
if (!array_key_exists("PATH_TO_VIDEO_CALL", $arParams))
	$arParams["PATH_TO_VIDEO_CALL"] = "/company/personal/video/#user_id#/";

if (strlen(trim($arParams["NAME_TEMPLATE"])) <= 0)
	$arParams["NAME_TEMPLATE"] = GetMessage('B_B_PC_MES_NAME_TEMPLATE_DEFAULT');
$arParams['SHOW_LOGIN'] = $arParams['SHOW_LOGIN'] != "N" ? "Y" : "N";	

if($arParams["SIMPLE_COMMENT"] == "Y")
	$simpleComment = true;
else
	$simpleComment = false;

$bUseTitle = true;
$arParams["NOT_USE_COMMENT_TITLE"] = ($arParams["NOT_USE_COMMENT_TITLE"] != "Y") ? "N" : "Y";
if($arParams["NOT_USE_COMMENT_TITLE"] == "Y")
	$bUseTitle = false;
	
$commentUrlID = IntVal($_REQUEST[$arParams["COMMENT_ID_VAR"]]);

$arParams["DATE_TIME_FORMAT"] = trim(empty($arParams["DATE_TIME_FORMAT"]) ? $DB->DateFormatToPHP(CSite::GetDateFormat("FULL")) : $arParams["DATE_TIME_FORMAT"]);


$user_id = $USER->GetID();
$arResult["canModerate"] = false;

$blogModulePermissions = $GLOBALS["APPLICATION"]->GetGroupRight("blog");

if($bSoNet)
{
	$arResult["Perm"] = BLOG_PERMS_DENY;
	$arFilterblg = Array(
		    "ACTIVE" => "Y",
			"GROUP_ID" => $arParams["GROUP_ID"],
			"GROUP_SITE_ID" => SITE_ID,
			);
	
	if($bGroupMode)
	{
		$arFilterblg["SOCNET_GROUP_ID"] = $arParams["SOCNET_GROUP_ID"];
		$arResult["Perm"] = BLOG_PERMS_DENY;
		$arResult["PostPerm"] = BLOG_PERMS_DENY;
		
		if (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_GROUP, $arParams["SOCNET_GROUP_ID"], "blog", "full_post", CSocNetUser::IsCurrentUserModuleAdmin()))
			$arResult["PostPerm"] = BLOG_PERMS_FULL;
		elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_GROUP, $arParams["SOCNET_GROUP_ID"], "blog", "premoderate_post"))
			$arResult["PostPerm"] = BLOG_PERMS_PREMODERATE;
		elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_GROUP, $arParams["SOCNET_GROUP_ID"], "blog", "write_post"))
			$arResult["PostPerm"] = BLOG_PERMS_WRITE;
		elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_GROUP, $arParams["SOCNET_GROUP_ID"], "blog", "moderate_post"))
			$arResult["PostPerm"] = BLOG_PERMS_MODERATE;
		elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_GROUP, $arParams["SOCNET_GROUP_ID"], "blog", "view_post"))
			$arResult["PostPerm"] = BLOG_PERMS_READ;

		if($arResult["PostPerm"] > BLOG_PERMS_DENY)
		{
			if (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_GROUP, $arParams["SOCNET_GROUP_ID"], "blog", "full_comment", CSocNetUser::IsCurrentUserModuleAdmin()))
				$arResult["Perm"] = BLOG_PERMS_FULL;
			elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_GROUP, $arParams["SOCNET_GROUP_ID"], "blog", "moderate_comment"))
				$arResult["Perm"] = BLOG_PERMS_MODERATE;
			elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_GROUP, $arParams["SOCNET_GROUP_ID"], "blog", "write_comment"))
				$arResult["Perm"] = BLOG_PERMS_WRITE;
			elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_GROUP, $arParams["SOCNET_GROUP_ID"], "blog", "premoderate_comment"))
				$arResult["Perm"] = BLOG_PERMS_PREMODERATE;
			elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_GROUP, $arParams["SOCNET_GROUP_ID"], "blog", "view_comment"))
				$arResult["Perm"] = BLOG_PERMS_READ;
		}
	}
	else
	{
		$arFilterblg["OWNER_ID"] = $arParams["USER_ID"];
		$arResult["Perm"] = BLOG_PERMS_DENY;
		$arResult["PostPerm"] = BLOG_PERMS_DENY;
		
		if (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_USER, $arParams["USER_ID"], "blog", "full_post", CSocNetUser::IsCurrentUserModuleAdmin()) || $APPLICATION->GetGroupRight("blog") >= "W" || $arParams["USER_ID"] == $user_id)
			$arResult["PostPerm"] = BLOG_PERMS_FULL;
		elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_USER, $arParams["USER_ID"], "blog", "moderate_post"))
			$arResult["PostPerm"] = BLOG_PERMS_MODERATE;
		elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_USER, $arParams["USER_ID"], "blog", "write_post"))
			$arResult["PostPerm"] = BLOG_PERMS_WRITE;
		elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_USER, $arParams["USER_ID"], "blog", "premoderate_post"))
			$arResult["PostPerm"] = BLOG_PERMS_PREMODERATE;
		elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_USER, $arParams["USER_ID"], "blog", "view_post"))
			$arResult["PostPerm"] = BLOG_PERMS_READ;

		if($arResult["PostPerm"] > BLOG_PERMS_DENY)
		{
			if (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_USER, $arParams["USER_ID"], "blog", "full_comment", CSocNetUser::IsCurrentUserModuleAdmin()) || $APPLICATION->GetGroupRight("blog") >= "W" || $arParams["USER_ID"] == $user_id)
				$arResult["Perm"] = BLOG_PERMS_FULL;
			elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_USER, $arParams["USER_ID"], "blog", "moderate_comment"))
				$arResult["Perm"] = BLOG_PERMS_MODERATE;
			elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_USER, $arParams["USER_ID"], "blog", "write_comment"))
				$arResult["Perm"] = BLOG_PERMS_WRITE;
			elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_USER, $arParams["USER_ID"], "blog", "premoderate_comment"))
				$arResult["Perm"] = BLOG_PERMS_PREMODERATE;
			elseif (CSocNetFeaturesPerms::CanPerformOperation($user_id, SONET_ENTITY_USER, $arParams["USER_ID"], "blog", "view_comment"))
				$arResult["Perm"] = BLOG_PERMS_READ;
		}
	}
	$dbBl = CBlog::GetList(Array(), $arFilterblg);
	$arBlog = $dbBl ->GetNext();
}
else
{
	if(IntVal($arParams["ID"])>0)
	{
		$arResult["Perm"] = CBlogPost::GetBlogUserCommentPerms($arParams["ID"], $user_id);
	}
	else
	{
		$arBlog = CBlog::GetByUrl($arParams["BLOG_URL"], $arParams["GROUP_ID"]);
		$arResult["Perm"] = CBlog::GetBlogUserCommentPerms($arBlog["ID"], $user_id);
	}
}

if(empty($arBlog))
	$arBlog = CBlog::GetByUrl($arParams["BLOG_URL"], $arParams["GROUP_ID"]);
$arGroup = CBlogGroup::GetByID($arBlog["GROUP_ID"]);
$arResult["Blog"] = $arBlog;

if(IntVal($arParams["ID"]) > 0)
	$arPost = CBlogPost::GetByID($arParams["ID"]);
if(((!empty($arPost) && $arPost["PUBLISH_STATUS"] == BLOG_PUBLISH_STATUS_PUBLISH && $arPost["ENABLE_COMMENTS"] == "Y") || $simpleComment) && (($arBlog["ACTIVE"] == "Y" && $arGroup["SITE_ID"] == SITE_ID) || $simpleComment) )
{
	$arPost = CBlogTools::htmlspecialcharsExArray($arPost);
	$arResult["Post"] = $arPost;
	
	if($arPost["BLOG_ID"] == $arBlog["ID"] || $simpleComment)
	{
		//Comment delete
		if(IntVal($_GET["delete_comment_id"])>0)
		{
			if($_GET["success"] == "Y")
			{
				$arResult["MESSAGE"] = GetMessage("B_B_PC_MES_DELED");
			}
			else
			{
				$arComment = CBlogComment::GetByID(IntVal($_GET["delete_comment_id"]));
				if($arResult["Perm"]>=BLOG_PERMS_MODERATE && !empty($arComment))
				{
					if(check_bitrix_sessid())
					{
						if(CBlogComment::Delete(IntVal($_GET["delete_comment_id"])))
						{
							if($bGroupMode)
								CSocNetGroup::SetLastActivity($arParams["SOCNET_GROUP_ID"]);

							BXClearCache(True, "/".SITE_ID."/blog/".$arBlog["URL"]."/first_page/");
							BXClearCache(True, "/".SITE_ID."/blog/".$arBlog["URL"]."/comment/".$arComment["POST_ID"]."/");
							BXClearCache(True, "/".SITE_ID."/blog/last_comments/");
							LocalRedirect($APPLICATION->GetCurPageParam("delete_comment_id=".IntVal($_GET["delete_comment_id"])."&success=Y", Array("delete_comment_id", "sessid", "success")));
						}
					}
					else
						$arResult["ERROR_MESSAGE"] = GetMessage("B_B_PC_MES_ERROR_SESSION");
				}
				$arResult["ERROR_MESSAGE"] = GetMessage("B_B_PC_MES_ERROR_DELETE");
			}
		}
		elseif(IntVal($_GET["show_comment_id"])>0)
		{
			$arComment = CBlogComment::GetByID(IntVal($_GET["show_comment_id"]));
			if($arResult["Perm"]>=BLOG_PERMS_MODERATE && !empty($arComment))
			{
				if($arComment["PUBLISH_STATUS"] != BLOG_PUBLISH_STATUS_READY)
				{
					$arResult["ERROR_MESSAGE"] = GetMessage("B_B_PC_MES_ERROR_SHOW");
				}
				else
				{
					if(check_bitrix_sessid())
					{
						if($commentID = CBlogComment::Update($arComment["ID"], Array("PUBLISH_STATUS" => BLOG_PUBLISH_STATUS_PUBLISH)))
						{
							BXClearCache(True, "/".SITE_ID."/blog/".$arBlog["URL"]."/first_page/");
							BXClearCache(True, "/".SITE_ID."/blog/".$arBlog["URL"]."/comment/".$arComment["POST_ID"]."/");
							BXClearCache(True, "/".SITE_ID."/blog/last_comments/");

							LocalRedirect($APPLICATION->GetCurPageParam($arParams["COMMENT_ID_VAR"]."=".$arComment["ID"]."#".$arComment["ID"], Array("show_comment_id", "sessid", "success", $arParams["COMMENT_ID_VAR"])));
						}
					}
					else
						$arResult["ERROR_MESSAGE"] = GetMessage("B_B_PC_MES_ERROR_SESSION");
				}
			}
			$arResult["ERROR_MESSAGE"] = GetMessage("B_B_PC_MES_ERROR_SHOW");
		}
		elseif(IntVal($_GET["hide_comment_id"])>0)
		{
			$arComment = CBlogComment::GetByID(IntVal($_GET["hide_comment_id"]));
			if($arResult["Perm"]>=BLOG_PERMS_MODERATE && !empty($arComment))
			{
				if($arComment["PUBLISH_STATUS"] != BLOG_PUBLISH_STATUS_PUBLISH)
				{
					$arResult["ERROR_MESSAGE"] = GetMessage("B_B_PC_MES_ERROR_SHOW");
				}
				else
				{
					if(check_bitrix_sessid())
					{
						if($commentID = CBlogComment::Update($arComment["ID"], Array("PUBLISH_STATUS" => BLOG_PUBLISH_STATUS_READY)))
						{
							BXClearCache(True, "/".SITE_ID."/blog/".$arBlog["URL"]."/first_page/");
							BXClearCache(True, "/".SITE_ID."/blog/".$arBlog["URL"]."/comment/".$arComment["POST_ID"]."/");
							BXClearCache(True, "/".SITE_ID."/blog/last_comments/");

							LocalRedirect($APPLICATION->GetCurPageParam($arParams["COMMENT_ID_VAR"]."=".$arComment["ID"]."#".$arComment["ID"], Array("hide_comment_id", "sessid", "success", $arParams["COMMENT_ID_VAR"])));
						}
					}
					else
						$arResult["ERROR_MESSAGE"] = GetMessage("B_B_PC_MES_ERROR_SESSION");
				}
			}
			$arResult["ERROR_MESSAGE"] = GetMessage("B_B_PC_MES_ERROR_HIDE");
		}
		elseif(IntVal($_GET["hidden_add_comment_id"])>0)
		{
			$arResult["MESSAGE"] = GetMessage("B_B_PC_MES_HIDDEN_ADDED");
		}

		//Comments output
		if($arResult["Perm"]>=BLOG_PERMS_READ)
		{
			$arResult["CanUserComment"] = false;
			$arResult["canModerate"] = false;
			if($arResult["Perm"] >= BLOG_PERMS_PREMODERATE)
				$arResult["CanUserComment"] = true;
			if($arResult["Perm"] >= BLOG_PERMS_MODERATE)
				$arResult["canModerate"] = true;
				
			if(IntVal($user_id)>0)
			{
				$arResult["BlogUser"] = CBlogUser::GetByID($user_id, BLOG_BY_USER_ID); 
				$arResult["BlogUser"] = CBlogTools::htmlspecialcharsExArray($arResult["BlogUser"]);
				$dbUser = CUser::GetByID($user_id);
				$arResult["arUser"] = $dbUser->GetNext();
				$arResult["User"]["NAME"] = CBlogUser::GetUserName($arResult["BlogUser"]["ALIAS"], $arResult["arUser"]["NAME"], $arResult["arUser"]["LAST_NAME"], $arResult["arUser"]["LOGIN"]);
				$arResult["User"]["ID"] = $user_id;
			}

			if(!$USER->IsAuthorized())
			{
				$useCaptcha = COption::GetOptionString("blog", "captcha_choice", "U");
				if(empty($arBlog))
				{
					$arBlog = CBlog::GetByUrl($arParams["BLOG_URL"], $arParams["GROUP_ID"]);
					$arResult["Blog"] = $arBlog;
				}
				if($useCaptcha == "U")
					$arResult["use_captcha"] = ($arBlog["ENABLE_IMG_VERIF"]=="Y")? true : false;
				elseif($useCaptcha == "A")
					$arResult["use_captcha"] = true;
				else
					$arResult["use_captcha"] = false;
			}
			else
			{
				$arResult["use_captcha"] = false;
			}
				
			/////////////////////////////////////////////////////////////////////////////////////
			if(strlen($arPost["ID"])>0 && $_SERVER["REQUEST_METHOD"]=="POST" && strlen($_POST["post"]) > 0 && strlen($_POST["preview"]) <= 0)
			{
				if($arResult["Perm"] >= BLOG_PERMS_PREMODERATE)
				{
					if(check_bitrix_sessid())
					{
						$strErrorMessage = '';
						if(empty($arResult["Blog"]))
						{
							$arBlog = CBlog::GetByUrl($arParams["BLOG_URL"], $arParams["GROUP_ID"]);
							$arResult["Blog"] = $arBlog;
						}

						if($_POST["act"] != "edit")
						{
							if ($arResult["use_captcha"])
							{
								include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
								$captcha_code = $_POST["captcha_code"];
								$captcha_word = $_POST["captcha_word"];
								$cpt = new CCaptcha();
								$captchaPass = COption::GetOptionString("main", "captcha_password", "");
								if (strlen($captcha_code) > 0)
								{
									if (!$cpt->CheckCodeCrypt($captcha_word, $captcha_code, $captchaPass))
										$strErrorMessage .= GetMessage("B_B_PC_CAPTCHA_ERROR")."<br />";
								}
								else
									$strErrorMessage .= GetMessage("B_B_PC_CAPTCHA_ERROR")."<br />";
							}

							$UserIP = CBlogUser::GetUserIP();
							$arFields = Array(
										"POST_ID" => $arPost["ID"],
										"BLOG_ID" => $arBlog["ID"],
										"TITLE" => $_POST["subject"],
										"POST_TEXT" => $_POST["comment"],
										"DATE_CREATE" => ConvertTimeStamp(false, "FULL"),
										"AUTHOR_IP" => $UserIP[0],
										"AUTHOR_IP1" => $UserIP[1],
										);
							if($arResult["Perm"] == BLOG_PERMS_PREMODERATE)
								$arFields["PUBLISH_STATUS"] = BLOG_PUBLISH_STATUS_READY;

							if(!$bUseTitle)
								unset($arFields["TITLE"]);
								
							if(IntVal($user_id)>0)
								$arFields["AUTHOR_ID"] = $user_id;
							else
							{
								$arFields["AUTHOR_NAME"] = $_POST["user_name"];
								if(strlen($_POST["user_email"])>0)
									$arFields["AUTHOR_EMAIL"] = $_POST["user_email"];
								if(strlen($_POST["user_name"])<=0)
									$strErrorMessage .= GetMessage("B_B_PC_NO_ANAME")."<br />";
								$_SESSION["blog_user_name"] = $_POST["user_name"];
								$_SESSION["blog_user_email"] = $_POST["user_email"];
							}
							
							if(IntVal($_POST["parentId"])>0)
								$arFields["PARENT_ID"] = IntVal($_POST["parentId"]);
							else 
								$arFields["PARENT_ID"] = false;
							if(strlen($_POST["comment"])<=0)
								$strErrorMessage .= GetMessage("B_B_PC_NO_COMMENT")."<br />";

							if(strlen($strErrorMessage)<=0)
							{
								$commentUrl = CComponentEngine::MakePathFromTemplate(htmlspecialcharsBack($arParams["PATH_TO_POST"]), array("blog" => $arBlog["URL"], "post_id"=>$arPost["ID"], "user_id" => $arBlog["OWNER_ID"], "group_id" => $arParams["SOCNET_GROUP_ID"]));
								
								$arFields["PATH"] = $commentUrl;
								if(strpos($arFields["PATH"], "?") !== false)
									$arFields["PATH"] .= "&";
								else
									$arFields["PATH"] .= "?";
								$arFields["PATH"] .= $arParams["COMMENT_ID_VAR"]."=#comment_id###comment_id#";
								
								if($commmentId = CBlogComment::Add($arFields))
								{
									BXClearCache(True, "/".SITE_ID."/blog/".$arBlog["URL"]."/first_page/");
									BXClearCache(True, "/".SITE_ID."/blog/".$arBlog["URL"]."/comment/".$arPost["ID"]."/");
									BXClearCache(True, "/".SITE_ID."/blog/last_comments/");

									$AuthorName = CBlogUser::GetUserName($arResult["BlogUser"]["~ALIAS"], $arResult["arUser"]["~NAME"], $arResult["arUser"]["LAST_NAME"], $arResult["arUser"]["~LOGIN"]); 
									
									$parserBlog = new blogTextParser(false, $arParams["PATH_TO_SMILE"]);
									$text4mail = $parserBlog->convert4mail($_POST['comment']);
									$dbSite = CSite::GetByID(SITE_ID);
									$arSite = $dbSite -> Fetch();
									$serverName = htmlspecialcharsEx($arSite["SERVER_NAME"]);
									if (strlen($serverName) <=0)
									{
										if (defined("SITE_SERVER_NAME") && strlen(SITE_SERVER_NAME)>0)
											$serverName = SITE_SERVER_NAME;
										else
											$serverName = COption::GetOptionString("main", "server_name", "www.bitrixsoft.com");
									}
									
									
									if(strpos($commentUrl, "?") !== false)
										$commentUrl .= "&";
									else
										$commentUrl .= "?";
									if(strlen($arFields["PUBLISH_STATUS"]) > 0 && $arFields["PUBLISH_STATUS"] != BLOG_PUBLISH_STATUS_PUBLISH)
										$commentAddedUrl = $commentUrl.$arParams["COMMENT_ID_VAR"]."=".$commmentId."&hidden_add_comment_id=".$commmentId;
									$commentUrl .= $arParams["COMMENT_ID_VAR"]."=".$commmentId."#".$commmentId;
									
									if(strlen($AuthorName)<=0)
										$AuthorName = $arFields["AUTHOR_NAME"];
										
									$arMailFields = array(
											"BLOG_ID"	=> $arBlog['ID'],
											"BLOG_NAME"	=> $arBlog['~NAME'],
											"BLOG_URL"	=> $arBlog['~URL'],
											"MESSAGE_TITLE" => $arPost['TITLE'],
											"COMMENT_TITLE" => $_POST['subject'],
											"COMMENT_TEXT" => $text4mail,
											"COMMENT_DATE" => ConvertTimeStamp(false, "FULL"),
											"COMMENT_PATH" => "http://".$serverName.$commentUrl,
											"AUTHOR"	 => $AuthorName,
											"EMAIL_FROM"	 => COption::GetOptionString("main","email_from", "nobody@nobody.com"),
									);
									if(!$bUseTitle)
										unset($arMailFields["COMMENT_TITLE"]);
										
									if ($arBlog['EMAIL_NOTIFY']=='Y' && $user_id != $arPost['AUTHOR_ID']) // comment author is not original post author
									{
										$res = CUser::GetByID($arPost['AUTHOR_ID']);
										if($arOwner = $res->GetNext())
										{
											$arMailFields["EMAIL_TO"] = $arOwner['EMAIL'];
											
											CEvent::Send(
												($bUseTitle) ? "NEW_BLOG_COMMENT" : "NEW_BLOG_COMMENT_WITHOUT_TITLE",
												SITE_ID,
												$arMailFields
											);
										}
										
										if($arPost["AUTHOR_ID"] != $arBlog["OWNER_ID"] && IntVal($arBlog["OWNER_ID"]) > 0)
										{
											$res = CUser::GetByID($arBlog["OWNER_ID"]);
											if($arOwnerBlog = $res->GetNext())
											{
												$arMailFields["EMAIL_TO"] = $arOwnerBlog['EMAIL'];
												
												CEvent::Send(
													($bUseTitle) ? "NEW_BLOG_COMMENT" : "NEW_BLOG_COMMENT_WITHOUT_TITLE",
													SITE_ID,
													$arMailFields
												);
											}
										}
									}

									if($arFields["PUBLISH_STATUS"] == BLOG_PUBLISH_STATUS_PUBLISH || strlen($arFields["PUBLISH_STATUS"]) <= 0)
									{
										if($arFields["PARENT_ID"] > 0) // In case the is an comment before - we'll notice author
										{
											$arPrev = CBlogComment::GetByID($arFields["PARENT_ID"]);
											$arPrev = CBlogTools::htmlspecialcharsExArray($arPrev);
											if ($user_id != $arPrev['AUTHOR_ID']) 
											{
												$email = '';

												$res = CUser::GetByID($arPrev['AUTHOR_ID']);
												if ($arOwner = $res->GetNext()) 
												{
													$arPrevBlog = CBlog::GetByOwnerID($arPrev['AUTHOR_ID'], $arParams["GROUP_ID"]);
													if ($arPrevBlog['EMAIL_NOTIFY']!='N') 
														$email = $arOwner['EMAIL'];
												}
												elseif($arPrev['AUTHOR_EMAIL'])
													$email = $arPrev['AUTHOR_EMAIL'];

												if ($email && $email != $arMailFields["EMAIL_TO"] && $email != $arOwnerBlog['EMAIL'])
												{
													$arMailFields["EMAIL_TO"] = $email;
													$text4mail1 = $parserBlog->convert4mail($arPrev["~POST_TEXT"]);
													$arMailFields["PARENT_COMMENT_TEXT"] = $text4mail1;
													$arMailFields["PARENT_COMMENT_TITLE"] = $arPrev["TITLE"];
													$arMailFields["PARENT_COMMENT_DATE"] = $arPrev["DATE_CREATE"];

													CEvent::Send(
														($bUseTitle) ? "NEW_BLOG_COMMENT2COMMENT" : "NEW_BLOG_COMMENT2COMMENT_WITHOUT_TITLE",
														SITE_ID,
														$arMailFields
													);
												}
											}
										}
										if($bGroupMode)
											CSocNetGroup::SetLastActivity($arParams["SOCNET_GROUP_ID"]);
											
										if($bSoNet)
										{
											$text4message = $parserBlog->convert($_POST['comment']);

											$arSoFields = Array(
													"EVENT_ID" => "blog_comment",
													"=LOG_DATE" => $DB->CurrentTimeFunction(),
													"TITLE_TEMPLATE" => htmlspecialcharsback($AuthorName)." ".GetMessage("BPC_SONET_COMMENT_TITLE"),
													"TITLE" => $arPost['~TITLE'],//$_POST['subject'],
													"MESSAGE" => $text4message,
													"TEXT_MESSAGE" => $text4mail,
													"MODULE_ID" => "blog",
													"CALLBACK_FUNC" => false
												);

											$arSoFields["URL"] = $commentUrl;
											
											if($bGroupMode)
											{
												$arSoFields["ENTITY_TYPE"] = SONET_ENTITY_GROUP;
												$arSoFields["ENTITY_ID"] = $arParams["SOCNET_GROUP_ID"];
											}
											else
											{
												$arSoFields["ENTITY_TYPE"] = SONET_ENTITY_USER;
												$arSoFields["ENTITY_ID"] = $arParams["USER_ID"];
											}

											if (intval($user_id) > 0)
												$arSoFields["USER_ID"] = $user_id;

											CSocNetLog::Add($arSoFields);
										}
									}
									if(strlen($arFields["PUBLISH_STATUS"]) > 0 && $arFields["PUBLISH_STATUS"] != BLOG_PUBLISH_STATUS_PUBLISH)
										LocalRedirect($commentAddedUrl);
									else
										LocalRedirect($commentUrl);
								}
								else
								{
									if ($e = $APPLICATION->GetException())
										$arResult["COMMENT_ERROR"] = "<b>".GetMessage("B_B_PC_COM_ERROR")."</b><br />".$e->GetString();
								}
							}
							else
							{
								if ($e = $APPLICATION->GetException())
									$arResult["COMMENT_ERROR"] = "<b>".GetMessage("B_B_PC_COM_ERROR")."</b><br />".$e->GetString();
								if(strlen($strErrorMessage)>0)
									$arResult["COMMENT_ERROR"] = "<b>".GetMessage("B_B_PC_COM_ERROR")."</b><br />".$strErrorMessage;
							}
						}
						else //update comment
						{
							$commentID = IntVal($_POST["edit_id"]);
							$arOldComment = CBlogComment::GetByID($commentID);
							if($commentID <= 0 || empty($arOldComment))
								$arResult["COMMENT_ERROR"] = "<b>".GetMessage("B_B_PC_COM_ERROR_EDIT")."</b><br />".GetMessage("B_B_PC_COM_ERROR_LOST");
							elseif($arOldComment["AUTHOR_ID"] == $user_id || $blogModulePermissions >= "W")
							{
								$arFields = Array(
										"TITLE" => $_POST["subject"],
										"POST_TEXT" => $_POST["comment"],
									);
								if(!$bUseTitle)
									unset($arFields["TITLE"]);
								if($arResult["Perm"] == BLOG_PERMS_PREMODERATE)
									$arFields["PUBLISH_STATUS"] = BLOG_PUBLISH_STATUS_READY;

								$dbComment = CBlogComment::GetList(array(), Array("POST_ID" => $arPost["ID"], "BLOG_ID" => $arBlog["ID"], "PARENT_ID" => $commentID));
								if($dbComment->Fetch() && $blogModulePermissions < "W")
								{
									$arResult["COMMENT_ERROR"] = "<b>".GetMessage("B_B_PC_COM_ERROR_EDIT")."</b><br />".GetMessage("B_B_PC_EDIT_ALREADY_COMMENTED");
								}
								else
								{
									if($commentID = CBlogComment::Update($commentID, $arFields))
									{
										BXClearCache(True, "/".SITE_ID."/blog/".$arBlog["URL"]."/comment/".$arPost["ID"]."/");
										BXClearCache(True, "/".SITE_ID."/blog/".$arBlog["URL"]."/post/".$arPost["ID"]."/");
										BXClearCache(True, "/".SITE_ID."/blog/commented_posts/");					
										BXClearCache(True, "/".SITE_ID."/blog/".$arBlog["URL"]."/first_page/");
										BXClearCache(True, "/".SITE_ID."/blog/last_comments/");
										BXClearCache(True, "/".SITE_ID."/blog/last_messages/");
										BXClearCache(True, "/".SITE_ID."/blog/popular_posts/");
										BXClearCache(True, "/".SITE_ID."/blog/last_messages_list_extranet/");
										BXClearCache(True, "/".SITE_ID."/blog/".$arBlog["URL"]."/rss_out/".$arPost["POST_ID"]."/C/");

										$commentUrl = CComponentEngine::MakePathFromTemplate(htmlspecialcharsBack($arParams["PATH_TO_POST"]), array("blog" => $arBlog["URL"], "post_id"=>$arPost["ID"], "user_id" => $arBlog["OWNER_ID"], "group_id" => $arParams["SOCNET_GROUP_ID"]));
										if(strpos($commentUrl, "?") !== false)
											$commentUrl .= "&";
										else
											$commentUrl .= "?";
										if(strlen($arFields["PUBLISH_STATUS"]) > 0 && $arFields["PUBLISH_STATUS"] != BLOG_PUBLISH_STATUS_PUBLISH)
										{
											$commentAddedUrl = $commentUrl.$arParams["COMMENT_ID_VAR"]."=".$commentID."&hidden_add_comment_id=".$commentID;
											LocalRedirect($commentAddedUrl);
										}
										else
										{
											$commentUrl .= $arParams["COMMENT_ID_VAR"]."=".$commentID."#".$commentID;
											LocalRedirect($commentUrl);
										}
									}
									else
									{
										if ($e = $APPLICATION->GetException())
											$arResult["COMMENT_ERROR"] = "<b>".GetMessage("B_B_PC_COM_ERROR_EDIT")."</b><br />".$e->GetString();
									}
								}
							}
							else
							{
								$arResult["COMMENT_ERROR"] = "<b>".GetMessage("B_B_PC_COM_ERROR_EDIT")."</b><br />".GetMessage("B_B_PC_NO_RIGHTS_EDIT");
							}
						}
					}
					else
						$arResult["COMMENT_ERROR"] = GetMessage("B_B_PC_MES_ERROR_SESSION");
				}
				else
					$arResult["COMMENT_ERROR"] = GetMessage("B_B_PC_NO_RIGHTS");
			}
			elseif(strlen($_POST["preview"]) > 0)
			{
				$p = new blogTextParser(false, $arParams["PATH_TO_SMILE"]);
				$_POST["commentFormated"] = $p->convert($_POST["comment"], false, array(), array("HTML" => "N", "ANCHOR" => "Y", "BIU" => "Y", "IMG" => "Y", "QUOTE" => "Y", "CODE" => "Y", "FONT" => "Y", "LIST" => "Y", "SMILES" => "Y", "NL2BR" => "N", "VIDEO" => "N"));
			}
			/////////////////////////////////////////////////////////////////////////////////////
			if($USER->IsAdmin())
				$arResult["ShowIP"] = "Y";
			else
				$arResult["ShowIP"] = COption::GetOptionString("blog", "show_ip", "Y");
			
			$cache = new CPHPCache;
			$cache_id = "blog_comment_".serialize($arParams)."_".$arResult["Perm"]."_".$USER->IsAuthorized();
			$cache_path = "/".SITE_ID."/blog/".$arBlog["URL"]."/comment/".$arParams["ID"]."/";

			if ($arParams["CACHE_TIME"] > 0 && $cache->InitCache($arParams["CACHE_TIME"], $cache_id, $cache_path))
			{
				$Vars = $cache->GetVars();
				foreach($Vars["arResult"] as $k=>$v)
				{
					if(!array_key_exists($k, $arResult))
						$arResult[$k] = $v;
				}
				CBitrixComponentTemplate::ApplyCachedData($Vars["templateCachedData"]);	
				$cache->Output();
			}
			else
			{
			
				if ($arParams["CACHE_TIME"] > 0)
					$cache->StartDataCache($arParams["CACHE_TIME"], $cache_id, $cache_path);

				$arResult["CommentsResult"] = Array();
				$arSelectFields = array("ID", "SMILE_TYPE", "TYPING", "IMAGE", "DESCRIPTION", "CLICKABLE", "SORT", "IMAGE_WIDTH", "IMAGE_HEIGHT", "LANG_NAME");
				$arSmiles = array();
				$res = CBlogSmile::GetList(array("SORT"=>"ASC","ID"=>"DESC"), array("SMILE_TYPE"=>"S","CLICKABLE"=>"Y","LANG_LID"=>LANGUAGE_ID), false, false, $arSelectFields);
				while ($arr = $res->GetNext())
				{
					list($type)=explode(" ",$arr["TYPING"]);
					$arr["TYPE"]=str_replace("'","\'",$type);
					$arr["TYPE"]=str_replace("\\","\\\\",$arr["TYPE"]);
					$arSmiles[] = $arr;
				}
				$arResult["Smiles"] = $arSmiles;
				if(IntVal($arParams["ID"]) > 0)
				{
					$arOrder = Array("ID" => "ASC", "DATE_CREATE" => "ASC");
					$arFilter = Array("POST_ID"=>$arParams["ID"]);
					
					//if($arResult["Perm"] < BLOG_PERMS_MODERATE)
						//$arFilter["PUBLISH_STATUS"] = BLOG_PUBLISH_STATUS_PUBLISH;

					$arSelectedFields = Array("ID", "BLOG_ID", "POST_ID", "PARENT_ID", "AUTHOR_ID", "AUTHOR_NAME", "AUTHOR_EMAIL", "AUTHOR_IP", "AUTHOR_IP1", "TITLE", "POST_TEXT", "DATE_CREATE", "PUBLISH_STATUS");
					$dbComment = CBlogComment::GetList($arOrder, $arFilter, false, false, $arSelectedFields);
					$resComments = Array();
					
					$arResult["firstLevel"] = 0;
					
					if($arComment = $dbComment->GetNext())
					{
						$p = new blogTextParser(false, $arParams["PATH_TO_SMILE"]);
						do
						{
							$arResult["Comments"][$arComment["ID"]] = Array(
									"ID" => $arComment["ID"],
									"PARENT_ID" => $arComment["PARENT_ID"],
								);
							$arComment["ShowIP"] = $arResult["ShowIP"];
							if(empty($resComments[IntVal($arComment["PARENT_ID"])]))
							{
								$resComments[IntVal($arComment["PARENT_ID"])] = Array();
								if(strlen($arResult["firstLevel"])<=0)
									$arResult["firstLevel"] = IntVal($arComment["PARENT_ID"]);
							}
							
							if(IntVal($arComment["AUTHOR_ID"])>0)
							{
								$arComment["urlToAuthor"] = CComponentEngine::MakePathFromTemplate($arParams["PATH_TO_USER"], array("user_id" => $arComment["AUTHOR_ID"]));
								$arComment["BlogUser"] = CBlogUser::GetByID($arComment["AUTHOR_ID"], BLOG_BY_USER_ID); 
								$arComment["BlogUser"] = CBlogTools::htmlspecialcharsExArray($arComment["BlogUser"]);
								$dbUser = CUser::GetByID($arComment["AUTHOR_ID"]);
								$arComment["arUser"] = $dbUser->GetNext();
								$arComment["AuthorName"] = CBlogUser::GetUserName($arComment["BlogUser"]["ALIAS"], $arComment["arUser"]["NAME"], $arComment["arUser"]["LAST_NAME"], $arComment["arUser"]["LOGIN"]);
								$arComment["Blog"] = CBlog::GetByOwnerID(IntVal($arComment["AUTHOR_ID"]), $arParams["GROUP_ID"]);
								
								if($arComment["AUTHOR_ID"] == $arPost["AUTHOR_ID"])
									$arComment["AuthorIsPostAuthor"] = "Y";
								$arUsrGroups = CUser::GetUserGroup($arComment["AUTHOR_ID"]);
								if(in_array(1, $arUsrGroups))
									$arComment["AuthorIsAdmin"] = "Y";
								
								if(!empty($arComment["Blog"]))
								{
									$arComment["urlToBlog"] = CComponentEngine::MakePathFromTemplate($arParams["PATH_TO_BLOG"], array("blog" => $arComment["Blog"]["URL"], "user_id" => $arComment["Blog"]["OWNER_ID"], "group_id" => $arParams["SOCNET_GROUP_ID"]));
								}
								if($bGroupMode)
									$arComment["urlToBlog"] = $arComment["urlToAuthor"];
							}
							else
							{
								$arComment["AuthorName"]  = $arComment["AUTHOR_NAME"];
								$arComment["AuthorEmail"]  = $arComment["AUTHOR_EMAIL"];
							}
							
							if($arResult["canModerate"])
							{
								if($arComment["PUBLISH_STATUS"] == BLOG_PUBLISH_STATUS_PUBLISH)
									$arComment["urlToHide"] = $APPLICATION->GetCurPageParam("hide_comment_id=".$arComment["ID"], Array("sessid", "delete_comment_id", "hide_comment_id", "success", "show_comment_id"));
								else
									$arComment["urlToShow"] = $APPLICATION->GetCurPageParam("show_comment_id=".$arComment["ID"], Array("sessid", "delete_comment_id", "show_comment_id", "success", "hide_comment_id"));
								if($arResult["Perm"]>=BLOG_PERMS_FULL)
									$arComment["urlToDelete"] = $APPLICATION->GetCurPageParam("delete_comment_id=".$arComment["ID"], Array("sessid", "delete_comment_id", "success", "hide_comment_id", "show_comment_id"));
							}
							
							
							$arComment["TextFormated"] = $p->convert($arComment["~POST_TEXT"], false, array(), array("HTML" => "N", "ANCHOR" => "Y", "BIU" => "Y", "IMG" => "Y", "QUOTE" => "Y", "CODE" => "Y", "FONT" => "Y", "LIST" => "Y", "SMILES" => "Y", "NL2BR" => "N", "VIDEO" => "N"));
							$arComment["DateFormated"] = date($arParams["DATE_TIME_FORMAT"], MakeTimeStamp($arComment["DATE_CREATE"], CSite::GetDateFormat("FULL")));
							
							$arComment["AVATAR_file"] = CFile::ResizeImageGet(
									$arComment["BlogUser"]["AVATAR"],
									array("width" => 50, "height" => 50),
									BX_RESIZE_IMAGE_PROPORTIONAL,
									false
								);
							
							//$arComment["AVATAR_file"] = CFile::GetFileArray($arComment["BlogUser"]["AVATAR"]);
							if ($arComment["AVATAR_file"] !== false)
								$arComment["AVATAR_img"] = CFile::ShowImage($arComment["AVATAR_file"]["src"], 50, 50, "border=0 align='right'");

							if($bUseTitle)
							{
							
								if(strlen($arComment["TITLE"])>0)
									$arComment["TitleFormated"] = $p->convert($arComment["TITLE"], false);
								if(strpos($arComment["TITLE"], "RE")===false)
									$subj = "RE: ".$arComment["TITLE"];
								else
								{
									if(strpos($arComment["TITLE"], "RE")==0)
									{
										if(strpos($arComment["TITLE"], "RE:")!==false)
										{
											$count = substr_count($arComment["TITLE"], "RE:");
											$subj = substr($arComment["TITLE"], (strrpos($arComment["TITLE"], "RE:")+4));
										}
										else
										{
											if(strpos($arComment["TITLE"], "[")==2)
											{
												$count = substr($arComment["TITLE"], 3, (strpos($arComment["TITLE"], "]: ")-3));
												$subj = substr($arComment["TITLE"], (strrpos($arComment["TITLE"], "]: ")+3));
											}
										}
										$subj = "RE[".($count+1)."]: ".$subj;
									}
									else
										$subj = "RE: ".$arComment["TITLE"];
								}
								$arComment["CommentTitle"] = str_replace(array("\\", "\"", "'"), array("\\\\", "\\"."\"", "\\'"), $subj);
							}
							$resComments[IntVal($arComment["PARENT_ID"])][] = $arComment;
						}
						while($arComment = $dbComment->GetNext());
						$arResult["CommentsResult"] = $resComments;
					}
				}

				if ($arParams["CACHE_TIME"] > 0)
					$cache->EndDataCache(array("templateCachedData"=>$this-> GetTemplateCachedData(), "arResult"=>$arResult));
			}

			if($arResult["use_captcha"])
			{
				include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
				$cpt = new CCaptcha();
				$captchaPass = COption::GetOptionString("main", "captcha_password", "");
				if (strlen($captchaPass) <= 0)
				{
					$captchaPass = randString(10);
					COption::SetOptionString("main", "captcha_password", $captchaPass);
				}
				$cpt->SetCodeCrypt($captchaPass);
				$arResult["CaptchaCode"] = htmlspecialchars($cpt->GetCodeCrypt());
			}
		}

		if(is_array($arResult["CommentsResult"]) && count($arResult["CommentsResult"][0]) > $arParams["COMMENTS_COUNT"])
		{
			$arResult["PAGE"] = $pagen;
			if($arParams["USE_DESC_PAGING"] == "Y")
			{
				$v1 = floor(count($arResult["CommentsResult"][0]) / $arParams["COMMENTS_COUNT"]);
				$firstPageCount = count($arResult["CommentsResult"][0]) - ($v1 - 1) * $arParams["COMMENTS_COUNT"];
			}
			else
			{
				$v1 = ceil(count($arResult["CommentsResult"][0]) / $arParams["COMMENTS_COUNT"]);
				$firstPageCount = $arParams["COMMENTS_COUNT"];
			}
			$arResult["PAGE_COUNT"] = $v1;
			if($arResult["PAGE"] > $arResult["PAGE_COUNT"])
				$arResult["PAGE"] = $arResult["PAGE_COUNT"];		
			if($arResult["PAGE_COUNT"] > 1)
			{
				if(IntVal($commentUrlID) > 0)
				{
					function BXBlogSearchParentID($commentID, $arComments)
					{
						if(IntVal($arComments[$commentID]["PARENT_ID"]) > 0)
						{
							return BXBlogSearchParentID($arComments[$commentID]["PARENT_ID"], $arComments);
						}
						else
							return $commentID;
					}
					$parentCommentId = BXBlogSearchParentID($commentUrlID, $arResult["Comments"]);
					
					if(IntVal($parentCommentId) > 0)
					{
						foreach($arResult["CommentsResult"][0] as $k => $v)
						{
							if($v["ID"] == $parentCommentId)
							{
								if($k < $firstPageCount)
									$arResult["PAGE"] = 1;
								else
									$arResult["PAGE"] = ceil(($k + 1 - $firstPageCount) / $arParams["COMMENTS_COUNT"]) + 1;
								break;
							}
						}
					}
				}
				
				
				foreach($arResult["CommentsResult"][0] as $k => $v)
				{
					
					if($arResult["PAGE"] == 1)
					{
						if($k > ($firstPageCount-1))
							unset($arResult["CommentsResult"][0][$k]);
					}
					else
					{
						
						if($k >= ($firstPageCount + ($arResult["PAGE"]-1)*$arParams["COMMENTS_COUNT"]) || 
							$k< ($firstPageCount + ($arResult["PAGE"]-2)*$arParams["COMMENTS_COUNT"]))
							unset($arResult["CommentsResult"][0][$k]);
					}
				}
				$arResult["NEED_NAV"] = "Y";
				$arResult["PAGES"] = Array();

				for($i = 1; $i <= $arResult["PAGE_COUNT"]; $i++)
				{
					if($i != $arResult["PAGE"])
					{
						if($i == 1)
							$arResult["PAGES"][] = '<a href="'.$APPLICATION->GetCurPageParam("", Array($arParams["NAV_PAGE_VAR"], "commentID")).'#comments">'.$i.'</a>&nbsp;&nbsp;';
						else
							$arResult["PAGES"][] = '<a href="'.$APPLICATION->GetCurPageParam($arParams["NAV_PAGE_VAR"].'='.$i, array($arParams["NAV_PAGE_VAR"], "commentID")).'#comments">'.$i.'</a>&nbsp;&nbsp;';
					}
					else
						$arResult["PAGES"][] = "<b>".$i."</b>&nbsp;&nbsp;";
				}

			}
		}
		
		if(is_array($arResult["CommentsResult"]))
		{
			foreach($arResult["CommentsResult"] as $k1 => $v1)
			{
				foreach($v1 as $k => $v)
				{
					if($arResult["Perm"] >= BLOG_PERMS_MODERATE || $blogModulePermissions >= "W")
						$arResult["Comments"][$v["ID"]]["SHOW_SCREENNED"] = "Y";

					if(IntVal($v["PARENT_ID"]) > 0 && $blogModulePermissions < "W")
					{
						$arResult["Comments"][$v["PARENT_ID"]]["CAN_EDIT"] = "N";
						if($arResult["Perm"] < BLOG_PERMS_MODERATE)
						{
							if($arResult["Comments"][$v["PARENT_ID"]]["SHOW_AS_HIDDEN"] != "Y" && $v["PUBLISH_STATUS"] == BLOG_PUBLISH_STATUS_PUBLISH)
								$arResult["Comments"][$v["PARENT_ID"]]["SHOW_AS_HIDDEN"] = "Y";
							else
								$arResult["Comments"][$v["PARENT_ID"]]["SHOW_AS_HIDDEN"] = "N";
						}
					}
					
					if(IntVal($v["AUTHOR_ID"])>0)
					{
						if($v["AUTHOR_ID"] == $user_id || $blogModulePermissions >= "W")
							$arResult["Comments"][$v["ID"]]["CAN_EDIT"] = "Y";

						if($bGroupMode)
						{
							$arGroupTmp = CSocNetGroup::GetByID($arParams["SOCNET_GROUP_ID"]);
							if ($arGroupTmp["CLOSED"] == "Y" && COption::GetOptionString("socialnetwork", "work_with_closed_groups", "N") != "Y")
								$arResult["Comments"][$v["ID"]]["CAN_EDIT"] = "N";
						}
					}
					else
					{
						if($blogModulePermissions >= "W")
							$arResult["Comments"][$v["ID"]]["CAN_EDIT"] = "Y";
					}
				}
			}
		}
		if($USER->IsAuthorized())
		{
			if(IntVal($commentUrlID) > 0 && empty($arResult["Comments"][$commentUrlID]))
			{
				$arComment = CBlogComment::GetByID($commentUrlID);
				if($arComment["AUTHOR_ID"] == $user_id && $arComment["PUBLISH_STATUS"] == BLOG_PUBLISH_STATUS_READY)
					$arResult["MESSAGE"] = GetMessage("B_B_PC_HIDDEN_POSTED");
			}
		}
		
		$this->IncludeComponentTemplate();
	}
}
?>