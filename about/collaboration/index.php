<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("��������������");
?>
<section class="mainContent">
<h1>��������������</h1>

          <h2>���������� ����������:</h2>

          <p>�������: (495) 777-8-999 </p>

          <p>E-mail: <a href="mailto:info@snq.ru">info@snq.ru</a>��</p>

          <h2>������� �����</h2>

          <strong>�� ���� ���������� ��� � ��������������! </strong>

          <p>���������� ����� �����, �� ������ ������������ �� ��������� ������� ������ �� ��������������� ��������� ����. </p>

          <p>������� ������ ��������������� ������������� � ������� �� ������ ������ ������. </p>

          <p>�� ���������� ��� ���������� ����������� ������� � ������� ������ ������� ����������� ������� � ����� ������������ �������� �����. </p>

          <p>��� ������, ����� ����������� � ������ ���������� ���������� ����. ������� ����� �� ������� �����, �� ��������� ����������� ����������� ���� �������! </p>

          <p><strong>������� �����: </strong></p>

          <p><strong>���:</strong> �+7 925-830-29-79</p>

          <p><strong>E-mail:</strong> <a href="mailto:opt@snq.ru">opt@snq.ru</a></p>

</section>

<aside class="aside">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"left_menu",
	Array(
		"ROOT_MENU_TYPE" => "left",
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => ""
	)
);?>
</aside>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>