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
      <input class="controls" type="text" name="correo" id="correo" placeholder="Ingrese su Correo">

      <input class="controls" type="password" name="contrasena" id="contrasena" placeholder="Ingrese su Contraseña">

      <input class="botons" type="submit" value="Ingresar">
  
      <p><a href="registro.php">Aún no tengo cuenta</a></p>
  </form>
</section>
</body>
</html>