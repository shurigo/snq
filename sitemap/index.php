<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("����� �����");
?>
<div style="margin:45px;">
  <table style="width: 100%;">
    <tbody>
      <tr> <td valign="top" style="width: auto; -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
          <h1>����� �����</h1>
<b>���� ����</b>
<ul>
<li><a href="/collection/wmink/">���� ��������</a></li>
<li><a href="/collection/wfox/">���� �� ����</a></li>
<li><a href="/collection/wrabbit/">���� �� �������</a></li>
<li><a href="/collection/wfurvest/">������� ������</a></li>
<li><a href="/collection/wfurother/">������ ����</a></li>
</ul>
<b>������� ������</b>
<ul>
<li><a href="/collection/wskincoat/" title="�������� �������">��������</a></li>
<li><a href="/collection/wleathertopjacket/" title="������� ������ �������">������� ������</a></li>
<li><a href="/collection/wleathertopcoat/" title="������ �� ���� �������">������ �� ����</a></li>
<li><a href="/collection/wtopjacket/" title="������ �������">������</a></li>
<!--<li><a href="/collection/wwindbreaker/" title="�������� �������">��������</a></li>-->
<li><a href="/collection/wtopcoat/" title="������ �������">������</a></li>
<li><a href="/collection/wtopcloak/" title="����� �������">�����</a></li>
<li><a href="/collection/wpaddedcoat/" title="�������� �������">��������</a></li>
<li><a href="/collection/wdress/">������</a></li>
<li><a href="/collection/wtunic/">������</a></li>
<li><a href="/collection/wskirt/">����</a></li>
<li><a href="/collection/wcardigan/">��������� � ��������</a></li>
<li><a href="/collection/wtshort/">�������� � ����</a></li>
<li><a href="/collection/wblouse/">������</a></li>
<li><a href="/collection/wpants/">�����/������</a></li>
<li><a href="/collection/wshorts/">�����/�����������</a></li>
<li><a href="/collection/zheskie_kupalniki/">������� ������ � ����������</a></li>
</ul>
<b>������� ������</b>
<ul>
<li><a href="/collection/mskincoat/" title="�������� �������">��������</a></li>
<li><a href="/collection/mleathertopjacket/" title="������� ������� ������">������� ������</a></li>
<li><a href="/collection/mtopjacket/" title="������� ������">������</a></li>
<!--<li><a href="/collection/mwindbreaker/" title="������� ��������">��������</a></li>-->
<li><a href="/collection/mtopcloak/" title="����� �������">�����</a></li>
<li><a href="/collection/mpaddedcoat/" title="�������� �������">��������</a></li>
<li><a href="/collection/mtopcoat/" title="������ �������">������</a></li>
<li><a href="/collection/mtrico/">��������� � ��������</a></li>
<li><a href="/collection/mblazer/">�������</a></li>
<li><a href="/collection/mshirt/">�������</a></li>
<li><a href="/collection/mpants/">�����/������</a></li>
<li><a href="/collection/mtshort/">��������</a></li>
<li><a href="/collection/mshorts/">�����</a></li>
<li><a href="/collection/muzhskie_plavki_shorti/">������� ������ � ����������</a></li>
</ul>
         </td> <td valign="top" style="width: 237px; padding: 30px 0pt 0pt; -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;"><?$APPLICATION->IncludeComponent(
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
);?> </td> </tr>
     </tbody>
   </table>
 </div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>