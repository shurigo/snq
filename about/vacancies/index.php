<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("��������");
?> 
<div style="margin: 10px 45px 45px;"> 
  <h1>��������</h1>
 
  <table style="width: 100%;"> 	 
    <tbody> 
      <tr> 	<td style="width: 206px; vertical-align: top; -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; border-image: none;"><?$APPLICATION->IncludeComponent(
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
);?></td> <td style="width: auto; vertical-align: top; padding: 0pt 0pt 0pt 23px; -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; border-image: none;">	 
          <p>&laquo;������� ��������&raquo; &mdash; ���������� � ��������� ������������� ���������� ���� ��������������� ��������� ������ ������. ������� � ����� �������� � ������� ������������ ������� ������������ 100 ��������� ��������.</p>
         
          <p>&laquo;������� ��������&raquo; &ndash; ��������� ������������� ��������, ��������������� ����� ����������� �������������� ����������� ��� ��������. 
            <br />
           &laquo;������� ��������&raquo; - ��� ������� �������������� � ������������� �������� ����������. 
            <br />
           &laquo;������� ��������&raquo; &ndash; ����� ����� ��������������� ��������� ������ ������, ����� (<a href="/collection/wfurs/">���� � ����</a>, <a href="/collection/wmink/">���� �� �����</a>, ���������, <a href="/collection/wfurvest/">������� ������</a>) � �����������. 
            <br />
           
            <br />
           � ��������� ������ � �������� �������� ����� 3000 �������. ���� �� ���������� � ����������, ���������� ��������� ���� ������� � ���������� ��������, �������� �������� � ��������� ���� � �������, �������� &laquo;������� ��������&raquo; ������������� ��� ����� �����������. 
            <br />
           
            <br />
           �� ���������� �������� �������� � ������� �������� &laquo;������� ��������&raquo; �� ��� �������� � ����������: 
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
         
          <div style="margin: 20px 0pt 0pt;"><?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"vacancies",
	Array(
		"IBLOCK_TYPE" => "vacancies",
		"IBLOCK_ID" => "6",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"COUNT_ELEMENTS" => "N",
		"TOP_DEPTH" => "2",
		"DISPLAY_PANEL" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y"
	)
);?> </div>
         </td></tr>
     </tbody>
   </table>
 </div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>