<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>


<?
//echo "vacancy_id=".$id;

//get element
$arSelect = Array("ID","NAME","PREVIEW_TEXT");
$arFilter = Array("ID"=>$id);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$ob = $res->GetNextElement();
$arFields = $ob->GetFields();

echo "<h1>".$arFields['NAME']."</h1>";
echo "<div>".$arFields['PREVIEW_TEXT']."</div>";
?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>