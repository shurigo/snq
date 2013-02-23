<?
$active_coupones_file="active_coupones.txt";
$activated_coupones_file="activated_coupones.csv";

//put data into result file
$handle = @fopen($activated_coupones_file, "a");
$str=$_GET["coupon"].";".date('d.m.Y').";".$_GET["place"].";none;;\n";
if ($handle) {
			                       fwrite($handle, $str);
			                       fclose($handle);
             }
//remove coupone (deactivate)
$arr = file($active_coupones_file);
unset($arr[0]);
$arr = array_values($arr);
file_put_contents($active_coupones_file,implode($arr));
?>
<html>
<head>
  <title>РАСПЕЧАТАТЬ КУПОН</title>
  <link href="/css/style.css" rel="stylesheet" type="text/css">
  <style>
   .layer1 {
    position: absolute; /* Относительное позиционирование */
    background: #f0f0f0; /* Цвет фона */
    left:0px;
    top:0px;
   }
   .layer2 {
    position: absolute; /* Абсолютное позиционирование */
    left: 360px; /* Положение от нижнего края */
    top:  1005px; /* Положение от правого края */
    line-height: 1px;
    font-size:58px;
    color:white;
   }
  </style>
</head>

<body bottommargin=0 leftmargin=0 rightmargin=0 topmargin=0 onload="javascript:window.print()">
<div class="layer1">
   <img src="images/coupon.jpg" border="0">
   <div class="layer2"><? echo $_GET["coupon"]; ?></div>
</div>
</body>

</html>