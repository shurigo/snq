<?
IncludeModuleLangFile(__FILE__);

if($APPLICATION->GetGroupRight("vote")!="D")
{
/*
	$__rsChannel = CVoteChannel::GetList($xby="s_name", $xorder="asc", Array(), $is_filtered);
	while($__arChannel = $__rsChannel -> Fetch())
	{
		$channels[] = Array(
			"text" => $__arChannel["TITLE"],
			"url" => "vote_list.php?lang=".LANGUAGE_ID."&find_channel_id=".$__arChannel["ID"]."&set_filter=Y",
			"more_url" => Array(),
			"title" => GetMessage("VOTE_GROUP_LST").$__arChannel["TITLE"]
		);
	}
*/
	$aMenu = array(
		"parent_menu" => "global_menu_services",
		"section" => "vote",
		"sort" => 100,
		"text" => GetMessage("VOTE_MENU_MAIN"),
		"title" => GetMessage("VOTE_MENU_MAIN_TITLE"),
		"url" => "vote_index.php?lang=".LANGUAGE_ID,
		"icon" => "vote_menu_icon",
		"page_icon" => "vote_page_icon",
		"items_id" => "menu_vote",
		"items" => array(
			array(
				"text" => GetMessage("VOTE_MENU_CHANNEL"),
				"url" => "vote_channel_list.php?lang=".LANGUAGE_ID,
				"title" => GetMessage("VOTE_MENU_CHANNEL_ALT"),
//				"items_id" => "menu_vote_groups",
//				"items" => $channels,
				"more_url" => Array(
					"vote_channel_edit.php"
				)
			),
			array(
				"text" => GetMessage("VOTE_MENU_VOTE"),
				"url" => "vote_list.php?lang=".LANGUAGE_ID,
				"more_url" => Array(
					"vote_edit.php",
					"vote_question_list.php",
					"vote_question_edit.php",
					"vote_results.php",
					"vote_preview.php",
				),
				"title" => GetMessage("VOTE_MENU_VOTE_ALT"),
			),
			array(
				"text" => GetMessage("VOTE_MENU_USER"),
				"url" => "vote_user_list.php?lang=".LANGUAGE_ID,
				"more_url" => Array(),
				"title" => GetMessage("VOTE_MENU_USER_ALT")
			),
			array(
				"text" => GetMessage("VOTE_MENU_RESULT"),
				"url" => "vote_user_votes.php?lang=".LANGUAGE_ID,
				"more_url" => Array("vote_user_results.php"),
				"title" => GetMessage("VOTE_MENU_RESULT_ALT")
			)
		)
	);
	return $aMenu;
}
return false;
?>