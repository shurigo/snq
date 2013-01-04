<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Дисконтная система 'Зенит'");
?> 
<div> 
  <table style="width: 100%;"> 
    <tbody> 
      <tr> <td valign="top" style="width: auto; padding: 10px 29px 0pt 16px;"> 			 
          <h1>Cкидка 10% на товары из Новой коллекции</h1>
         
          <table> 	 
            <tbody> 
              <tr>
              	<td valign="top">
              		<div><a href="http://www.zenitds.ru/members/id528/" target="_blank"><img height="155" align="left" width="245" src="/images/zenit2.jpg" alt="Дисконтная система 'Зенит'" title="Дисконтная система 'Зенит'" style="margin: 0pt 10px 10px 0pt;" /></a></div>
                    <div style="margin:20px 0 0 0;"><a href="http://www.zenitds.ru/members/id528/" target="_blank"><img height="155" align="left" width="245" src="/images/zenit1.jpg" alt="Дисконтная система 'Зенит'" title="Дисконтная система 'Зенит'" style="margin: 0pt 10px 10px 0pt;" /></a></div>
                    </td> <td valign="top"> 
<strong>Уважаемые покупатели!</strong>
<p>Теперь в магазинах «Снежная Королева» в Санкт-Петербурге Вы можете получить скидку 10% на товары из Новой коллекции при предъявлении карты дисконтной системы «Зенит»!

<p>«Дисконтная система «Зенит» — общегородская программа по предоставлению скидок на товары и услуги, которая стартовала в 2006 году, в рамках развития Футбольного Клуба «Зенит». С помощью дисконтных карт «Зенит» Вы сможете получать скидки до 30%  на различные товары и услуги в 200 компаниях Санкт-Петербурга!<br />

<p><strong>Условия и ограничения:</strong><br />
<ul>
    <li>величина скидки рассчитывается от первоначальной розничной цены, указанной на ценнике товара 
    <li>скидка по карте «Зенит» не суммируется с другими скидками, действующими в магазинах на момент покупки 
    <li>скидка по карте «Зенит» не предоставляется на товары, участвующие в специальных ценовых предложениях и акциях
    <li>скидка по карте «Зенит» не суммируется со скидками по дисконтным картам «Снежная Королева» и других дисконтных систем.
    <li>при наличии у покупателя - держателя дисконтной карты Дисконтной системы «Зенит», права на скидку по нескольким основаниям, покупатель может воспользоваться только одним из них
    <li>скидка по карте «Зенит» не предоставляется на покупки в кредит, если кредитный продукт предполагает скидку за счет  магазина
</ul>
<p><a href="http://www.zenitds.ru/members/id528/" target="_blank">Подробно</a></p>
                 </td> </tr>
             </tbody>
           </table>
         			 		</td> <td valign="top" style="width: 237px; padding: 30px 0pt 0pt;"><?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"right_block_news",
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
         </td> </tr>
     </tbody>
   </table>
<a href="/collection/wfurs/">Шубы и меха</a> | <a href="/collection/wmink/">Шубы из норки</a> | <a href="/collection/wskincoat/">Дубленки</a> 

 </div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>