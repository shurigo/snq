<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
  $title = 'Вакансии в магазинах';
  include_once($_SERVER['DOCUMENT_ROOT'].'/about/vacancies/header.php');
  $APPLICATION->SetTitle($title);
  $APPLICATION->IncludeComponent(
    "custom:vacancies", 
    "", 
    Array(
      "IBLOCK_TYPE" => "vacancies",
      "IBLOCK_ID" => "6",
      "IBLOCK_SHOPS_ID" => "7",
      "CACHE_TYPE" => "N",
      "CACHE_TIME" => "3600",
      "CACHE_FILTER" => "N",
      "CACHE_GROUPS" => "Y",
    ),
    false
  );
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
