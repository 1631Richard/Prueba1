<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="estilos.css">

</head>
<body>
    <center>
  <h2 >Lista de Notas</h2>
  <table class="mGrid">
    <tr><th>Nro<th>Exp<th>ExF<th>Promerido<th>Imagen
<?php
$cap=0; $cds=0;
for($n=1; $n<=25;$n++){
    $ep=rand(0,20);
    $ef=rand(0,20);
    $pro=($ep+$ef)/2;
     if($pro>=11.5){
        $pic="feliz.jpg"; $cap++;
     }else{
        $pic="triste.jpg"; $cds++;
     }
    echo "<tr><td>$n<td>$ep<td>$ef<td>$pro"; 
    ?>
    <td><img src="imagen/<?=$pic?>" height=80 width=80>   
<?php
}
?>
<tr><td colspan="3">#de aprobados<td><?=$cap?>
<tr><td colspan="3">#de aprobados<td><?=$cds?>
   
   </table>
   </center>     
</body>
</html>