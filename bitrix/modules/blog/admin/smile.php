<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/blog/include.php");

$blogModulePermissions = $APPLICATION->GetGroupRight("blog");
if ($blogModulePermissions < "R")
	$APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));

IncludeModuleLangFile(__FILE__);

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/blog/prolog.php");

// ������������� �������
$sTableID = "tbl_blog_smile";

// ������������� ����������
$oSort = new CAdminSorting($sTableID, "ID", "asc");
// ������������� ������
$lAdmin = new CAdminList($sTableID, $oSort);

// ������������� ���������� ������ - �������
$arFilterFields = array();

$lAdmin->InitFilter($arFilterFields);

$arFilter = array();

// ��������� �������� ��������� � ���������
if (($arID = $lAdmin->GroupAction()) && $blogModulePermissions >= "W")
{
	if ($_REQUEST['action_target']=='selected')
	{
		$arID = array();
		$dbResultList = CBlogSmile::GetList(
			array($by => $order),
			$arFilter
		);
		while ($arResult = $dbResultList->Fetch())
			$arID[] = $arResult['ID'];
	}

	foreach ($arID as $ID)
	{
		if (strlen($ID) <= 0)
			continue;

		switch ($_REQUEST['action'])
		{
			case "delete":

				@set_time_limit(0);

				$DB->StartTransaction();

				$arOldSmile = CBlogSmile::GetByID($ID);

				if (!CBlogSmile::Delete($ID))
				{
					$DB->Rollback();

					if ($ex = $APPLICATION->GetException())
						$lAdmin->AddGroupError($ex->GetString(), $ID);
					else
						$lAdmin->AddGroupError(GetMessage("ERROR_DEL_SMILE"), $ID);
				}
				else
				{
					if ($arOldSmile)
					{
						$strDirNameOld = $_SERVER["DOCUMENT_ROOT"]."/bitrix/images/blog/";
						if ($arOldSmile["SMILE_TYPE"]=="I")
							$strDirNameOld .= "icon";
						else
							$strDirNameOld .= "smile";
						$strDirNameOld .= "/".$arOldSmile["IMAGE"];
						@unlink($strDirNameOld);
					}
				}

				$DB->Commit();

				break;
		}
	}
}

$dbResultList = CBlogSmile::GetList(
	array($by => $order),
	$arFilter
);

$dbResultList = new CAdminResult($dbResultList, $sTableID);
$dbResultList->NavStart();

// ��������� ���������� ������
$lAdmin->NavText($dbResultList->GetNavPrint(GetMessage("PAGES")));

// ��������� ������
$lAdmin->AddHeaders(array(
	array("id"=>"ID", "content"=>GetMessage("SMILE_ID"), "sort"=>"ID", "default"=>true),
	array("id"=>"SORT","content"=>GetMessage("SMILE_SORT"), "sort"=>"SORT", "default"=>true),
	array("id"=>"SMILE_TYPE", "content"=>GetMessage('SMILE_TYPE'),	"sort"=>"SMILE_TYPE", "default"=>true),
	array("id"=>"NAME", "content"=>GetMessage("BLOG_NAME"),  "sort"=>"", "default"=>true),
	array("id"=>"TYPING", "content"=>GetMessage("BLOG_TYPING"), "sort"=>"", "default"=>true),
	array("id"=>"ICON", "content"=>GetMessage("BLOG_SMILE_ICON"), "sort"=>"", "default"=>true),
));

$arVisibleColumns = $lAdmin->GetVisibleHeaderColumns();

// ���������� ������
while ($arBlog = $dbResultList->NavNext(true, "f_"))
{
	$row =& $lAdmin->AddRow($f_ID, $arBlog);

	$row->AddField("ID", '<a href="/bitrix/admin/blog_smile_edit.php?ID='.$f_ID.'&lang='.LANGUAGE_ID.'" title="'.GetMessage("BLOG_EDIT_DESCR").'">'.$f_ID.'</a>');
	$row->AddField("SORT", $f_SORT);
	$row->AddField("SMILE_TYPE", (($f_SMILE_TYPE=="I") ? GetMessage("SMILE_TYPE_ICON") : GetMessage("SMILE_TYPE_SMILE")));

	$fieldShow = "";
	if (in_array("NAME", $arVisibleColumns))
	{
		$arSmileLang = CBlogSmile::GetLangByID($f_ID, LANG);
		$fieldShow .= htmlspecialchars($arSmileLang["NAME"]);
	}
	$row->AddField("NAME", $fieldShow);

	$row->AddField("TYPING", $f_TYPING);
	$row->AddField("ICON", "<img src=\"/bitrix/images/blog/".(($f_SMILE_TYPE=="I")?"icon":"smile")."/".$f_IMAGE."\" border=\"0\" ".((IntVal($f_IMAGE_WIDTH) > 0) ? "width=\"".$f_IMAGE_WIDTH."\"" : "")." ".((IntVal($f_IMAGE_WIDTH) > 0) ? "height=\"".$f_IMAGE_HEIGHT."\"" : "" ).">");

	$arActions = Array();
	if ($blogModulePermissions >= "R")
	{
		$arActions[] = array("ICON"=>"edit", "TEXT"=>GetMessage("BLOG_EDIT_DESCR"), "ACTION"=>$lAdmin->ActionRedirect("blog_smile_edit.php?ID=".$f_ID."&lang=".LANG."&".GetFilterParams("filter_").""), "DEFAULT"=>true);
	}
	if ($blogModulePermissions >= "W")
	{
		$arActions[] = array("SEPARATOR" => true);
		$arActions[] = array("ICON"=>"delete", "TEXT"=>GetMessage("BLOG_DELETE_DESCR"), "ACTION"=>"if(confirm('".GetMessage('SMILE_DEL_CONF')."')) ".$lAdmin->ActionDoGroup($f_ID, "delete"));
	}

	$row->AddActions($arActions);
}

// "������" ������
$lAdmin->AddFooter(
	array(
		array(
			"title" => GetMessage("MAIN_ADMIN_LIST_SELECTED"),
			"value" => $dbResultList->SelectedRowsCount()
		),
		array(
			"counter" => true,
			"title" => GetMessage("MAIN_ADMIN_LIST_CHECKED"),
			"value" => "0"
		),
	)
);

// ����� ����� � �������� ����������, ...
$lAdmin->AddGroupActionTable(
	array(
		"delete" => GetMessage("MAIN_ADMIN_LIST_DELETE"),
	)
);

if ($blogModulePermissions >= "W")
{
	$aContext = array(
		array(
			"TEXT" => GetMessage("FSAN_ADD_NEW"),
			"LINK" => "blog_smile_edit.php?lang=".LANG,
			"TITLE" => GetMessage("FSAN_ADD_NEW_ALT"),
			"ICON" => "btn_new"
		),
	);
	$lAdmin->AddAdminContextMenu($aContext);
}

// �������� �� ����� ������ ������ (� ������ ������, ������ ������ ����������� �� �����)
$lAdmin->CheckListMode();


/****************************************************************************/
/***********  MAIN PAGE  ****************************************************/
/****************************************************************************/
$APPLICATION->SetTitle(GetMessage("SMILE_TITLE"));
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");

$lAdmin->DisplayList();

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>