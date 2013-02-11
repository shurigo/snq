<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Дисконтная программа");
?>
<section class="mainContent">
<h1>Дисконтная программа</h1>
         <p>В сети магазинов &quot;Снежная Королева&quot; действует накопительная дисконтная система. Чем больше общая сумма Ваших покупок, тем выше процент скидки по дисконтной карте.</p>

          <p>Дисконтная карта выдается при желании посетителя совершить покупку на любую сумму в любом магазине &quot;Снежная Королева&quot;. Данная карта дает право на получение скидок при покупке в любом магазине сети «Снежная Королева» на территории России. Основанием для получения дисконтной карты является заполненная покупателем анкета клиента.</p>

          <p>Все суммы покупок, начиная с первой, заносятся на счет дисконтной карты покупателя. В зависимости от накопленных сумм покупателю предоставляются скидки разного уровня:</p>

          <table cellspacing="0" cellpadding="0" border="1" width="100%">
            <tbody>
              <tr> <td width="40%" style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  <b>накопленная сумма покупок</b>
                 </td> <td width="60%" style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  <b>размер скидки, предоставляемой покупателю</b>
                 </td> </tr>

              <tr> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  свыше 5 000 рублей
                 </td> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  <strong>3%</strong>
                 </td> </tr>

              <tr> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  свыше 50 000 рублей
                 </td> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  <strong>5%</strong>
                 </td> </tr>

              <tr> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  свыше 120 000 рублей
                 </td> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  <strong>7%</strong>                </td> </tr>

              <tr> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  свыше 230 000 рублей
                 </td> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  <strong>10%</strong>
                 </td> </tr>

              <tr> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  свыше 1 000 000 рублей
                 </td> <td style="-moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;">
                  <strong>15%</strong>
                 </td> </tr>
             </tbody>
           </table>

          <p>* Скидки по дисконтной карте не суммируются с другими скидками и не предоставляются на товары, продающиеся по специальным ценам.</p>

          <p>Компания &quot;Снежная Королева&quot; оставляет за собой право изменить срок действия дисконтной карты и правила пользования в любой момент без согласования с пользователем карт.</p>

</section>

<aside class="aside">
<?
$APPLICATION->IncludeComponent(
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
);
?>
</aside>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>