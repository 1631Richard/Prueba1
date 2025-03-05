<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<h2> variables en php </h2>
<?php
$des="mouse inalambrico";
$pre=56.5353;
$can=3; $tot=$pre*$can;
echo"descripcion $des";
echo"<br> precio".number_format($pre,2);
?>
<br> Cantidad <?=$can?>
<br>Total pago <?=$tot?>   

</body>
</html>