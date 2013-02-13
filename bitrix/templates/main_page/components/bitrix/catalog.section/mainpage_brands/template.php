<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (count($arResult["ITEMS"]) > 0)
{
?>

  <div class="slider2">
    <div class="prev"></div>
    <div class="next"></div>
    <div class="hold">
      <ul>
      	<?foreach($arResult["ITEMS"] as $arItem):?>

		<?
        if (strlen($arItem["DISPLAY_PROPERTIES"]["brands_carousel"]["VALUE"]) > 0)
        {
            ?>

            <li><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["DISPLAY_PROPERTIES"]["brands_carousel"]["FILE_VALUE"]["SRC"]?>" width="130px" height="130px" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" /></a></li>

            <?
        }
        ?>

        <?endforeach;?>
      </ul>
    </div>
    <!-- end .hold-->
  </div>
  <!-- end .slider2-->

<?
}
?>