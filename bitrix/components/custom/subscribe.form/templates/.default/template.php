<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<form class="subscr" action="/subscription.php">
<fieldset>
            <span>Подпишитесь на новости и акции</span>
            <input type="text" name="sf_EMAIL" size="20" style="border:1px solid #11acdc;" value="введите e-mail" title="<?=GetMessage("subscr_form_email_title")?>" onclick="this.value='';" onfocus="this.select()" />
            <input type="hidden" name="sf_RUB_ID[]" value=1>
            <input type="submit" style="background:#11acdc;border:1px solid #11acdc;" name="OK" value="<?=GetMessage("subscr_form_button")?>" />
</fieldset>
</form>
<!-- end .subscr-->
