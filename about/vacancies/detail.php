<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>

<table>
<tr><td><a href="office.php">Вакансии в офисе</a></td><td><a href="shops.php">Вакансии в магазинах</a></td><td>Вакансии Логистического центра</td></tr>
</table><br>

<?
//get element
$arSelect = Array("ID","NAME","PREVIEW_TEXT","PROPERTY_col_email");
$arFilter = Array("ID"=>$id);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$ob = $res->GetNextElement();
$arFields = $ob->GetFields();

//print_r($arFields);

//print
echo "<h1>".$arFields['NAME']."</h1>";
echo $arFields['PREVIEW_TEXT'];
echo "<br><div><b>E-mail:</b> ".$arFields['PROPERTY_COL_EMAIL_VALUE']."</div>";

?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>