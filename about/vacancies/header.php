<?
  $headers = Array();
  $headers[]=Array('title'=>'�������� � �����',                'href'=>'office.php');
  $headers[]=Array('title'=>'�������� � ���������',            'href'=>'shops.php');
  $headers[]=Array('title'=>'�������� �������������� ������',  'href'=>'logistics.php');
?>

<table width="100%" bgcolor="#11acdc" border=1 bordercolor="white" height="50px">
  <tr>
<?foreach($headers as $header):?>
    <td width="33%" align="center">
    <?=($title == $header['title'] ? '<h1 style="color:white">' : '<a href="'.$header['href'].'" style="font-size:18px;color:#c8dfff;text-decoration:none;">')?>
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