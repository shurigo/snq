<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$arResult["NAME"][0] = mb_strtoupper($arResult["NAME"][0], "windows-1251");
?>
<table style="width:100%;">
    <tr>
        <noindex>  
        <td valign="top" style="padding:15px 0 0 25px;">
            <div style="float:left;"><a href="<?=($arResult["PRICE_SORT"] == "ASC")?$arResult["COMPONENT_URL"]."?price_sort=desc":$arResult["COMPONENT_URL"]."?price_sort=asc";?>" rel="nofollow">Сортировать по цене</a></div>
            <div style="float:left; margin:2px 0 0 7px;"><a href="<?=$arResult["COMPONENT_URL"]."?price_sort=asc"?>" rel="nofollow"><img src="/images/price_asc.png" width="10" height="10" alt="Сортировать по возрастанию цены" /></a></div>
            <div style="float:left; margin:2px 0 0 2px;"><a href="<?=$arResult["COMPONENT_URL"]."?price_sort=desc"?>" rel="nofollow"><img src="/images/price_desc.png" width="10" height="10" alt="Сортировать по убыванию цены" /></a></div>
        </td>
        </noindex>  
        <td valign="top"><?
            if($arParams["DISPLAY_TOP_PAGER"])
            {
                echo $arResult["NAV_STRING"]."<br />";
            }
            ?>
        </td>
    </tr>
</table>
<table style="width:100%;">
    <?foreach($arResult["ITEMS"] as $cell=>$arElement):?>

    <?if($cell%$arParams["LINE_ELEMENT_COUNT"] == 0):?>
    <tr>
    <?else:?>
    <td class="space"></td>
    <?endif;?>
    <td class="cat-elem" valign="top">
        <?
        if ($arParams["LINE_ELEMENT_COUNT"] <= $cell)
        {
            ?><div style="height:1px; background:#e6e9ed; margin-top:20px;"></div><?
        }
        ?>
        <?
        //echo "<pre>"; print_r($arElement); echo "</pre>";
        if(is_array($arElement["PREVIEW_PICTURE"]))
        {
            $image_width_changed = 0;
            $image_height_changed = 0;
            if ($arElement["PREVIEW_PICTURE"]["WIDTH"] > 220) 
            {
                $image_width = 220;
                $image_width_changed = 1;
            }
            else
            {
                $image_width = $arElement["PREVIEW_PICTURE"]["WIDTH"];
            }
            if ($arElement["PREVIEW_PICTURE"]["HEIGHT"] > 220) 
            {
                $image_height = 220;
                $image_height_changed = 1;
            }
            else
            {
                $image_height = $arElement["PREVIEW_PICTURE"]["HEIGHT"];
            }
            ?>
            <noindex><div class="cat_elem" align="center"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>" rel="nofollow"><img src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" <?=($image_width_changed)?'width="'.$image_width.'"':"";?> <?=($image_height_changed)?'height="'.$image_height.'"':"";?> align="absmiddle" alt="<?=$arElement["NAME"]?>"<?=($image_height)?' style="margin:'.round((220-$image_height)/2).'px 0 0 0;"':"";?><?=($image_width)?' style="margin:0 0 0 '.round((220-$image_width)/2).'px;"':"";?> /></a></div></noindex>
            <?
        }
         ?>
         <div align="center"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="cat_elem_name"><?
            $arElement["NAME"][0] = mb_strtoupper($arElement["NAME"][0], "windows-1251");
            echo $arElement["NAME"];
         ?></a></div>
         <?
         
         if (strlen($arElement["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]) > 0)
         {
             echo '<noindex><div class="cat_elem_brand" align="center">'.strip_tags($arElement["DISPLAY_PROPERTIES"]["col_brand"]["DISPLAY_VALUE"]).'</div></noindex>';
         }
         if (strlen($arElement["DISPLAY_PROPERTIES"]["col_model_code"]["VALUE"]) > 0)
         {
             echo '<noindex><div class="cat_elem_brand" align="center">'.strip_tags($arElement["DISPLAY_PROPERTIES"]["col_model_code"]["VALUE"]).'</div></noindex>';
         }
         
         if (intval($arElement["DISPLAY_PROPERTIES"]["col_price_new"]["VALUE"]) > 0)
         {
            ?>
            <noindex>
            <div class="price_block" align="center">
                <table style="width:auto;">
                    <tr>
                        <td></td>
                        <td>
                            <div style="padding:6px 0 0 10px; float:left; width:27px; height:6px;"><img src="/images/price_block/arrow.png" width="17" height="6" /></div>
                            <div style="font-size:11px; float:right; width:67px; height:12px; color:#000; font-weight:bold;">Новая цена</div>
                            <div class="clear_both"></div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="left_top"></td>
                        <td class="top"></td>
                        <td class="right_top"></td>
                    </tr>
                    <tr>
                        <td class="left"></td>
                        <td class="center"><?=number_format($arElement["DISPLAY_PROPERTIES"]["col_price_new"]["VALUE"], 0, '.', ' ')?> руб.</td>
                        <td class="right"></td>
                    </tr>
                    <tr>
                        <td class="left_bot"></td>
                        <td class="bot"></td>
                        <td class="right_bot"></td>
                    </tr>
                    <?
                    if (intval($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"]) > 0)
                    {
                        ?>
                        <tr>
                            <td></td>
                            <td style="text-decoration:line-through; text-align:right; font-size:14px; padding:2px 0 0 0;"><?=number_format($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')?> руб.</td>
                            <td></td>
                        </tr>
                        <?
                    }
                    ?>
                </table>
            </div>
            </noindex>
         <?
         }
         else
         {
            ?>
            <noindex>
            <div class="price_block" align="center">
                <table style="width:auto;">
                    <tr>
                        <td></td>
                        <td><div align="center"><img src="/images/price_block/arrow.png" width="17" height="6" /></div></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="left_top"></td>
                        <td class="top"></td>
                        <td class="right_top"></td>
                    </tr>
                    <tr>
                        <td class="left"></td>
                        <td class="center"><?=number_format($arElement["DISPLAY_PROPERTIES"]["col_price"]["VALUE"], 0, '.', ' ')?> руб.</td>
                        <td class="right"></td>
                    </tr>
                    <tr>
                        <td class="left_bot"></td>
                        <td class="bot"></td>
                        <td class="right_bot"></td>
                    </tr>
                </table>
            </div>
            </noindex>
         <?
         }
         /*if($arParams["DISPLAY_COMPARE"])
         {
             echo '<noindex><div style="margin:10px 0 0 0;"><a href="'.$arElement["COMPARE_URL"].'" rel="nofollow" style="font-size:11px;">Выбрать для сравнения</a></div></noindex>';
         }*/
         ?>
    </td>
    <?$cell++;
    if($cell%$arParams["LINE_ELEMENT_COUNT"] == 0):?>
        </tr>
    <?endif?>

    <?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>

    <?if($cell%$arParams["LINE_ELEMENT_COUNT"] != 0):?>
        <?while(($cell++)%$arParams["LINE_ELEMENT_COUNT"] != 0):?>
            <td></td>
        <?endwhile;?>
        </tr>
    <?endif?>
</table>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <br /><?=$arResult["NAV_STRING"]?>
<?endif;?>