<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["NAME"][0] = mb_strtoupper($arResult["NAME"][0], "windows-1251");
echo $arResult["NAME"];
?>