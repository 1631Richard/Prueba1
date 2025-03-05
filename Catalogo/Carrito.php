<?php
session_start();

// Inicia el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Agregar producto al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto = [
        'usuario' => $_POST['usuario'],
        'nombre' => $_POST['nombre'],
        'precio' => $_POST['precio'],
        'imagen' => $_POST['imagen']
    ];
    $_SESSION['carrito'][] = $producto;
}

// Redirigir a la página del carrito
header("Location: carrito.php");
exit();
?>
