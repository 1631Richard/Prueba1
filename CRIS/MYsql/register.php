<?php
include 'Conexion.php';

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashear la contraseña

// Verificar si el correo o usuario ya existen
$query_check = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
$result_check = mysqli_query($conexion, $query_check);

if (mysqli_num_rows($result_check) > 0) {
    echo '
        <script>
            alert("El correo o nombre de usuario ya están registrados.");
            window.location = "../index.php";
        </script>
    ';
    exit();
}

// Insertar el usuario
$query = "INSERT INTO users(full_name, email, username, password) VALUES ('$full_name', '$email', '$username', '$password')";
$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
        <script>
            alert("Registro exitoso.");
            window.location = "../index.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Error al registrar. Intenta nuevamente.");
            window.location = "../index.php";
        </script>
    ';
}

mysqli_close($conexion);
?>
