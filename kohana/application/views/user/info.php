<?
  require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
  $APPLICATION->SetTitle('Личный Кабинет');
	require($_SERVER['DOCUMENT_ROOT'].'/ipgeo/geohelper.php');

	$city_id = get_city_by_name($_SESSION['city_name']);
	$shops = get_shops_by_city($city_id);
	include($_SERVER['DOCUMENT_ROOT'].'/kohana/application/views/user/js.inc');
?>
<section class="mainContent2">
<div>Добро пожаловать, <?=iconv('utf-8', 'cp1251', "$user->first_name $user->last_name"); ?>!</div><br />
<table><tr><td>
<? if ($message) : ?>
	<div class="message red" style="font-size:17px">
		<?= $message; ?>
	</div>
<? endif; ?>
<form action="/user/index" method="post" accept-charset="utf-8">
<table border=0 cellpadding="5px">
<tr bgcolor='#e6e9ee'><td colspan=3>
<b>Личные данные</b>
</td></tr>
<tr style="vertical-align:top;">
<td align="left"><?= Form::label('first_name', 'Имя'); ?></td>
<td><?= Form::input('first_name', iconv('utf-8', 'cp1251', $user->first_name),array("size" =>"30px")); ?>
	<div class="error red">
		<?= Arr::get($errors, 'first_name'); ?>
	</div>
</td>
</tr>
<tr style="vertical-align:top;">
<td align="left"><?= Form::label('last_name', 'Фамилия'); ?></td>
<td><?= Form::input('last_name', iconv('utf-8', 'cp1251', $user->last_name),array("size" =>"30px")); ?>
	<div class="error red">
		<?= Arr::get($errors, 'last_name'); ?>
	</div>
</td></tr>
<tr style="vertical-align:top;">
<td align="left"><?= Form::label('patronymic', 'Отчество'); ?></td>
<td>
	<?= Form::input('patronymic', iconv('utf-8', 'cp1251', $user->patronymic),array("size" =>"30px")); ?>
	<div class="error red">
		<?= Arr::get($errors, 'patronymic'); ?>
	</div>
</td></tr>
<tr style="vertical-align:top;">
<td align="left"><?= Form::label('birthday', 'Дата рождения'); ?></td>
<td><?= Form::input('birthday', $user->birthday, array('id'=>'birthday', 'type'=>'text', 'readonly',"size" =>"30px")); ?>
	<div class="error red">
		<?= Arr::get($errors, 'birthday'); ?>
	</div>
</td></tr>
<tr style="vertical-align:top;">
<td align="left"><?= Form::label('phone', 'Телефон'); ?></td>
<td><?= Form::input('phone', $user->phone, array('maxlength' => '10',"size" =>"30px",'id'=>'phone')); ?>
	<div class="error red">
		<?= Arr::get($errors, 'phone'); ?>
	</div>
</td></tr>
<tr style="vertical-align:top;">
<td align="left"><?= Form::label('email', 'E-mail'); ?></td>
<td><?= Form::input('email', $user->email, array('readonly',"size" =>"30px")); ?>
</td></tr>
<tr style="vertical-align:top;">
<td align="left" colspan=2>
	<?= Form::label('subscribe', 'Подписка на рассылки:'); ?>
	<?= Form::label('subscribe_sms', 'SMS'); ?>
	<?= Form::checkbox('subscribe_sms', 1, $user->subscribe_sms > 0); ?>
	<?= Form::label('subscribe_sms', 'E-mail'); ?>
	<?= Form::checkbox('subscribe_email', 1, $user->subscribe_email > 0); ?>
</td></tr>
<!--
<p>
	<?= Form::label('deliver_card_to', 'Выберете предпочтительный способ получения Карты Кролевского Клуба:'); ?>
</p>
<p>
<?
	// 0 - deliver to shop
	// 1 - deliver to address
?>
  <?= Form::radio('deliver_to', 0, $user->deliver_to == 0); ?>
  <?= Form::label('dto0', 'В магазине'); ?>
  <?= Form::radio('deliver_to', 1, $user->deliver_to == 1); ?>
  <?= Form::label('dto1', 'Доставить по адресу'); ?>
</p>
<p>
	<?= Form::select('deliver_to_shop', $shops, iconv('utf-8', 'cp1251', HTML::chars($user->deliver_to_shop)), array('class' => 'delivery', 'id' => 'dto_0')); ?>
	<?= Form::input('deliver_to_address', iconv('utf-8', 'cp1251', HTML::chars($user->deliver_to_address)), array('class' => 'delivery', 'id' => 'dto_1')); ?>
</p>
-->

<tr style="vertical-align:top;">
<td align="left"><?= Form::label('password', 'Пароль'); ?></td>
<td><?= Form::password('password',null,array("size" =>"30px")); ?>
	<div class="error red">
		<?= Arr::get($errors, '_external.password'); ?>
	</div>
</td></tr>
<tr style="vertical-align:top;">
<td align="left"><?= Form::label('password_confirm', 'Подтвердите пароль'); ?></td>
<td><?= Form::password('password_confirm',null,array("size" =>"30px")); ?>
	<div class="error red">
		<?= Arr::path($errors, '_external.password_confirm'); ?>
	</div>
</td></tr>
<tr style="vertical-align:top;">
<td align="left" colspan=2>
<input type="submit" name="index" value="Сохранить" />
	<?= Form::close(); ?>
</td></tr></table>
</td>
<td  style="vertical-align:top;">
<table border=0 cellpadding="5px"  width="400px">
<tr bgcolor='#e6e9ee'><td colspan=3>
<b>Последние новости</b>
</td></tr>
<tr><td>
<?
		$newsFilter = Array(
    	"IBLOCK_ID" => "3",
    	"IBLOCK_ACTIVE" => "Y",
    	"ACTIVE_DATE" => "Y",
    	"ACTIVE" => "Y",
    	"CHECK_PERMISSIONS" => "Y",
    	"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
    	Array('LOGIC' => 'OR',
      	'PROPERTY_col_availability' => '1',
      	'PROPERTY_col_city_id' => strval($_SESSION['city_id'])
    	)
  	);
 ?>
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
		"FILTER_NAME" => "newsFilter",
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
		"ADD_SECTIONS_CHAIN" => "N",
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
</td></tr></table>
</td>
</tr></table>
</section>
<!--
<aside class="aside2">
<h4>Последние новости</h4>
 <?
		$newsFilter = Array(
    	"IBLOCK_ID" => "3",
    	"IBLOCK_ACTIVE" => "Y",
    	"ACTIVE_DATE" => "Y",
    	"ACTIVE" => "Y",
    	"CHECK_PERMISSIONS" => "Y",
    	"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
    	Array('LOGIC' => 'OR',
      	'PROPERTY_col_availability' => '1',
      	'PROPERTY_col_city_id' => strval($_SESSION['city_id'])
    	)
  	);
 ?>
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
		"FILTER_NAME" => "newsFilter",
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
		"ADD_SECTIONS_CHAIN" => "N",
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
);?></aside>
-->
