<?
IncludeModuleLangFile(__FILE__);

if($APPLICATION->GetGroupRight("blog") >= "R")
{
	$aMenu = array(
		"parent_menu" => "global_menu_services",
		"section" => "blog",
		"sort" => 550,
		"text" => GetMessage("BLG_AM_BLOGS"),
		"title"=> GetMessage("BLG_AM_BLOGS_ALT"),
		"url" => "blog_index.php?lang=".LANGUAGE_ID,
		"icon" => "blog_menu_icon",
		"page_icon" => "blog_page_icon",
		"items_id" => "menu_blog",
		"items" => array(
			array(
				"text" => GetMessage("BLG_AM_BLOGS1"),
				"url" => "blog_blog.php?lang=".LANGUAGE_ID,
				"more_url" => array("blog_blog_edit.php"),
				"title" => GetMessage("BLG_AM_BLOGS1_ALT")
			),
			array(
				"text" => GetMessage("BLG_AM_GROUPS"),
				"url" => "blog_group.php?lang=".LANGUAGE_ID,
				"more_url" => array("blog_group_edit.php"),
				"title" => GetMessage("BLG_AM_GROUPS_ALT")
			),
			array(
				"text" => GetMessage("BLOG_MENU_SMILES"),
				"url" => "blog_smile.php?lang=".LANGUAGE_ID,
				"more_url" => array("blog_smile_edit.php"),
				"title" => GetMessage("BLOG_MENU_SMILES_ALT")
			),
		)
	);

	return $aMenu;
}
return false;
?>
