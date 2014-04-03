<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Услуги");
?>
<h1>Услуги</h1>

        <table width="100%" height="450px" border="1" bordercolor="white" bgcolor="#11acdc">
            <tr align="center">
                <td width="50%"><a href="/services/credit/" style="font-size:22px;color:white;text-decoration: none;">Потребительское кредитование</a></td>
                <td width="50%"><a href="/services/discount/" style="font-size:22px;color:white;text-decoration: none;">Королевский Клуб</a></td>

            </tr>
            <tr align="center">
                <td width="50%"><a href="/services/cards/" style="font-size:22px;color:white;text-decoration: none;">Подарочные карты</a></td>
                <td width="50%"><a href="/services/megacard/" style="font-size:22px;color:white;text-decoration: none;">Мы принимаем к оплате MEGACARD</a></td>
            </tr>
        </table>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
