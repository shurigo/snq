<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("������ � ���");
?>
<div>
<table style="width:100%;">
    <tr>
        <td style="width:auto; padding:10px 29px 0 16px;" valign="top">
  			<h1>������ � ���</h1>
        </td>
        <td style="width:237px; padding:30px 0 0 0;" valign="top"><?$APPLICATION->IncludeComponent("bitrix:menu", "left_menu", Array(
	"ROOT_MENU_TYPE" => "left",	// ��� ���� ��� ������� ������
	"MAX_LEVEL" => "1",	// ������� ����������� ����
	"CHILD_MENU_TYPE" => "left",	// ��� ���� ��� ��������� �������
	"USE_EXT" => "N",	// ���������� ����� � ������� ���� .���_����.menu_ext.php
	"DELAY" => "N",	// ����������� ���������� ������� ����
	"ALLOW_MULTI_SELECT" => "N",	// ��������� ��������� �������� ������� ������������
	"MENU_CACHE_TYPE" => "N",	// ��� �����������
	"MENU_CACHE_TIME" => "3600",	// ����� ����������� (���.)
	"MENU_CACHE_USE_GROUPS" => "Y",	// ��������� ����� �������
	"MENU_CACHE_GET_VARS" => "",	// �������� ���������� �������
	),
	false
);?></td>
    </tr>
</table>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>