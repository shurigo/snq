<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("��������������");
?> 
<div style="margin:10px 45px 45px;">
<h1>��������������</h1>
<table style="width:100%;">
	<tr>
    	<td style="width:206px; vertical-align:top;"><?$APPLICATION->IncludeComponent(
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
        );?></td>
        <td style="width:auto; vertical-align:top; padding:0 0 0 23px;">		 
         
         
          <h3>���������� ����������:</h3>
         
          <p>�������: (495) 777-8-999 </p>
         
          <p>E-mail: <a href="mailto:info@snq.ru">info@snq.ru</a>��</p>
         
          <h2>������� �����</h2>
         
          <h3>�� ���� ���������� ��� � ��������������! </h3>
         
          <p>���������� ����� �����, �� ������ ������������ �� ��������� ������� ������ �� ��������������� ��������� ����. </p>
         
          <p>������� ������ ��������������� ������������� � ������� �� ������ ������ ������. </p>
         
          <p>�� ���������� ��� ���������� ����������� ������� � ������� ������ ������� ����������� ������� � ����� ������������ �������� �����. </p>
         
          <p>��� ������, ����� ����������� � ������ ���������� ���������� ����. ������� ����� �� ������� �����, �� ��������� ����������� ����������� ���� �������! </p>
         
          <h3>������� �����: </h3>
         
          <p><strong>���:</strong> �+7 925-830-29-79</p>
         
          <p><strong>E-mail:</strong> <a href="mailto:opt@snq.ru">opt@snq.ru</a></p>
         
          <p> </p>
         
          <br />
         
          <a href="/collection/wfurs/">����</a> | <a href="/collection/wmink/">���� �� �����</a> | <a href="/collection/wskincoat/">��������</a> </div>
         </td>
    </tr>
</table>
 </div>

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>