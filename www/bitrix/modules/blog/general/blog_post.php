<?
IncludeModuleLangFile(__FILE__);
$GLOBALS["BLOG_POST"] = Array();

class CAllBlogPost
{
	function CanUserEditPost($ID, $userID)
	{
		$ID = IntVal($ID);
		$userID = IntVal($userID);

		$blogModulePermissions = $GLOBALS["APPLICATION"]->GetGroupRight("blog");
		if ($blogModulePermissions >= "W")
			return True;

		$arPost = CBlogPost::GetByID($ID);
		if (!$arPost)
			return False;

		if (CBlog::IsBlogOwner($arPost["BLOG_ID"], $userID))
			return True;

		$arBlogUser = CBlogUser::GetByID($userID, BLOG_BY_USER_ID);
		if ($arBlogUser && $arBlogUser["ALLOW_POST"] != "Y")
			return False;

		if (CBlogPost::GetBlogUserPostPerms($ID, $userID) < BLOG_PERMS_WRITE)
			return False;

		if ($arPost["AUTHOR_ID"] == $userID)
			return True;

		return False;
	}

	function CanUserDeletePost($ID, $userID)
	{
		$ID = IntVal($ID);
		$userID = IntVal($userID);

		$blogModulePermissions = $GLOBALS["APPLICATION"]->GetGroupRight("blog");
		if ($blogModulePermissions >= "W")
			return True;

		$arPost = CBlogPost::GetByID($ID);
		if (!$arPost)
			return False;

		if (CBlog::IsBlogOwner($arPost["BLOG_ID"], $userID))
			return True;

		$arBlogUser = CBlogUser::GetByID($userID, BLOG_BY_USER_ID);
		if ($arBlogUser && $arBlogUser["ALLOW_POST"] != "Y")
			return False;

		$perms = CBlogPost::GetBlogUserPostPerms($ID, $userID);
		if ($perms <= BLOG_PERMS_WRITE && $userID != $arPost["AUTHOR_ID"])
			return False;
		
		if($perms > BLOG_PERMS_WRITE)
			return true;

		if ($arPost["AUTHOR_ID"] == $userID)
			return True;

		return False;
	}

	function GetBlogUserPostPerms($ID, $userID)
	{
		$ID = IntVal($ID);
		$userID = IntVal($userID);

		$arAvailPerms = array_keys($GLOBALS["AR_BLOG_PERMS"]);
		$blogModulePermissions = $GLOBALS["APPLICATION"]->GetGroupRight("blog");
		if ($blogModulePermissions >= "W")
			return $arAvailPerms[count($arAvailPerms) - 1];
			
		$arPost = CBlogPost::GetByID($ID);
		if (!$arPost)
			return $arAvailPerms[0];
			
		if (CBlog::IsBlogOwner($arPost["BLOG_ID"], $userID))
			return $arAvailPerms[count($arAvailPerms) - 1];
			
		$arBlogUser = CBlogUser::GetByID($userID, BLOG_BY_USER_ID);
		if ($arBlogUser && $arBlogUser["ALLOW_POST"] != "Y")
			return $arAvailPerms[0];

		$arUserGroups = CBlogUser::GetUserGroups($userID, $arPost["BLOG_ID"], "Y", BLOG_BY_USER_ID);

		$perms = CBlogUser::GetUserPerms($arUserGroups, $arPost["BLOG_ID"], $ID, BLOG_PERMS_POST, BLOG_BY_USER_ID);
		if ($perms)
			return $perms;

		return $arAvailPerms[0];
	}

