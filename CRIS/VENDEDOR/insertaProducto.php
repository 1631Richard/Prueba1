<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="form-register">
  
  <form action="loginLogica.php" method="POST" class="form-register">
      <h4>Formulario Registro</h4>
      <input class="controls" type="text" name="titulo" id="titulo" placeholder="Titulo de producto">

      <input class="controls" type="text" name="descripcion" id="descripcion" placeholder="Ingrese descripcion del producto">

      <input class="controls" type="number" name="precio" id="precio" placeholder="Precio del producto">

      <input class="botons" type="submit" value="Publicar">

  </form>
</section>
</body>
</html>