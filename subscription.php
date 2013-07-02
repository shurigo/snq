<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if($strWarning == "")
{
    $arFields = Array(
        "USER_ID" => "",
        "FORMAT" => ("html"),
        "CONFIRMED" => "Y",
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
{
        CSubscription::Authorize($ID);
        echo " яоюяхан! реоепэ бш асдере б йспяе мюьху мнбняреи х юйжхи.";
}
else
{
        $strWarning .= $subscr->LAST_ERROR;
        echo $strWarning;
}
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>