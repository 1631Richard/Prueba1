    <?php
// Incluir la conexión a la base de datos
include 'Conexion.php';  // Ajusta la ruta según tu estructura

// Comprobar si se han enviado los datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recoger los datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    // Preparar la consulta para verificar el correo y la contraseña
    $sql = "SELECT * FROM vendedor WHERE Correo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('s', $correo);  // 's' indica que es un string

    // Ejecutar la consulta
    $stmt->execute();
    $result = $stmt->get_result();

    // Comprobar si el correo existe
    if ($result->num_rows > 0) {

        // El correo existe, obtener los datos del vendedor
        $row = $result->fetch_assoc();
        // Verificar la contraseña (usando password_verify si la contraseña está hasheada)
        if ($contrasena === $row['Contrasena']) {
            // Contraseña correcta, redirigir al vendedor a la página deseada
            echo "<script>
                    alert('Login exitoso!');
                    window.location.href = 'insertaProducto.php';  // Redirige a la página deseada
                  </script>";
        } else {
            // Contraseña incorrecta
            echo "<script>
                    alert('Contraseña incorrecta');
                    window.location.href = 'loginVendedor.php';  // Redirige al formulario de login
                  </script>";
        }
    } else {
        // Correo no encontrado
        echo "<script>
                alert('Correo no encontrado');
                window.location.href = 'loginVendedor.php';  // Redirige al formulario de login
              </script>";
    }

    // Cerrar la conexión
    $stmt->close();
    $conexion->close();
}
?>