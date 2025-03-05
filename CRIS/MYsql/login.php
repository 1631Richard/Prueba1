<?php
include 'Conexion.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Buscar al usuario por email usando consultas preparadas
$stmt = $conexion->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();

    // Verificar la contraseña
    if (password_verify($password, $usuario['password'])) {
        session_start();
        $_SESSION['username'] = $usuario['username'];
        $_SESSION['full_name'] = $usuario['full_name'];
        
        echo '
            <script>
                alert("Inicio de sesión exitoso.");
                window.location = "/MENU/index.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Contraseña incorrecta.");
                window.location = "../login.php";
            </script>
        ';
    }
} else {
    echo '
        <script>
            alert("El correo no está registrado.");
            window.location = "../login.php";
        </script>
    ';
}

$stmt->close();
mysqli_close($conexion);
?>
