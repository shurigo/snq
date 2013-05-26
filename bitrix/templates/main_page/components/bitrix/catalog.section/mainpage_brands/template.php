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

         $resizer = $arItem["DISPLAY_PROPERTIES"]["brands_carousel"]["FILE_VALUE"];
         $file = CFile::ResizeImageGet($resizer, array('width'=>110, 'height'=>110), BX_RESIZE_IMAGE_PROPORTIONAL, true);
         $img = $file['src'];

            ?>

            <li><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$img?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" /></a></li>


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