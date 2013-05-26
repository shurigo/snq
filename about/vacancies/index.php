<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вакансии");
?>
<section class="mainContent">
<h1>Вакансии</h1>
          <p>&laquo;Снежная Королева&raquo; &mdash; крупнейшая и динамично развивающаяся российская сеть мультибрендовых магазинов модной одежды. Сегодня в обеих столицах и крупных региональных городах открыто более 100 магазинов компании.</p>

          <p>&laquo;Снежная Королева&raquo; &ndash; динамично развивающаяся компания, предоставляющая своим сотрудникам неограниченные возможности для развития.
            <br />
           &laquo;Снежная Королева&raquo; - это команда профессионалов с прогрессивной системой управления.
            <br />
           &laquo;Снежная Королева&raquo; &ndash; лидер среди мультибрендовых магазинов модной одежды, мехов (<a href="/collection/wfurs/">шубы и меха</a>, <a href="/collection/wmink/">шубы из норки</a>, полушубки, <a href="/collection/wfurvest/">меховые жилеты</a>) и аксессуаров.
            <br />

            <br />
           В настоящий момент в компании работает более 3000 человек. Если Вы талантливы и амбициозны, стремитесь выстроить свою карьеру в стабильной компании, мечтаете работать в индустрии моды и красоты, компания &laquo;Снежная Королева&raquo; предоставляет Вам такую возможность.
            <br />

            <br />
           Мы приглашаем желающих работать в команде компании &laquo;Снежная Королева&raquo; на ряд вакансий и предлагаем:
            <br />
           </p>

          <ul>
            <li>достойную оплату труда, </li>

            <li>систему премирования по результатам работы, </li>

            <li>соблюдение Трудового Кодекса РФ (в т.ч. оплачиваемый отпуск, больничный), </li>

            <li>возможность профессионального и карьерного роста, </li>

            <li>интересную работу в дружном коллективе, </li>

            <li>значительные скидки для сотрудников на модную одежду </li>
           </ul>

          <p>Стань лидером вместе с нами!</p>

          <p>Дополнительную информацию о нас Вы можете получить по телефону <strong>(495) 777-8-999</strong>. </p>

          <table width="100%">
          <tr><td width="33%"><a href="office.php">Вакансии в офисе</a></td><td width="33%"><a href="shops.php">Вакансии в магазинах</a></td><td width="34%">Вакансии Логистического центра</td></tr>
          </table>
<!--
          <div style="margin: 20px 0pt 0pt;"><?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"vacancies",
	Array(
		"IBLOCK_TYPE" => "vacancies",
		"IBLOCK_ID" => "6",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"COUNT_ELEMENTS" => "N",
		"TOP_DEPTH" => "2",
		"DISPLAY_PANEL" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y"
	)
);?> </div>
-->

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