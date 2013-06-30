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
        $strWarning .= "Ошибка подписки: ".$subscr->LAST_ERROR."<br>. Попробуйте еще раз.<br>";
}

if($strWarning == "")
{
  echo "Вы успешно подписались на рассылку от компании \"Снежная Королева\". На Ваш электронный адрес отправлено письмо с инструкцией по активации.<br /> Следите за нашими новостями и будьте в курсе последних событий!";}
else
{
  echo $strWarning;
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>