<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$url_array = explode("/", $APPLICATION->GetCurPage());
?><section class="mainContent">
        <!--
        <div class="sort">
          <form class="ajax-load" action="inc/file.json">
            <fieldset>
              <span>����������� ��</span>
              <select class="customSelect">
                <option>����</option>
                <option>������������</option>
              </select>
            </fieldset>
          </form>
        </div>
        -->
        <!-- end .sort-->
<?
	$APPLICATION->IncludeComponent(
		"bitrix:breadcrumb",
		"breadcrumb",
		Array(
			"START_FROM" => "1",
			"PATH" => "",
			"SITE_ID" => "-"
		),
		false
	);
?>


<input type="hidden" id="section" value="<?=$url_array[2]?>">
<?if($arParams['JSON'] == "1"):?>
<?echo '{
  "data": {
    "next": true,
    "html":"';
?>
<?endif;?>

<section data-page="/bitrix/components/custom/catalog.section/templates/.default/template.php" class="catalog">

<?foreach($arResult["ITEMS"] as $arElement):?>

<?

  if ($arElement["DETAIL_PICTURE"]["HEIGHT"]>$arElement["DETAIL_PICTURE"]["WIDTH"])
  {
    $height=180;
    $x=round($arElement["DETAIL_PICTURE"]["HEIGHT"]/$height);
    $width=round($arElement["DETAIL_PICTURE"]["WIDTH"]/$x);
  }
  else
  {
    $width=120;
    $x=round($arElement["DETAIL_PICTURE"]["WIDTH"]/$width);
    $height=round($arElement["DETAIL_PICTURE"]["HEIGHT"]/$x);
  }

?>

	<article>
		<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
          <span class="photo"><span class="cell"><!--[if lte IE 7]><span><span><![endif]-->
          <img src="<?=$arElement["DETAIL_PICTURE"]["SRC"]?>" width="<?=$width?>" height="<?=$height?>" alt=""> <!--[if lte IE 7]></span></span><![endif]--></span></span> <!-- end .photo-->

			<span class="text">
				<span class="name">
				<?=strip_tags($arElement['DISPLAY_PROPERTIES']['col_brand']['DISPLAY_VALUE']);?>
				</span>
				<?=$arElement['NAME']?>
			</span>
			<!-- end .text -->
			<?if(!empty($arElement['PROPERTIES']['col_price_new']['VALUE'])):?>
			<span class="price bg-red">
				<?=number_format($arElement['PROPERTIES']['col_price_new']['VALUE'], 0, '.', ' ').' ���.';?>
				<del>
					<?=number_format($arElement['PROPERTIES']['col_price']['VALUE'], 0, '.', ' ').' ���.';?>
				</del>
			<?else:?>
			<span class="price">
				<?=number_format($arElement['PROPERTIES']['col_price']['VALUE'], 0, '.', ' ').' ���.';?>
				<new>New</new>
			<?endif?>
			</span>
      <!-- end .price-->
		</a>
	</article>
	<!-- end .article -->

<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>
<?if($arParams['JSON'] == "1"):?>
<?echo "\"}}" ;?>
<?endif;?>

	</section>
	<!-- end .catalog-->
	    <!--
	    <p>�������� �������� ������������ � ������ ������� �������������. ������� � ����������, ��� �������� ����������� ����������������� ����������. �������������, ��� ��� �� ����� ����� I ��������������� � ������� ��� ����� �������� � �������� ������ ����� ��������. �������� ������� ������� �������� � ������ �������� � 50-� ���� 20-�� ����, ��������� ���������� ������� ����������� ��������� ��������� �������.</p>
        <p>�� ���� ������ ������� �������� ���������� ����� ��� ��������� ��������������. ��������� ����������� ���������� �������� ������� ������� ����� ��� ����, ����� ������������� ����������� ���� ���������� �������� ����������. ������� ������ �� ����������� ������� ��������, �������� �� �� �������������, ������� ����� � ���������� �������� � ����������� ��������, �����, ������, ������� ������, ��������� �����, ������ ��� ��������� ���������� �� ������ �����.��� �� �����, ������� ������������ �������� �������� ����� ���������� ����� ��� �������� ���������� ���� � ����� ���������� ��� ��������� �������! ����� ����� �������� ������� - ��������, � ������� � �������� �� � ������� ���������� ������� � ������������ ��������� ��������� ����� �����.</p>
        <p>�� ������ ��� ������ ��������, ����� ��������� � ���, � ������� ��������, ����� � ������ ������ �������� ��������. � ��� ������� ������ ��������� �����-���� 2012-2013, ���������� ��� ����� ���������� ������ ��������� ������������ ������. �� ���������� �������� �������, �������� �������, ������������ � ������������ ������. ��� ��� �� ������� ������ � ����� ��������� � ������ � ������ ������� ������� ������, �� ����� ��������������� ����. ���������, �� ���� ���!</p>
      	 -->
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

</section>
<!-- end .mainContent-->