	function GetBlogUserCommentPerms($ID, $userID)
	{
		$ID = IntVal($ID);
		$userID = IntVal($userID);

		$arAvailPerms = array_keys($GLOBALS["AR_BLOG_PERMS"]);

		$blogModulePermissions = $GLOBALS["APPLICATION"]->GetGroupRight("blog");
		if ($blogModulePermissions >= "W")
			return $arAvailPerms[count($arAvailPerms) - 1];

		if(IntVal($ID) > 0)
		{
			if (!($arPost = CBlogPost::GetByID($ID)))
			{
				return $arAvailPerms[0];
			}
			else
			{
				$arBlog = CBlog::GetByID($arPost["BLOG_ID"]);
				if ($arBlog["ENABLE_COMMENTS"] != "Y")
					return $arAvailPerms[0];

				if (CBlog::IsBlogOwner($arPost["BLOG_ID"], $userID))
					return $arAvailPerms[count($arAvailPerms) - 1];
					
				$arUserGroups = CBlogUser::GetUserGroups($userID, $arPost["BLOG_ID"], "Y", BLOG_BY_USER_ID);

				$perms = CBlogUser::GetUserPerms($arUserGroups, $arPost["BLOG_ID"], $ID, BLOG_PERMS_COMMENT, BLOG_BY_USER_ID);
				if ($perms)
					return $perms;

			}

		}
		else
		{
			return $arAvailPerms[0];
		}
		
		if(IntVal($userID) > 0)
		{
			$arBlogUser = CBlogUser::GetByID($userID, BLOG_BY_USER_ID);
			if ($arBlogUser && $arBlogUser["ALLOW_POST"] != "Y")
				return $arAvailPerms[0];
		}
		
		return $arAvailPerms[0];
	}

	/*************** ADD, UPDATE, DELETE *****************/
	function CheckFields($ACTION, &$arFields, $ID = 0)
	{
		global $DB;
		if ((is_set($arFields, "TITLE") || $ACTION=="ADD") && strlen($arFields["TITLE"]) <= 0)
		{
			$GLOBALS["APPLICATION"]->ThrowException(GetMessage("BLG_GP_EMPTY_TITLE"), "EMPTY_TITLE");
			return false;
		}

		if ((is_set($arFields, "BLOG_ID") || $ACTION=="ADD") && IntVal($arFields["BLOG_ID"]) <= 0)
		{
			$GLOBALS["APPLICATION"]->ThrowException(GetMessage("BLG_GP_EMPTY_BLOG_ID"), "EMPTY_BLOG_ID");
			return false;
		}
		elseif (is_set($arFields, "BLOG_ID"))
		{
			$arResult = CBlog::GetByID($arFields["BLOG_ID"]);
			if (!$arResult)
			{
				$GLOBALS["APPLICATION"]->ThrowException(str_replace("#ID#", $arFields["BLOG_ID"], GetMessage("BLG_GP_ERROR_NO_BLOG")), "ERROR_NO_BLOG");
				return false;
			}
		}

		if ((is_set($arFields, "AUTHOR_ID") || $ACTION=="ADD") && IntVal($arFields["AUTHOR_ID"]) <= 0)
		{
			$GLOBALS["APPLICATION"]->ThrowException(GetMessage("BLG_GP_EMPTY_AUTHOR_ID"), "EMPTY_AUTHOR_ID");
			return false;
		}
		elseif (is_set($arFields, "AUTHOR_ID"))
		{
			$dbResult = CUser::GetByID($arFields["AUTHOR_ID"]);
			if (!$dbResult->Fetch())
			{
				$GLOBALS["APPLICATION"]->ThrowException(GetMessage("BLG_GP_ERROR_NO_AUTHOR"), "ERROR_NO_AUTHOR");
				return false;
			}
		}

		if (is_set($arFields, "DATE_CREATE") && (!$DB->IsDate($arFields["DATE_CREATE"], false, LANG, "FULL")))
		{
			$GLOBALS["APPLICATION"]->ThrowException(GetMessage("BLG_GP_ERROR_DATE_CREATE"), "ERROR_DATE_CREATE");
			return false;
		}

		if (is_set($arFields, "DATE_PUBLISH") && (!$DB->IsDate($arFields["DATE_PUBLISH"], false, LANG, "FULL")))
		{
			$GLOBALS["APPLICATION"]->ThrowException(GetMessage("BLG_GP_ERROR_DATE_PUBLISH"), "ERROR_DATE_PUBLISH");
			return false;
		}


		$arFields["PREVIEW_TEXT_TYPE"] = strtolower($arFields["PREVIEW_TEXT_TYPE"]);
		if ((is_set($arFields, "PREVIEW_TEXT_TYPE") || $ACTION=="ADD") && $arFields["PREVIEW_TEXT_TYPE"] != "text" && $arFields["PREVIEW_TEXT_TYPE"] != "html")
			$arFields["PREVIEW_TEXT_TYPE"] = "text";

		//$arFields["DETAIL_TEXT_TYPE"] = strtolower($arFields["DETAIL_TEXT_TYPE"]);
		if ((is_set($arFields, "DETAIL_TEXT_TYPE") || $ACTION=="ADD") && strtolower($arFields["DETAIL_TEXT_TYPE"]) != "text" && strtolower($arFields["DETAIL_TEXT_TYPE"]) != "html")
			$arFields["DETAIL_TEXT_TYPE"] = "text";
		if(strlen($arFields["DETAIL_TEXT_TYPE"]) > 0)
			$arFields["DETAIL_TEXT_TYPE"] = strtolower($arFields["DETAIL_TEXT_TYPE"]);

		$arStatus = array_keys($GLOBALS["AR_BLOG_PUBLISH_STATUS"]);
		if ((is_set($arFields, "PUBLISH_STATUS") || $ACTION=="ADD") && !in_array($arFields["PUBLISH_STATUS"], $arStatus))
			$arFields["PUBLISH_STATUS"] = $arStatus[0];

		if ((is_set($arFields, "ENABLE_TRACKBACK") || $ACTION=="ADD") && $arFields["ENABLE_TRACKBACK"] != "Y" && $arFields["ENABLE_TRACKBACK"] != "N")
			$arFields["ENABLE_TRACKBACK"] = "Y";

		if ((is_set($arFields, "ENABLE_COMMENTS") || $ACTION=="ADD") && $arFields["ENABLE_COMMENTS"] != "Y" && $arFields["ENABLE_COMMENTS"] != "N")
			$arFields["ENABLE_COMMENTS"] = "Y";

		if (is_set($arFields, "ATTACH_IMG"))
		{
			$res = CFile::CheckImageFile($arFields["ATTACH_IMG"], 0, 0, 0);
			if (strlen($res) > 0)
			{
				$GLOBALS["APPLICATION"]->ThrowException(GetMessage("BLG_GP_ERROR_ATTACH_IMG").": ".$res, "ERROR_ATTACH_IMG");
				return false;
			}
		}
		else
			$arFields["ATTACH_IMG"] = false;

		if (is_set($arFields, "NUM_COMMENTS"))
			$arFields["NUM_COMMENTS"] = IntVal($arFields["NUM_COMMENTS"]);
		if (is_set($arFields, "NUM_TRACKBACKS"))
			$arFields["NUM_TRACKBACKS"] = IntVal($arFields["NUM_TRACKBACKS"]);
		if (is_set($arFields, "FAVORITE_SORT"))
		{
			$arFields["FAVORITE_SORT"] = IntVal($arFields["FAVORITE_SORT"]);
			if($arFields["FAVORITE_SORT"] <= 0)
				$arFields["FAVORITE_SORT"] = false;
		}

		return True;
	}

