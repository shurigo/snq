<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Проверка сертификата шубы");
$APPLICATION->AddHeadString('<link rel="stylesheet" type="text/css" href="styles.css" />');

if (isset($_POST['formsent']))
{
	//Номер сертификата
	if (isset($_POST["certificate_number"]) && strlen($_POST["certificate_number"]) > 10)
	{
		$error_array['certificate_number_error'] = "Ошибка: слишком длинный номер сертификата!";
		$error_array['certificate_number_lang_error'] = 1;
	}
	elseif (isset($_POST["certificate_number"]) && strlen($_POST["certificate_number"]) > 0) 
	{
		$certificate_number = trim(strip_tags($_POST["certificate_number"]));
	}
	else 
	{
		$error_array['certificate_number_error'] = "Ошибка: номер сертификата не введён!";
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
    <h1>Проверка сертификата шубы</h1>
    <?
    //echo "<pre>"; print_r($arResult); echo "</pre>";
    ?>
    <table style="width:100%;">
        <tr>
            <td style="width:206px; vertical-align:top; padding:10px 0 0 0;">
                <?
                $url_array = explode("/", $APPLICATION->GetCurPage());
                CModule::IncludeModule("iblock");
                //echo "<pre>"; print_r($url_array); echo "</pre>";
                if ($url_array[1] == "collection" && strlen($url_array[2]) > 0)
                {
                    $dbSec = CIBlockSection::GetList(
                        array(), 
                        array(
                            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                            "CODE" => "wfurs",
                        )
                    );
                    if ($arSec = $dbSec->GetNext())
                    {
                        $APPLICATION->IncludeComponent(
                            "custom:catalog.section.list",
                            "collection_mainpage",
                            Array(
                                "IBLOCK_TYPE" => "collection",
                                "IBLOCK_ID" => 1,
                                "SECTION_ID" => $arSec["ID"],
                                "DISPLAY_PANEL" => "N",
                                "CACHE_TYPE" => "A",
                                "CACHE_TIME" => "3600",
                                "CACHE_GROUPS" => "Y",
                                "SECTION_URL" => "",
                                "TOP_DEPTH" => 4,
            
                                "LEFT_MENU_FLAG" => 1,
                            )
                        );
                    }
                }
                ?>
            </td>
            <td style="width:auto; vertical-align:top; padding:5px 0 0 23px;">
	            <?
				$code = $APPLICATION->CaptchaGetCode(); 
                if(isset($_POST['formsent']) && count($error_array) == 0)
                {
					if (CModule::IncludeModule("iblock"))
					{
						$dbCertificate = CIBlockElement::GetList(array(), array("IBLOCK_ID"=>11, "NAME"=>$certificate_number));
						$arCertificate = $dbCertificate->GetNext();
						if ($arCertificate["ID"])
						{
							?>
							<h3>Сертификат найден!</h3>
							<p>Поздравляем, Ваш сертификат "<strong><?=$certificate_number?></strong>" подлинный!
                            <p><a href="/collection/wfurs/">Вернуться в коллекцию</a></p>
							<?
						}
						else
						{
							?>
							<h3>Сертификат не найден!</h3>
							<p>К сожалению сертификат с номером "<strong><?=$certificate_number?></strong>" не найден. 
							<p>Возможно вы ошиблись при вводе номера сертификата. Если это так, то введите номер сертификата заново в форму ниже. 
							<p>В случае если вы уверены, что ввели номер правильно, позвоните нам по номеру 8 (800) 777-8-999 и мы постараемся решить данную проблему.
							<form action="" method="post" enctype="multipart/form-data" id="check_certificate">
							<input type="hidden" name="formsent" value="1" />
							<input type="hidden" name="captcha_sid" value="<?=$code;?>" />
							<div class="form_name">Номер сертификата:</div>
							<div class="form_field<?=(strlen($error_array['certificate_number_error']) > 0)?" error":"";?>"><input type="text" name="certificate_number" value="<?=(isset($certificate_number))?$certificate_number:'';?>" maxlength="10" /></div>
							<?
							if(strlen($error_array['certificate_number_error']) > 0)
							{
								?><div class="form_error"><?=$error_array['certificate_number_error']?></div><?
							}
							if (!isset($_POST['formsent']) || (strlen($error_array['certificate_number_error']) > 0 && $error_array['certificate_number_lang_error'] != 1))
							{
								?><div class="form_field_descr">Например: ABC0123456789</div><?
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
							<div class="form_submit"><input type="submit" name="submit" value="Проверить сертификат" /></div>
							</form>
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
                    <p>На этой странице вы можете проверить подлинность сертификата вашей шубы. Для этого введите номер вашего сертификата и проверочный код в поле ниже и нажмите на кнопку "Проверить сертификат".</p>
                    <form action="" method="post" enctype="multipart/form-data" id="check_certificate">
                    <input type="hidden" name="formsent" value="1" />
                    <input type="hidden" name="captcha_sid" value="<?=$code;?>" />
                    <div class="form_name">Номер сертификата:</div>
                    <div class="form_field<?=(strlen($error_array['certificate_number_error']) > 0)?" error":"";?>"><input type="text" name="certificate_number" value="<?=(isset($certificate_number))?$certificate_number:'';?>" maxlength="10" /></div>
                    <?
                    if(strlen($error_array['certificate_number_error']) > 0)
                    {
                        ?><div class="form_error"><?=$error_array['certificate_number_error']?></div><?
                    }
                    if (!isset($_POST['formsent']) || (strlen($error_array['certificate_number_error']) > 0 && $error_array['certificate_number_lang_error'] != 1))
                    {
                        ?><div class="form_field_descr">Например: ABC0123456789</div><?
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
                    <div class="form_submit"><input type="submit" name="submit" value="Проверить сертификат" /></div>
                    </form>
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