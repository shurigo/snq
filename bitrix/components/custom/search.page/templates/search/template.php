<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
//echo "<pre>"; print_r($arResult); echo "</pre>";
?>
<div class="search-page">
<form action="" method="get">
<?if($arParams["USE_SUGGEST"] === "Y"):
	if(strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"]))
	{
		$arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
		$obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
		$obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
	}
	?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:search.suggest.input",
		"",
		array(
			"NAME" => "q",
			"VALUE" => $arResult["REQUEST"]["~QUERY"],
			"INPUT_SIZE" => 40,
			"DROPDOWN_SIZE" => 10,
			"FILTER_MD5" => $arResult["FILTER_MD5"],
		),
		$component, array("HIDE_ICONS" => "Y")
	);?>
<?else:?>
	<div style="float:left;"><input type="text" name="q" value="Поиск" style="background:url(/images/search_field.png) no-repeat; border:0; padding:0 2px; font-size:11px; font-style:italic; color:#757575; height:23px; width:166px;" value="<?=$arResult["REQUEST"]["QUERY"]?>" onfocus="if(this.value=='Поиск') {this.value=''; this.style.color='#202020';}" onblur="if(!this.value) {this.value='Поиск'; this.style.color='#757575';}" /></div>
<?endif;?>
<?if($arParams["SHOW_WHERE"]):?>
	&nbsp;<select name="where">
	<option value=""><?=GetMessage("SEARCH_ALL")?></option>
	<?foreach($arResult["DROPDOWN"] as $key=>$value):?>
	<option value="<?=$key?>"<?if($arResult["REQUEST"]["WHERE"]==$key) echo " selected"?>><?=$value?></option>
	<?endforeach?>
	</select>
<?endif;?>
    <div style="float:left; padding:0 0 0 7px;"><input type="submit" name="submit" value="" style="background:url(/images/arrows/blue_right.png) no-repeat; border:0; width:25px; height:23px;" /></div>
    <div class="clear_both"></div>
	<input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
<?if($arParams["SHOW_WHEN"]):?>
	<script>
	var switch_search_params = function()
	{
		var sp = document.getElementById('search_params');
		var flag;

		if(sp.style.display == 'none')
		{
			flag = false;
			sp.style.display = 'block'
		}
		else
		{
			flag = true;
			sp.style.display = 'none';
		}

		var from = document.getElementsByName('from');
		for(var i = 0; i < from.length; i++)
			if(from[i].type.toLowerCase() == 'text')
				from[i].disabled = flag

		var to = document.getElementsByName('to');
		for(var i = 0; i < to.length; i++)
			if(to[i].type.toLowerCase() == 'text')
				to[i].disabled = flag

		return false;
	}
	</script>
	<br /><a class="search-page-params" href="#" onclick="return switch_search_params()"><?echo GetMessage('CT_BSP_ADDITIONAL_PARAMS')?></a>
	<div id="search_params" class="search-page-params" style="display:<?echo $arResult["REQUEST"]["FROM"] || $arResult["REQUEST"]["TO"]? 'block': 'none'?>">
		<?$APPLICATION->IncludeComponent(
			'bitrix:main.calendar',
			'',
			array(
				'SHOW_INPUT' => 'Y',
				'INPUT_NAME' => 'from',
				'INPUT_VALUE' => $arResult["REQUEST"]["~FROM"],
				'INPUT_NAME_FINISH' => 'to',
				'INPUT_VALUE_FINISH' =>$arResult["REQUEST"]["~TO"],
				'INPUT_ADDITIONAL_ATTR' => 'size="10"',
			),
			null,
			array('HIDE_ICONS' => 'Y')
		);?>
	</div>
<?endif?>
</form><br />
<?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
<?elseif($arResult["ERROR_CODE"]!=0):?>
	<h2>Ошибка!</h2>
	<p><?=strip_tags($arResult["ERROR_TEXT"]);?></p>
    <p>Пожалуйста введите название модели в поле поиска, расположенное выше.</p>