	function SetPostPerms($ID, $arPerms = array(), $permsType = BLOG_PERMS_POST)
	{
		global $DB;

		$ID = IntVal($ID);
		$permsType = (($permsType == BLOG_PERMS_COMMENT) ? BLOG_PERMS_COMMENT : BLOG_PERMS_POST);

		$arPost = CBlogPost::GetByID($ID);
		if ($arPost)
		{
			$DB->StartTransaction();

			$arInsertedGroups = array();
			foreach ($arPerms as $key => $value)
			{
				$dbGroupPerms = CBlogUserGroupPerms::GetList(
					array(),
					array(
						"BLOG_ID" => $arPost["BLOG_ID"],
						"USER_GROUP_ID" => $key,
						"PERMS_TYPE" => $permsType,
						"POST_ID" => $arPost["ID"]
					),
					false,
					false,
					array("ID")
				);
				if ($arGroupPerms = $dbGroupPerms->Fetch())
				{
					CBlogUserGroupPerms::Update(
						$arGroupPerms["ID"],
						array(
							"PERMS" => $value,
							"AUTOSET" => "N"
						)
					);
				}
				else
				{
					CBlogUserGroupPerms::Add(
						array(
							"BLOG_ID" => $arPost["BLOG_ID"],
							"USER_GROUP_ID" => $key,
							"PERMS_TYPE" => $permsType,
							"POST_ID" => $arPost["ID"],
							"AUTOSET" => "N",
							"PERMS" => $value
						)
					);
				}

				$arInsertedGroups[] = $key;
			}

			$dbResult = CBlogUserGroupPerms::GetList(
				array(),
				array(
					"BLOG_ID" => $arPost["BLOG_ID"],
					"PERMS_TYPE" => $permsType,
					"POST_ID" => 0,
					"!USER_GROUP_ID" => $arInsertedGroups
				),
				false,
				false,
				array("ID", "USER_GROUP_ID", "PERMS")
			);
			while ($arResult = $dbResult->Fetch())
			{
				$dbGroupPerms = CBlogUserGroupPerms::GetList(
					array(),
					array(
						"BLOG_ID" => $arPost["BLOG_ID"],
						"USER_GROUP_ID" => $arResult["USER_GROUP_ID"],
						"PERMS_TYPE" => $permsType,
						"POST_ID" => $arPost["ID"]
					),
					false,
					false,
					array("ID")
				);
				if ($arGroupPerms = $dbGroupPerms->Fetch())
				{
					CBlogUserGroupPerms::Update(
						$arGroupPerms["ID"],
						array(
							"PERMS" => $arResult["PERMS"],
							"AUTOSET" => "Y"
						)
					);
				}
				else
				{
					CBlogUserGroupPerms::Add(
						array(
							"BLOG_ID" => $arPost["BLOG_ID"],
							"USER_GROUP_ID" => $arResult["USER_GROUP_ID"],
							"PERMS_TYPE" => $permsType,
							"POST_ID" => $arPost["ID"],
							"AUTOSET" => "Y",
							"PERMS" => $arResult["PERMS"]
						)
					);
				}
			}

			$DB->Commit();
		}
	}

