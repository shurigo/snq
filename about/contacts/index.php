<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?> 
<div style="margin: 10px 45px 45px;"> 
  <h1>Контакты</h1>
 
  <table style="width: 100%;"> 	 
    <tbody> 
      <tr> 	<td style="width: 206px; vertical-align: top;"><?$APPLICATION->IncludeComponent(
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
          <div style="margin: 20px 0px 0px;"> 
            <table> 
              <tbody> 
                <tr> <td><img src="/images/download_catalog/left_red.png" width="7" height="23" /></td> <td style="height: 23px; background-image: url(http://snowqueen.ru/images/download_catalog/bg_red.png); font-size: 10px; background-repeat: repeat no-repeat;"><a href="/unsubscribe/" style="color: rgb(255, 255, 255);" ><strong>Отказ от SMS рассылки</strong></a></td> <td><img src="/images/download_catalog/right_red.png" width="7" height="23" /></td> <td style="padding: 0px 0px 0px 3px;"><a href="/unsubscribe/" ><img src="/images/arrows/red_right.png" width="25" height="23" /></a></td> </tr>
               </tbody>
             </table>
           </div>
         </td> <td style="width: auto; vertical-align: top; padding: 0px 0px 0px 23px;">		 
          <p>ООО «СК Трейд»</p>
         
          <p>ОГРН: 1057747108154</p>
         
          <p>Юридический адрес: 141408, Московская обл., г.Химки, Ленинградское шоссе, владение 5</p>
         
          <p>Тел.: +7 (495) 777-8-999 </p>
         
          <p>E-mail: <a href="mailto:info@snq.ru" >info@snq.ru</a></p>
         
          <p> 
            <br />
           </p>
         
          <p> 
            <br />
           </p>
         
          <p><noindex><a href="http://snowqueen.ru/about/news/?ELEMENT_ID=550040" rel="nofollow"><font color="#ee1d24">Телефон доверия для покупателей</font></a></noindex><font color="#ee1d24">: 8 (800) 775 0880 (звонки по России бесплатно)</font></p>
         </td> </tr>
     </tbody>
   </table>
 </div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>