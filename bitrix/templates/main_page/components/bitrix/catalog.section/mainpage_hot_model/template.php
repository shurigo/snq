<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?foreach($arResult["ITEMS"] as $cell=>$arElement):?>

<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">

<?
$resizer = $arElement['PREVIEW_PICTURE'];
$file = CFile::ResizeImageGet($resizer, array('width'=>240, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL, true);
$img = $file['src'];
?>

<img src="<?=$img?>"  alt=" ">


<span class="text"><strong>����<br>������</strong>
<?
$arElement["NAME"][0] = mb_strtoupper($arElement["NAME"][0], "windows-1251");
echo $arElement["NAME"];

$price=number_format($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ');
$price_title="����";
$old_price="<br /> ";

//check if there is discount
if ($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"] < $arElement["DISPLAY_PROPERTIES"]["col_price_origin"]["VALUE"])
{$price=number_format($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ');
$price_title="����� ����";
$old_price=number_format($arElement["DISPLAY_PROPERTIES"]["col_price_origin"]["VALUE"], 0, '.', ' ').'  ���.';
}


?>
<span class="brand"><?=strip_tags($arElement["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"])?></span></span><!-- end .text-->
<span class="price">
<?=$price_title?> <span class="bg"><?=$price?> ���.</span>
<del><?=$old_price?></del>
</span><!-- end .price-->
</a>

<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>