<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?> <section class="mainContent">
  <h1>��������</h1>

  <p style="text-align: center;"><img width="777px" height="574px" border="0" src="/images/jobs.jpg" /></p>

  <p>&laquo;������� ��������&raquo; &mdash; ���������� � ��������� ������������� ���������� ���� ��������������� ��������� ������ ������. ������� � ����� �������� � ������� ������������ ������� ������������ 100 ��������� ��������.</p>

  <p>�������� �������� &ndash; ��������� ������������� ��������, ��������������� ����� ����������� �������������� ����������� ��� ��������.
    <br />
   �������� �������� - ��� ������� �������������� � ������������� �������� ����������.
    <br />
   �������� �������� � ����� ����� ��������������� ��������� ������ ������, ����� (���� � ����, <a href="/collection/wmink/" >���� �� �����</a>, ���������, <a href="/collection/wfurvest/" >������� ������</a>) � �����������.
    <br />

    <br />
   � ��������� ������ � �������� �������� ����� 3000 �������. ���� �� ���������� � ����������, ���������� ��������� ���� ������� � ���������� ��������, �������� �������� � ��������� ���� � �������, �������� �������� �������� ������������� ��� ����� �����������.
    <br />

    <br />
   �� ���������� �������� �������� � ������� �������� �������� �������� �� ��� �������� � ����������:
    <br />
   </p>

  <ul>
    <li>��������� ������ �����, </li>

    <li>������� ������������ �� ����������� ������, </li>

    <li>������������������� ��������� (� �.�. ������������ ������, ����������), </li>

    <li>����������� ����������������� � ���������� �����, </li>

    <li>���������� ������ � ������� ����������, </li>

    <li>������������ ������ ��� ����������� �� ������ ������ </li>
   </ul>

  <p>����� ������� ������ � ����!</p>

  <p>�������������� ���������� � ��� �� ������ �������� �� �������� <strong>(495) 777-8-999</strong>. </p>

  <br />

  <table width="100%">
    <tbody>
      <tr><td width="33%" align="center"><a href="office.php" ><img src="./img/office.jpg" alt="�������� � �����" border="0" />
            <br />
          �������� � �����</a></td><td width="33%" align="center"><a href="shops.php" ><img src="./img/shops.jpg" alt="�������� � ���������" border="0" />
            <br />
          �������� � ���������</a></td><td width="34%" align="center"><a href="logistics.php" ><img src="./img/logistics.jpg" alt="�������� �������������� ������" border="0" />
            <br />
          �������� �������������� ������</a></td></tr>
     </tbody>
  </table>

<!--
          <div style="margin: 20px 0pt 0pt;"><img id="__bx_c2_0.6945433095097542" src="/bitrix/components/bitrix/catalog.section.list/images/sections_top_count.gif" __bxtagname="component2" /> </div>
-->
 </section> <aside class="aside"> <?$APPLICATION->IncludeComponent(
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
);?> <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>