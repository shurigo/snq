<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
  $APPLICATION->SetTitle("�������� � ���������");
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
      "SECTION_NAME" => $_SESSION['city_name']
    ),
    false
  );
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
