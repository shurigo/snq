<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (count($arResult["ITEMS"]) > 0)
{
?>

 <div class="slider1">
        <div class="prev"></div>
        <div class="next"></div>
        <div class="hold">
          <ul>
          <?foreach($arResult["ITEMS"] as $arItem):?>

			<?  if (in_array($_SESSION['city_id'],$arItem['PROPERTIES']['col_city_id']['VALUE']) || $arItem['PROPERTIES']['col_availability']['VALUE'] == 1):  ?>
                    <li><a href="/actions/<?=$arItem["ID"]?>/"><img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" width="998" height="391" alt=" "></a></li>
		    <? endif; ?>
         <?endforeach;?>
         </ul>
        </div>
        <!-- end .hold-->
        <div class="line">
          <div></div>
        </div>
        <!-- end .line-->

        <ul class="nav">
  	    <?foreach($arResult["ITEMS"] as $arItem):?>
			<?  if (in_array($_SESSION['city_id'],$arItem['PROPERTIES']['col_city_id']['VALUE']) || $arItem['PROPERTIES']['col_availability']['VALUE'] == 1):  ?>
            <li><?=$arItem["NAME"]?></li>
            <? endif; ?>
        <?endforeach;?>
          <!--
          <li class="active">������ 20% ��<br>
            ������ �Glamour�!</li>
          <li>������ �� ����<br>
            �� 25%!</li>
          <li>��������<br>
            �� 14 990 ���!</li>
          <li>������ ����<br>
            � �������!</li>
          <li>���������� ������<br>
            � �������!</li>
          -->

         </ul>
        <!-- end .nav-->

      </div>
      <!-- end .slider1-->


<?
}
?>