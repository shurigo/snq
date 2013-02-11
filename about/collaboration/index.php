<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сотрудничество");
?>
<section class="mainContent">
<h1>Сотрудничество</h1>

          <h2>Контактная информация:</h2>

          <p>Телефон: (495) 777-8-999 </p>

          <p>E-mail: <a href="mailto:info@snq.ru">info@snq.ru</a>  </p>

          <h2>Оптовый отдел</h2>

          <strong>Мы рады пригласить Вас к сотрудничеству! </strong>

          <p>Приобретая товар оптом, Вы можете рассчитывать на получение оптовой скидки от рекомендованной розничной цены. </p>

          <p>Оптовая скидка предоставляется единовременно и зависит от объема Вашего заказа. </p>

          <p>Мы предлагаем Вам широчайший ассортимент мужской и женской одежды ведущих европейских брендов и новых качественных торговых марок. </p>

          <p>Все сезоны, любые направления и частое обновление модельного ряда. Покупая товар по оптовым ценам, Вы получаете возможность увеличивать свою прибыль! </p>

          <p><strong>Оптовый отдел: </strong></p>

          <p><strong>Тел:</strong>  +7 925-830-29-79</p>

          <p><strong>E-mail:</strong> <a href="mailto:opt@snq.ru">opt@snq.ru</a></p>

</section>

<aside class="aside">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"left_menu",
	Array(
		"ROOT_MENU_TYPE" => "left",
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => ""
	)
);?>
</aside>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>