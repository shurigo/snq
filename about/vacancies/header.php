<?
  $headers = Array();
  $headers[]=Array('title'=>'�������� � �����',                'href'=>'office.php');
  $headers[]=Array('title'=>'�������� � ���������',            'href'=>'shops.php');
  $headers[]=Array('title'=>'�������� �������������� ������',  'href'=>'logistics.php');
?>
  
<table width="100%">
  <tr>
<?foreach($headers as $header):?>
    <td width="33%" align="center">
    <?=($title == $header['title'] ? '<h1>' : '<a href="'.$header['href'].'">')?>
      <?=$header['title']?>
    <?=($title == $header['title'] ? '</h1>' : '</a>')?>
    </td>
<?endforeach;?>
  </tr>
</table>


<br>
<hr>