	function Delete($ID)
	{
		global $DB;

		$ID = IntVal($ID);

		$arPost = CBlogPost::GetByID($ID);
		if ($arPost)
		{
			$dbResult = CBlogComment::GetList(
				array(),
				array("POST_ID" => $ID),
				false,
				false,
				array("ID")
			);
			while ($arResult = $dbResult->Fetch())
			{
				if (!CBlogComment::Delete($arResult["ID"]))
					return False;
			}

			$dbResult = CBlogUserGroupPerms::GetList(
				array(),
				array("POST_ID" => $ID, "BLOG_ID" => $arPost["BLOG_ID"]),
				false,
				false,
				array("ID")
			);
			while ($arResult = $dbResult->Fetch())
			{
				if (!CBlogUserGroupPerms::Delete($arResult["ID"]))
					return False;
			}

			$dbResult = CBlogTrackback::GetList(
				array(),
				array("POST_ID" => $ID, "BLOG_ID" => $arPost["BLOG_ID"]),
				false,
				false,
				array("ID")
			);
			while ($arResult = $dbResult->Fetch())
			{
				if (!CBlogTrackback::Delete($arResult["ID"]))
					return False;
			}

			$dbResult = CBlogPostCategory::GetList(
				array(),
				array("POST_ID" => $ID, "BLOG_ID" => $arPost["BLOG_ID"]),
				false,
				false,
				array("ID")
			);
			while ($arResult = $dbResult->Fetch())
			{
				if (!CBlogPostCategory::Delete($arResult["ID"]))
					return False;
			}

			$strSql = 
				"SELECT F.ID ".
				"FROM b_blog_post P, b_file F ".
				"WHERE P.ID = ".$ID." ".
				"	AND P.ATTACH_IMG = F.ID ";
			$z = $DB->Query($strSql, false, "FILE: ".__FILE__." LINE:".__LINE__);
			while ($zr = $z->Fetch())
				CFile::Delete($zr["ID"]);

			unset($GLOBALS["BLOG_POST"]["BLOG_POST_CACHE_".$ID]);

			$arBlog = CBlog::GetByID($arPost["BLOG_ID"]);

			$result = $DB->Query("DELETE FROM b_blog_post WHERE ID = ".$ID."", true);

			if (IntVal($arBlog["LAST_POST_ID"]) == $ID)
				CBlog::SetStat($arPost["BLOG_ID"]);

			if (CModule::IncludeModule("search"))
			{
				CSearch::Index("blog", "P".$ID,
					array(
						"TITLE" => "",
						"BODY" => ""
					)
				);
				//CSearch::DeleteIndex("blog", false, "COMMENT", $arPost["BLOG_ID"]."|".$ID);
			}

			if ($result)
			{
				$res = CBlogImage::GetList(array(), array("POST_ID"=>$ID));
				while($aImg = $res->Fetch())
					CBlogImage::Delete($aImg['ID']);
			}
			if ($result)
				$GLOBALS["USER_FIELD_MANAGER"]->Delete("BLOG_POST", $ID);

			return $result;
		}
		else
			return false;
		return True;
	}

