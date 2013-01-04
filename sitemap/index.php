<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карта сайта");
?> 
<div style="margin:45px;"> 
  <table style="width: 100%;"> 
    <tbody> 
      <tr> <td valign="top" style="width: auto; -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;"> 
          <h1>Карта сайта</h1>
<b>Шубы Меха</b>
<ul>
<li><a href="/collection/wmink/">Шубы норковые</a></li>
<li><a href="/collection/wfox/">Шубы из лисы</a></li>
<li><a href="/collection/wrabbit/">Шубы из кролика</a></li>
<li><a href="/collection/wfurvest/">Меховые жилеты</a></li>
<li><a href="/collection/wfurother/">Другие меха</a></li>
</ul>
<b>Женская одежда</b>
<ul>
<li><a href="/collection/wskincoat/" title="дубленки женские">Дубленки</a></li>
<li><a href="/collection/wleathertopjacket/" title="кожаные куртки женские">Кожаные куртки</a></li>
<li><a href="/collection/wleathertopcoat/" title="пальто из кожи женское">Пальто из кожи</a></li>
<li><a href="/collection/wtopjacket/" title="куртки женские">Куртки</a></li>
<!--<li><a href="/collection/wwindbreaker/" title="ветровки женские">Ветровки</a></li>-->
<li><a href="/collection/wtopcoat/" title="пальто женское">Пальто</a></li>
<li><a href="/collection/wtopcloak/" title="плащи женские">Плащи</a></li>
<li><a href="/collection/wpaddedcoat/" title="пуховики женские">Пуховики</a></li>                     
</ul>
<b>Мужская одежда</b>
<ul>
<li><a href="/collection/mskincoat/" title="дубленки мужские">Дубленки</a></li>
<li><a href="/collection/mleathertopjacket/" title="мужские кожаные куртки">Кожаные куртки</a></li>
<li><a href="/collection/mtopjacket/" title="мужские куртки">Куртки</a></li>
<!--<li><a href="/collection/mwindbreaker/" title="мужские ветровки">Ветровки</a></li>-->
<li><a href="/collection/mtopcloak/" title="плащи мужские">Плащи</a></li>
<li><a href="/collection/mpaddedcoat/" title="пуховики мужские">Пуховики</a></li>
<li><a href="/collection/mtopcoat/" title="пальто мужское">Пальто</a></li>          
</ul>
         </td> <td valign="top" style="width: 237px; padding: 30px 0pt 0pt; -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-image: none;"><?$APPLICATION->IncludeComponent(
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
);?> </td> </tr>
     </tbody>
   </table>
 </div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>