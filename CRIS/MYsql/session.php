<?php
// session.php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['username']) || !isset($_SESSION['full_name'])) {
    echo '
        <script>
            alert("Por favor, inicia sesión.");
            window.location = "../login.php";
        </script>
    ';
    exit();
}

// Recupera el nombre completo y el nombre de usuario desde la sesión
$full_name = $_SESSION['full_name'];
$username = $_SESSION['username'];
?>
