<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("��������");
?>
<section class="mainContent">
<h1>��������</h1>
         <p>��� ��� �����</p>

          <p>����: 1057747108154</p>

          <p>����������� �����: 141408, ���������� ���., �.�����, ������������� �����, �������� 5</p>

          <p>���.: +7 (495) 777-8-999 </p>

          <p>E-mail: <a href="mailto:info@snq.ru" >info@snq.ru</a></p>

          <p> <br /> </p>
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

<table><tbody>
  <tr><td style="height: 23px; background-color: #9a0101; font-size: 10px; background-repeat: repeat no-repeat;"><a href="/unsubscribe/" style="color: rgb(255, 255, 255);" ><strong>����� �� SMS ��������</strong></a></td></tr>
</tbody></table>


</aside>

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
