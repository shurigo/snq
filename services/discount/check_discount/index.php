<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Скидка по карте");
$APPLICATION->AddHeadString('<link rel="stylesheet" type="text/css" href="styles.css" />');

if (isset($_POST['formsent']))
{
	//Номер карты
	if (isset($_POST["card_number"]) && !is_numeric($_POST["card_number"]))
	{
		$error_array['card_number_error'] = "Ошибка: номер карты должен состоять только из цифр!";
		$error_array['card_number_lang_error'] = 1;
	}
	elseif (isset($_POST["card_number"]) && strlen($_POST["card_number"]) > 0) 
	{
		$card_number = trim(strip_tags($_POST["card_number"]));
	}
	else 
	{
		$error_array['card_number_error'] = "Ошибка: номер карты не введён!";
	}
	
	//Проверочный код
	if (isset($_POST["captcha_word"]) && strlen($_POST["captcha_word"]) == 0)
	{
		$error_array['captcha_word_error'] = "Ошибка: код с картинки не введён!";
	}
	elseif(!$APPLICATION->CaptchaCheckCode($_POST["captcha_word"], $_POST["captcha_sid"]))
	{
		$error_array['captcha_word_error'] = "Ошибка: не верный код с картинки!";
	}
}
?>
<div style="margin:10px 45px 45px;">
    <noindex>
        <script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
        <div style="float: right;" class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="button" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir"></div> 
    </noindex>
    <h1>Проверка размера скидки</h1>
    <?
    //echo "<pre>"; print_r($arResult); echo "</pre>";
    ?>
    <table style="width:100%;">
        <tr>
            <td style="width:206px; vertical-align:top; padding:5px 0 0 0;">
            	<h3>Последние новости</h3>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "mainpage_news",
                    Array(
                        "DISPLAY_DATE" => "Y",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "AJAX_MODE" => "N",
                        "IBLOCK_TYPE" => "news",
                        "IBLOCK_ID" => "3",
                        "NEWS_COUNT" => "3",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_ORDER1" => "DESC",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER2" => "ASC",
                        "FILTER_NAME" => "",
                        "FIELD_CODE" => "",
                        "PROPERTY_CODE" => "",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "/about/news/?ELEMENT_ID=#ELEMENT_ID#",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "DISPLAY_PANEL" => "N",
                        "SET_TITLE" => "N",
                        "SET_STATUS_404" => "Y",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "ADD_SECTIONS_CHAIN" => "Y",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "3600",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "PAGER_TITLE" => "Новости",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => "",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "AJAX_OPTION_SHADOW" => "Y",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "AJAX_OPTION_HISTORY" => "N"
                    )
                );?>
            </td>
            <td style="width:auto; vertical-align:top; padding:5px 0 0 23px;">
	            <?
				$code = $APPLICATION->CaptchaGetCode(); 
                if(isset($_POST['formsent']) && count($error_array) == 0)
                {
					if (CModule::IncludeModule("iblock"))
					{
						$dbCard = CIBlockElement::GetList(array(), array("IBLOCK_ID"=>12, "NAME"=>$card_number), false, false, array("NAME", "ID", "PROPERTY_discount_percent"));
						$arCard = $dbCard->GetNext();
						
						//echo "<pre>"; print_r($arCard); echo "</pre>";

						if ($arCard["ID"])
						{
							?>
							<h3>Дисконтная карта найдена!</h3>
							<p>Размер скидки по карте с номером "<strong><?=$arCard["NAME"]?></strong>" составляет <strong><?=$arCard["PROPERTY_DISCOUNT_PERCENT_VALUE"]?>%</strong>.
                            <p>Вернуться в раздел "<a href="/services/discount/">Дисконтная программа</a>"</p>
							<?
						}
						else
						{
							?>
							<h3>Дисконтная карта не найдена!</h3>
							<p>К сожалению карта с номером "<strong><?=$card_number?></strong>" не найдена. 
							<p>Возможно вы ошиблись при вводе номера карты. Если это так, то введите номер вашей дисконтной карты заново в форму ниже. 
							<p>В случае если вы уверены, что ввели номер правильно, позвоните нам по номеру 8 (800) 777-8-999 и мы постараемся решить данную проблему.
							<form action="" method="post" enctype="multipart/form-data" id="check_certificate">
							<input type="hidden" name="formsent" value="1" />
							<input type="hidden" name="captcha_sid" value="<?=$code;?>" />
							<div class="form_name">Номер дисконтной карты:</div>
							<div class="form_field<?=(strlen($error_array['card_number_error']) > 0)?" error":"";?>"><input type="text" name="card_number" value="<?=(isset($card_number))?$card_number:'';?>" maxlength="16" /></div>
							<?
							if(strlen($error_array['card_number_error']) > 0)
							{
								?><div class="form_error"><?=$error_array['card_number_error']?></div><?
							}
							if (!isset($_POST['formsent']) || (strlen($error_array['card_number_error']) > 0 && $error_array['card_number_lang_error'] != 1))
							{
								?><div class="form_field_descr">Например: 1234567890</div><?
							}
							?>
							<div class="form_name">Введите код с картинки в поле ниже:</div>
							<div class="form_field"><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$code;?>" width="180" height="40" alt="Введите код с этой картинки в поле ниже" title="Введите код с этой картинки в поле ниже" /></div>
							<div class="form_field<?=(strlen($error_array['captcha_word_error']) > 0)?' error':'';?>">
								<input type="input" name="captcha_word" value="" />
							</div>
							<?
							if(strlen($error_array['captcha_word_error']) > 0)
							{
								?><div class="form_error"><?=$error_array['captcha_word_error']?></div><?
							}
							?>
							<div class="form_submit"><input type="submit" name="submit" value="Проверить скидку" /></div>
							</form>
                            <p>Вернуться в раздел "<a href="/services/discount/">Дисконтная программа</a>"</p>
							<?
						}
					}
					else
					{
						?>
                        <h3>Внутренняя ошибка!</h3>
                        <p>При обработке запроса произошла внутренняя ошибка сайта, пожалуйста сообщите нам об этом по телефону 8 (800) 777-8-999.
                        <p>Приносим свои извинения.
                        <?
					}
                }
                else
                {
                    ?>
                    <p>Уважаемые клиенты!</p>
                    <p>На этой странице вы можете проверить размер скидки по вашей дисконтной карте. Для этого введите номер вашей карты и проверочный код в поле ниже и нажмите на кнопку "Проверить скидку".</p>
                    <form action="" method="post" enctype="multipart/form-data" id="check_certificate">
                    <input type="hidden" name="formsent" value="1" />
                    <input type="hidden" name="captcha_sid" value="<?=$code;?>" />
                    <div class="form_name">Номер дисконтной карты:</div>
                    <div class="form_field<?=(strlen($error_array['card_number_error']) > 0)?" error":"";?>"><input type="text" name="card_number" value="<?=(isset($card_number))?$card_number:'';?>" maxlength="10" /></div>
                    <?
                    if(strlen($error_array['card_number_error']) > 0)
                    {
                        ?><div class="form_error"><?=$error_array['card_number_error']?></div><?
                    }
                    if (!isset($_POST['formsent']) || (strlen($error_array['card_number_error']) > 0 && $error_array['card_number_lang_error'] != 1))
                    {
                        ?><div class="form_field_descr">Например: 1234567890</div><?
                    }
                    ?>
                    <div class="form_name">Введите код с картинки в поле ниже:</div>
                    <div class="form_field"><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$code;?>" width="180" height="40" alt="Введите код с этой картинки в поле ниже" title="Введите код с этой картинки в поле ниже" /></div>
                    <div class="form_field<?=(strlen($error_array['captcha_word_error']) > 0)?' error':'';?>">
                        <input type="input" name="captcha_word" value="" />
                    </div>
                    <?
                    if(strlen($error_array['captcha_word_error']) > 0)
                    {
                        ?><div class="form_error"><?=$error_array['captcha_word_error']?></div><?
                    }
                    ?>
                    <div class="form_submit"><input type="submit" name="submit" value="Проверить скидку" /></div>
                    </form>
                    <p>Вернуться в раздел "<a href="/services/discount/">Дисконтная программа</a>"</p>
                    <?
                }
                ?>
			</td>
        </tr>
    </table>
