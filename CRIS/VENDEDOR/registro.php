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
  <!-- Mostrar alerta si el registro fue exitoso -->
  <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
        <script>
            alert("¡Vendedor registrado exitosamente!");
        </script>
    <?php endif; ?>
  <form action="registrarLogica.php" method="POST" class="form-register">
      <h4>Formulario Registro</h4>
      <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre">
      
      <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido">

      <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese un Correo">

      <input class="controls" type="password" name="contrasena" id="contrasena" placeholder="Ingrese su Contraseña">

      <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>

      <input class="botons" type="submit" value="Registrar">
  
      <p><a href="loginVendedor.php">¿Ya tengo Cuenta?</a></p>
  </form>
</section>
</body>
</html>