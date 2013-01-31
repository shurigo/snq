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
	<div style="float:left;"><input type="text" name="q" value="Поиск" style="background:url(/images/search_field.png) no-repeat; border:0; padding:0 2px; font-size:11px; font-style:italic; color:#757575; height:23px; width:164px;" value="<?=$arResult["REQUEST"]["QUERY"]?>" onfocus="if(this.value=='Поиск') {this.value=''; this.style.color='#202020';}" onblur="if(!this.value) {this.value='Поиск'; this.style.color='#757575';}" /></div>
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
	<?foreach($arResult["SEARCH"] as $arItem):?>
    	<div style="margin:0 0 2px 0;">
        <table class="grey_table">
            <tr>
                <td class="left_top"></td>
                <td class="top"></td>
                <td class="right_top"></td>
            </tr>
            <tr>
                <td class="left"></td>
                <td class="center">
                    <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"] && $arItem["DISPLAY_ACTIVE_TO"]):?>
                        <div><span style="color:#121212; font-size:11px;"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?> - <?echo $arItem["DISPLAY_ACTIVE_TO"]?></span></div>
                    <?endif?>
                    <div class="header"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></div>
                    <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                        <div style="padding:5px 0 0 0px;"><?echo $arItem["PREVIEW_TEXT"];?></div>
                    <?endif;?>
                    <a href="<?echo $arItem["URL"]?>"><?
                        $arItem["TITLE_FORMATED"] = strip_tags($arItem["TITLE_FORMATED"]);
                        $arItem["TITLE_FORMATED"][0] = mb_strtoupper($arItem["TITLE_FORMATED"][0], "windows-1251");
                        echo "<strong>".$arItem["TITLE_FORMATED"]."</strong>";
                    ?></a>
                    <?
                    if (strlen($arItem["BODY_FORMATED"]) > 0)
					{
						?><p><?echo $arItem["BODY_FORMATED"]?></p><?
					}
					?>
        		</td>
                <td class="right"></td>
            </tr>
            <tr>
                <td class="left_bot"></td>
                <td class="bot"></td>
                <td class="right_bot"></td>
            </tr>
        </table>
        </div>
	<?endforeach;?>
    <div class="clear_both"></div>
	<div style="margin:10px 0;"><?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?></div>
    <div class="clear_both"></div>
<?else:?>
	<?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?>
<?endif;?>
</div>