</div>

<div class="mainContent_footer">
    <div id="mainPageFooterTable">
        <table style="width:100%;">
            <tr>
                <td style="width:206px;">
                    <div class="header">Читайте также:</div><br />
                    <a href="/about/fashion_blog/">Блог модного редактора</a><br />
                    <a href="/about/about_fur/">Интересное о мехе</a><br />	
                </td>
                <td style="width:auto;">
                    <table class="darkgrey_table">
                        <tr>
                            <td class="left_top"></td>
                            <td class="top"></td>
                            <td class="right_top"></td>
                        </tr>
                        <tr>
                            <td class="left"></td>
                            <td class="center">
                                <?
								if (strlen($url_array[3]) == 0)
								{
									if (strlen($arSec["DESCRIPTION"]) > 0)
									{
										?><div style="margin:0px 0 0 0;"><?=$arSec["DESCRIPTION"]?></div><?
									}
									elseif (CModule::IncludeModule("iblock"))
									{									
										$arTopDescrSelect = Array("ID", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT");
										$arTopDescrFilter = Array("IBLOCK_ID"=>$arResult["IBLOCK_ID"], "SECTION_ID"=>$arSec["ID"], "ACTIVE"=>"N", "NAME" => "top_description");
										$dbTopDescr = CIBlockElement::GetList(array(), $arTopDescrFilter, false, array(), $arTopDescrSelect);
										if($arTopDescr = $dbTopDescr->GetNext())
										{
											?><div style="margin:0px 0 0 0;"><?=$arTopDescr["PREVIEW_TEXT"]?></div><?
											//echo "<pre>"; print_r($arTopDescr); echo "</pre>";
										}
									}
								}
                                ?>
                                <noindex><div style="margin:5px 0 0 0;"><strong>На сайте представлена лишь часть всего ассортимента. Уточняйте цены по телефону (495) 777-8-999.</strong></div></noindex></td>
                            <td class="right"></td>
                        </tr>
                        <tr>
                            <td class="left_bot"></td>
                            <td class="bot"></td>
                            <td class="right_bot"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>