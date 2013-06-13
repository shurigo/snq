<?
  $headers = Array();
  $headers[]=Array('title'=>'Вакансии в офисе',                'href'=>'office.php');
  $headers[]=Array('title'=>'Вакансии в магазинах',            'href'=>'shops.php');
  $headers[]=Array('title'=>'Вакансии логистического центра',  'href'=>'logistics.php');
?>

<table width="100%" bgcolor="#11acdc" border=1 bordercolor="white" height="50px">
  <tr>
<?foreach($headers as $header):?>
    <td width="33%" align="center">
    <?=($title == $header['title'] ? '<h1 style="color:white">' : '<a href="'.$header['href'].'" style="color:white">')?>
      <?=$header['title']?>
    <?=($title == $header['title'] ? '</h1>' : '</a>')?>
    </td>
<?endforeach;?>
  </tr>
</table>

<!--
<br>
<hr>
-->