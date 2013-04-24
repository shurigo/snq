<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if (count($arResult["ITEMS"]) > 0):?>
 <div class="slider1">
        <div class="prev"></div>
        <div class="next"></div>
        <div class="hold">
          <ul>
          <?foreach($arResult["ITEMS"] as $arItem):?>
            <?if (($arItem["DISPLAY_PROPERTIES"]["col_availability"]["VALUE"] ==0 && $arItem["DETAIL_PICTURE"]["SRC"]!="" && in_array(strval($_SESSION['city_id']), $arItem["DISPLAY_PROPERTIES"]["col_city_id"]["VALUE"])) ||($arItem["DISPLAY_PROPERTIES"]["col_availability"]["VALUE"] ==1 && $arItem["DETAIL_PICTURE"]["SRC"]!="" && !in_array(strval($_SESSION['city_id']), $arItem["DISPLAY_PROPERTIES"]["col_city_id"]["VALUE"])) ):?>
              <li><a href="/actions/<?=$arItem["ID"]?>/" alt="<?=$arItem["NAME"]?>"><img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" width="998" height="391" alt=" "></a></li>
            <?endif;?>
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
          <?if (($arItem["DISPLAY_PROPERTIES"]["col_availability"]["VALUE"] ==0 && $arItem["DETAIL_PICTURE"]["SRC"]!="" && in_array(strval($_SESSION['city_id']), $arItem["DISPLAY_PROPERTIES"]["col_city_id"]["VALUE"])) ||($arItem["DISPLAY_PROPERTIES"]["col_availability"]["VALUE"] ==1 && $arItem["DETAIL_PICTURE"]["SRC"]!="" && !in_array(strval($_SESSION['city_id']), $arItem["DISPLAY_PROPERTIES"]["col_city_id"]["VALUE"])) ):?>
            <li><?=$arItem["NAME"]?></li>
          <?endif;?>
        <?endforeach;?>
        </ul>
        <!-- end .nav-->
</div>
<!-- end .slider1-->
<?endif;?>
