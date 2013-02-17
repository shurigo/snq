<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$url_array = explode("/", $APPLICATION->GetCurPage());
?><section class="mainContent">
        <!--
        <div class="sort">
          <form class="ajax-load" action="inc/file.json">
            <fieldset>
              <span>Сортировать по</span>
              <select class="customSelect">
                <option>Цене</option>
                <option>Популярности</option>
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
				<?=number_format($arElement['PROPERTIES']['col_price_new']['VALUE'], 0, '.', ' ').' руб.';?>
				<del>
					<?=number_format($arElement['PROPERTIES']['col_price']['VALUE'], 0, '.', ' ').' руб.';?>
				</del>
			<?else:?>
			<span class="price">
				<?=number_format($arElement['PROPERTIES']['col_price']['VALUE'], 0, '.', ' ').' руб.';?>
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
	    <p>Дубленки издревле пользовались в России большой популярностью. Удобные и практичные, они обладают уникальными теплосберегающими свойствами. Неудивительно, что ещё со времён Петра I путешественники и военные тех времён выбирали в качестве основы своей униформы. Победное шествие русской дубленки в Европе началось в 50-е годы 20-го века, благодаря парижскому триумфу российского модельера Вячеслава Зайцева.</p>
        <p>За свою долгую историю дубленки претерпели целый ряд серьёзных преобразований. Появилось невероятное количество способов выделки овечьей шкуры для того, чтобы удовлетворить безудержный полёт творческой фантазии дизайнеров. Поэтому многие из современных женских дубленок, особенно те их представители, которые сошли в российские магазины с европейских подиумов, можно, скорее, назвать модной, имиджевой вещью, нежели чем серьёзным защитником от зимней стужи.Тем не менее, хорошие качественные дубленки остаются самой практичной вещью для холодной российской зимы и может прослужить Вам несколько сезонов! Кроме этого дубленки женские - красивые, и удобные и сочетать их с другими предметами костюма в повседневном городском гардеробе очень легко.</p>
        <p>Не знаете где купить дубленку, тогда приходите к нам, в магазин дубленок, мехов и модной одежды «Снежная Королева». У нас собрана лучшая коллекция Осень-Зима 2012-2013, отражающая все самые актуальные модные тенденции наступившего сезона. Мы предлагаем дубленки женские, дубленки мужские, ультрамодные и классические модели. Все это Вы сможете купить в наших магазинах в Москве и других крупных городах России, по очень привлекательной цене. Приходите, мы ждем Вас!</p>
      	 -->
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

</section>
<!-- end .mainContent-->
