<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<form class="subscr" action="subscription.php">
<fieldset>
            <span>Подписаться на последние новости и акции</span>
            <input type="text" name="sf_EMAIL" size="20" value="<?=$arResult["EMAIL"]?>" title="<?=GetMessage("subscr_form_email_title")?>" />
            <input type="hidden" name="sf_RUB_ID[]" value=1>
            <input type="submit" name="OK" value="<?=GetMessage("subscr_form_button")?>" />
</fieldset>
</form>
<!-- end .subscr-->