	//*************** SELECT *********************/
	function PreparePath($blogUrl, $postID = 0, $siteID = False, $is404 = True, $userID = 0, $groupID = 0)
	{
		$blogUrl = Trim($blogUrl);
		$postID = IntVal($postID);
		$groupID = IntVal($groupID);
		$userID = IntVal($userID);
		
		if (!$siteID)
			$siteID = SITE_ID;

		$dbPath = CBlogSitePath::GetList(array(), array("SITE_ID"=>$siteID));
		while($arPath = $dbPath->Fetch())
		{
			if(strlen($arPath["TYPE"])>0)
				$arPaths[$arPath["TYPE"]] = $arPath["PATH"];
			else
				$arPaths["OLD"] = $arPath["PATH"];
		}

		if($postID > 0)
		{
			if($groupID > 0)
			{
				if(strlen($arPaths["H"])>0)
				{
					$result = str_replace("#blog#", $blogUrl, $arPaths["H"]);
					$result = str_replace("#post_id#", $postID, $result);
					$result = str_replace("#user_id#", $userID, $result);
					$result = str_replace("#group_id#", $groupID, $result);
				}
				elseif(strlen($arPaths["G"])>0)
				{
					$result = str_replace("#blog#", $blogUrl, $arPaths["G"]);
					$result = str_replace("#user_id#", $userID, $result);
					$result = str_replace("#group_id#", $groupID, $result);
				}
			}
			elseif(strlen($arPaths["P"])>0)
			{
				$result = str_replace("#blog#", $blogUrl, $arPaths["P"]);
				$result = str_replace("#post_id#", $postID, $result);
				$result = str_replace("#user_id#", $userID, $result);
			}
			elseif(strlen($arPaths["B"])>0)
			{
				$result = str_replace("#blog#", $blogUrl, $arPaths["B"]);
				$result = str_replace("#user_id#", $userID, $result);
			}
			else
			{
				if($is404)
					$result = htmlspecialchars($arPaths["OLD"])."/".htmlspecialchars($blogUrl)."/".$postID.".php";
				else
					$result = htmlspecialchars($arPaths["OLD"])."/post.php?blog=".$blogUrl."&post_id=".$postID;
			}
		}
		else
		{
			if(strlen($arPaths["B"])>0)
			{
				$result = str_replace("#blog#", $blogUrl, $arPaths["B"]);
				$result = str_replace("#user_id#", $userID, $result);
			}
			else
			{
				if($is404)
					$result = htmlspecialchars($arPaths["OLD"])."/".htmlspecialchars($blogUrl)."/";
				else
					$result = htmlspecialchars($arPaths["OLD"])."/post.php?blog=".$blogUrl;
			}
		}
		
		return $result;
	}

	function PreparePath2Post($realUrl, $url, $arParams = array())
	{
		return CBlogPost::PreparePath(
			$url,
			isset($arParams["POST_ID"]) ? $arParams["POST_ID"] : 0,
			isset($arParams["SITE_ID"]) ? $arParams["SITE_ID"] : False
		);
	}
	
	function CounterInc($ID)
	{
		global $DB;
		$ID = IntVal($ID);
		if(!is_array($_SESSION["BLOG_COUNTER"]))
			$_SESSION["BLOG_COUNTER"] = Array();
		if(in_array($ID, $_SESSION["BLOG_COUNTER"]))
			return;
		$_SESSION["BLOG_COUNTER"][] = $ID;
		$strSql =
			"UPDATE b_blog_post SET ".
			"	VIEWS =  ".$DB->IsNull("VIEWS", 0)." + 1 ".
			"WHERE ID=".$ID;
		$DB->Query($strSql);
	}

}
?>
