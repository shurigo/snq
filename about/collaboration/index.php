<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сотрудничество");
?> 
<div style="margin:10px 45px 45px;">
<h1>Сотрудничество</h1>
<table style="width:100%;">
	<tr>
    	<td style="width:206px; vertical-align:top;"><?$APPLICATION->IncludeComponent(
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
        );?></td>
        <td style="width:auto; vertical-align:top; padding:0 0 0 23px;">		 
         
         
          <h3>Контактная информация:</h3>
         
          <p>Телефон: (495) 777-8-999 </p>
         
          <p>E-mail: <a href="mailto:info@snq.ru">info@snq.ru</a>  </p>
         
          <h2>Оптовый отдел</h2>
         
          <h3>Мы рады пригласить Вас к сотрудничеству! </h3>
         
          <p>Приобретая товар оптом, Вы можете рассчитывать на получение оптовой скидки от рекомендованной розничной цены. </p>
         
          <p>Оптовая скидка предоставляется единовременно и зависит от объема Вашего заказа. </p>
         
          <p>Мы предлагаем Вам широчайший ассортимент мужской и женской одежды ведущих европейских брендов и новых качественных торговых марок. </p>
         
          <p>Все сезоны, любые направления и частое обновление модельного ряда. Покупая товар по оптовым ценам, Вы получаете возможность увеличивать свою прибыль! </p>
         
          <h3>Оптовый отдел: </h3>
         
          <p><strong>тел:</strong>  +7 925-830-29-79</p>
         
          <p><strong>E-mail:</strong> <a href="mailto:opt@snq.ru">opt@snq.ru</a></p>
         
          <p> </p>
         
          <br />
         
          <a href="/collection/wfurs/">Шубы</a> | <a href="/collection/wmink/">Шубы из норки</a> | <a href="/collection/wskincoat/">Дубленки</a> </div>
         </td>
    </tr>
</table>
 </div>

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>