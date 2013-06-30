<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

//there must be at least one newsletter category
//if(!is_array($sf_RUB_ID) || count($sf_RUB_ID) == 0)
//    $strWarning .= "There must be at least one category."."<br>";

if($strWarning == "")
{
    $arFields = Array(
        "USER_ID" => "",
        "FORMAT" => ("html"),
        "EMAIL" => $sf_EMAIL,
        "ACTIVE" => "Y",
        "RUB_ID" => $sf_RUB_ID
    );

if(CModule::IncludeModule("subscribe"))
{
  $subscr = new CSubscription;
}

//can add without authorization
$ID = $subscr->Add($arFields);
if($ID>0)
        CSubscription::Authorize($ID);
else
        $strWarning .= "������ ��������: ".$subscr->LAST_ERROR."<br>. ���������� ��� ���.<br>";
}

if($strWarning == "")
{
  echo "�� ������� ����������� �� �������� �� �������� \"������� ��������\". �� ��� ����������� ����� ���������� ������ � ����������� �� ���������.<br /> ������� �� ������ ��������� � ������ � ����� ��������� �������!";}
else
{
  echo $strWarning;
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>