<?elseif(count($arResult["SEARCH"])>0):?>
	<div style="float:left;"><h2>Результаты поиска</h2></div>
	<div style="margin:10px 0; float:right;"><?if($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"]?></div>
	<div class="clear_both"></div>
	
    
    
    <?
    $line_element_count = 3;
	?>
    
    <table style="width:100%;">
    <?foreach($arResult["SEARCH"] as $cell=>$arElement):?>

    <?if($cell%$line_element_count == 0):?>
    <tr>
    <?else:?>
    <td class="space"></td>
    <?endif;?>
    <td class="cat-elem" valign="top">
        <?
        if ($line_element_count <= $cell)
        {
            ?><div style="height:1px; background:#e6e9ed; margin-top:20px;"></div><?
        }
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
            <noindex><div class="cat_elem" align="center"><a href="<?=$arElement["URL"]?>" rel="nofollow"><img src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" <?=($image_width_changed)?'width="'.$image_width.'"':"";?> <?=($image_height_changed)?'height="'.$image_height.'"':"";?> align="absmiddle" alt="<?=$arElement["NAME"]?>"<?=($image_height)?' style="margin:'.round((220-$image_height)/2).'px 0 0 0;"':"";?><?=($image_width)?' style="margin:0 0 0 '.round((220-$image_width)/2).'px;"':"";?> /></a></div></noindex>
            <?
        }
         ?>
         <div align="center"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="cat_elem_name"><?
            $arElement["NAME"][0] = mb_strtoupper($arElement["NAME"][0], "windows-1251");
            echo $arElement["NAME"];
         ?></a></div>
         <?
         
         if (strlen($arElement["BRAND_NAME"]) > 0)
         {
             echo '<noindex><div class="cat_elem_brand" align="center">'.strip_tags($arElement["BRAND_NAME"]).'</div></noindex>';
         }
         if (strlen($arElement["PROPERTY_1_VALUE"]) > 0)
         {
             echo '<noindex><div class="cat_elem_brand" align="center">'.strip_tags($arElement["PROPERTY_1_VALUE"]).'</div></noindex>';
         }
         
         if (intval($arElement["PROPERTY_13_VALUE"]) > 0)
         {
            ?>
            <noindex>
            <div class="price_block" align="center">
                <table style="width:auto;">
                    <tr>
                        <td></td>
                        <td>
                            <div style="padding:6px 0 0 10px; float:left; width:27px; height:6px;"><img src="/images/price_block/arrow.png" width="17" height="6" /></div>
                            <div style="font-size:11px; float:right; width:67px; height:12px; color:#2f618c; font-weight:bold;">Новая цена</div>
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
                        <td class="center"><?=number_format($arElement["PROPERTY_13_VALUE"], 0, '.', ' ')?> руб.</td>
                        <td class="right"></td>
                    </tr>
                    <tr>
                        <td class="left_bot"></td>
                        <td class="bot"></td>
                        <td class="right_bot"></td>
                    </tr>
                    <?
                    if (intval($arElement["PROPERTY_3_VALUE"]) > 0)
                    {
                        ?>
                        <tr>
                            <td></td>
                            <td style="text-decoration:line-through; text-align:right; font-size:14px; padding:2px 0 0 0;"><?=number_format($arElement["PROPERTY_3_VALUE"], 0, '.', ' ')?> руб.</td>
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
                        <td class="center"><?=number_format($arElement["PROPERTY_3_VALUE"], 0, '.', ' ')?> руб.</td>
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
    if($cell%$line_element_count == 0):?>
        </tr>
    <?endif?>

    <?endforeach;?>

    <?if($cell%$line_element_count != 0):?>
        <?while(($cell++)%$line_element_count != 0):?>
            <td></td>
        <?endwhile;?>
        </tr>
    <?endif?>
</table>
    
    
    
    <div class="clear_both"></div>
	<div style="margin:10px 0;"><?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?></div>
    <div class="clear_both"></div>
<?else:?>
	<?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?>
<?endif;?>
</div>