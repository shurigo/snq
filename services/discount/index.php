<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("���������� ���������");
?>
<section class="mainContent">
<h1>���������� ���������</h1>
         <p>� ���� ��������� &quot;������� ��������&quot; ��������� ������������� ���������� �������. ��� ������ ����� ����� ����� �������, ��� ���� ������� ������ �� ���������� �����.</p>

          <p>���������� ����� �������� ��� ������� ���������� ��������� ������� �� ����� ����� � ����� �������� &quot;������� ��������&quot;. ������ ����� ���� ����� �� ��������� ������ ��� ������� � ����� �������� ���� �������� �������� �� ���������� ������. ���������� ��� ��������� ���������� ����� �������� ����������� ����������� ������ �������.</p>

          <p>��� ����� �������, ������� � ������, ��������� �� ���� ���������� ����� ����������. � ����������� �� ����������� ���� ���������� ��������������� ������ ������� ������:</p>

          <table cellspacing="0" cellpadding="0" border="1" width="100%">
            <tbody>
              <tr> <td width="40%" style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  <b>����������� ����� �������</b>
                 </td> <td width="60%" style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  <b>������ ������, ��������������� ����������</b>
                 </td> </tr>

              <tr> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  ����� 5 000 ������
                 </td> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  <strong>3%</strong>
                 </td> </tr>

              <tr> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  ����� 50 000 ������
                 </td> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  <strong>5%</strong>
                 </td> </tr>

              <tr> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  ����� 120 000 ������
                 </td> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  <strong>7%</strong>                </td> </tr>

              <tr> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  ����� 230 000 ������
                 </td> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  <strong>10%</strong>
                 </td> </tr>

              <tr> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  ����� 1 000 000 ������
                 </td> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  <strong>15%</strong>
                 </td> </tr>
             </tbody>
           </table>

          <p>* ������ �� ���������� ����� �� ����������� � ������� �������� � �� ��������������� �� ������, ����������� �� ����������� �����.</p>

          <p>�������� &quot;������� ��������&quot; ��������� �� ����� ����� �������� ���� �������� ���������� ����� � ������� ����������� � ����� ������ ��� ������������ � ������������� ����.</p>

</section>

<aside class="aside">
<?
$APPLICATION->IncludeComponent(
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
);
?>
</aside>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>