<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->IncludeComponent(
	"bitrix:voting.result", 
	".default", 
	Array(
		"VOTE_ID" => $arResult["VOTE_ID"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"ADDITIONAL_CACHE_ID" => $arResult["ADDITIONAL_CACHE_ID"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
	),
	($this->__component->__parent ? $this->__component->__parent : $component)
);
?>