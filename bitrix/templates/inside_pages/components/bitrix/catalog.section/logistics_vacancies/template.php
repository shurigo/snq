<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult["ITEMS"] as $arElement):?>
  <p><a href="detail.php?id=<?=$arElement["ID"]?>"><?=$arElement["NAME"]?></a></p>
<?endforeach;?>
<hr>
<p><a href="/about/vacancies/">Все вакансии</a></p>