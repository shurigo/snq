<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сильное впечатление");
?>
<link href="styles.css" type="text/css" rel="stylesheet" />
<div id="body_div">
    <div class="main_div page4">
    	<div class="position_relative">
        	<div class="position_absolute snowqueen_logo">
            	<a href="/"><img src="/images/elle_project/snowqueen_logo.png" width="223" height="69" alе="Снежная Королева" /></a>
            </div>
        </div>
        <div class="position_relative">
        	<div class="position_absolute main_menu">
            	<div id="menu1"><a href="index.php">Очарование ретро</a></div>
                <div id="menu2"><a href="page2.php">Роковой соблазн</a></div>
                <div id="menu3"><a href="page3.php">Леди парижских сонетов</a></div>
                <div id="menu4">Бегущая по волнам</div>
                <div id="menu5"><a href="page5.php">Поющая под дождем</a></div>
            </div>
        </div>
        <div class="position_relative">
        	<div class="position_absolute previuos_page" onclick="javascript:location.href='page3.php'">
            </div>
        </div>
        <div class="position_relative">
        	<div class="position_absolute next_page" onclick="javascript:location.href='page5.php'">
            </div>
        </div>
        <div class="clear_both"></div>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>