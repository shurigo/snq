<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>

<table width="100%">
<tr><td width="33%"><a href="office.php">Вакансии в офисе</a></td><td width="33%"><a href="shops.php">Вакансии в магазинах</a></td><td width="34%">Вакансии Логистического центра</td></tr>
</table>
<br>

<?
//get element
$arSelect = Array("ID","NAME","PREVIEW_TEXT","PROPERTY_col_email","PROPERTY_col_phone");
$arFilter = Array("ID"=>$id);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$ob = $res->GetNextElement();
$arFields = $ob->GetFields();

//print_r($arFields);

//print
echo "<h1>".$arFields['NAME']."</h1>";
echo $arFields['PREVIEW_TEXT'];
if (strlen($arFields['PROPERTY_COL_PHONE_VALUE'])>0) echo '<br><div><b>Контактный телефон:</b> '.$arFields['PROPERTY_COL_PHONE_VALUE'].'</div>';
if (strlen($arFields['PROPERTY_COL_EMAIL_VALUE'])>0) echo '<br><div><b>E-mail:</b> <a href="mailto:'.$arFields['PROPERTY_COL_EMAIL_VALUE'].'">'.$arFields['PROPERTY_COL_EMAIL_VALUE'].'</a></div>';

$vacancy_name=$arFields['NAME'];
include("anketa.php");

?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>