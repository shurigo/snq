<?
  if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
  require($_SERVER['DOCUMENT_ROOT'].'/ipgeo/geohelper.php');

  if(!CModule::IncludeModule("iblock")) {
    ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
    return;
  }

  //  Processing of received parameters
  if(!isset($arParams["CACHE_TIME"])) {$arParams["CACHE_TIME"] = 3600;}

  unset($arParams["IBLOCK_TYPE"]); //was used only for IBLOCK_ID setup with Editor
  $arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);
  $arParams["IBLOCK_SHOPS_ID"] = intval($arParams["IBLOCK_SHOPS_ID"]);
  $city_select = get_city_by_name($_SESSION['city_name'], $arParams['IBLOCK_ID']);
  if (is_numeric($city_select) && ($arIBlockSection = GetIBlockSection($city_select, "vacancies"))) {
    $arParams["SECTION_ID"] = $arIBlockSection["ID"];
  } else {
    $arParams["SECTION_ID"] = 183;
  }
  // Work with cache
  if($this->StartResultCache(false, array($arrFilter, $arParams["SECTION_ID"], ($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups())))) {
    $arResult = array();
    // Get cities from the shops block
    $arFilter = array(
      "ACTIVE"=>"Y",
      "GLOBAL_ACTIVE"=>"Y",
      "IBLOCK_ID"=>$arParams["IBLOCK_SHOPS_ID"],
      "IBLOCK_ACTIVE"=>"Y",
    );    
    $shop_city_sections = CIBlockSection::GetList(array("NAME"=>"ASC"), $arFilter, false, array("UF_*"));
    // Get the shops section from vacancies block
    $arFilter = array(
      "NAME"=>"Вакансии в магазинах",
      "ACTIVE"=>"Y",
      "GLOBAL_ACTIVE"=>"Y",
      "IBLOCK_ID"=>$arParams["IBLOCK_ID"],
      "IBLOCK_ACTIVE"=>"Y",
    );
    $shops_section_list = CIBlockSection::GetList(array("NAME"=>"ASC"), $arFilter, false, array('ID', 'NAME'));
    $shops_section = $shops_section_list->GetNext();
    // city loop
    while($city = $shop_city_sections->GetNext()) {
      $arResult[$city["ID"]] = $city;
      $arSort = array(
        "NAME" => "ASC"
      );
      $arFilter = array(
        "ACTIVE"=>"Y",
        "GLOBAL_ACTIVE"=>"Y",
        "IBLOCK_ID"=>$arParams["IBLOCK_ID"],
        "IBLOCK_ACTIVE"=>"Y",
        "SECTION_ID"=>$shops_section["ID"],
        "NAME" => $city["NAME"],
      );
      $arSelect = array(
        "ID",
        "NAME",
        "PREVIEW_TEXT",
        "PROPERTY_*",
      );
      $sections = CIBlockSection::GetList($arSort, $arFilter, false, false, $arSelect);
      $section = $sections->GetNext();
      $rsElements = CIBlockElement::GetList(
        $arSort,
        Array(
          'ACTIVE'=>'Y',
          'IBLOCK_ID'=>$arParams['IBLOCK_ID'],
          'SECTION_ID' => $section['ID']
        ),
        false,
        false,
        Array(
          "ID",
          "NAME",
          "IBLOCK_ID",
          "PREVIEW_TEXT",
          "PROPERTY_*"
        )
      );
      $rsElements->SetUrlTemplates($arParams["DETAIL_URL"]);
      $rsElements->SetSectionContext($city);
      $city["ITEMS"] = array();
      while($obElement = $rsElements->GetNext()) {
        $arResult[$city["ID"]]["ITEMS"][] = $obElement;
      }
    }
    $this->SetResultCacheKeys(array());
    $this->IncludeComponentTemplate();
  }
?>
