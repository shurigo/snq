<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>

<?include_once($_SERVER['DOCUMENT_ROOT'].'/about/vacancies/header.php');?>

<?
//get element
$arSelect = Array("ID","NAME","PREVIEW_TEXT","PROPERTY_col_email","PROPERTY_col_phone");
$arFilter = Array("ID"=>$id);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$ob = $res->GetNextElement();
if(!$ob):?>
	<span class="red">Вакансия не найдена</span><?
else:
	$arFields = $ob->GetFields();
	//print
	echo "<h1>".$arFields['NAME']."</h1>";
	echo $arFields['PREVIEW_TEXT'];
	if (strlen($arFields['PROPERTY_COL_PHONE_VALUE'])>0) echo '<br><div><b>Контактный телефон:</b> '.$arFields['PROPERTY_COL_PHONE_VALUE'].'</div>';
	if (strlen($arFields['PROPERTY_COL_EMAIL_VALUE'])>0) echo '<br><div><b>E-mail:</b> <a href="mailto:'.$arFields['PROPERTY_COL_EMAIL_VALUE'].'">'.$arFields['PROPERTY_COL_EMAIL_VALUE'].'</a></div>';

	$vacancy_name=$arFields['NAME'];
	$hr_email=$arFields['PROPERTY_COL_EMAIL_VALUE'];
	include($_SERVER['DOCUMENT_ROOT'].'/about/vacancies/anketa.php');
endif;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
