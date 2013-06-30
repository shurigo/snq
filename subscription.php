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
        echo "Вы успешно подписались на нашу рассылку! Следите за нашими новостями и будьте в курсе последних событий!";
}
else
{
        $strWarning .= "Ошибка подписки: ".$subscr->LAST_ERROR."<br>. Попробуйте еще раз.<br>";
        echo $strWarning;
}
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>