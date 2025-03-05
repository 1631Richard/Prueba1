<?php
session_start();

$_SESSION['carrito'] = [
    // Ejemplo de estructura de productos
    ['usuario' => 'Luis', 'nombre' => 'Producto 1', 'precio' => 100, 'imagen' => 'Img/java.png', 'descuento' => 10],
];

// Obtener el carrito desde la sesión
$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : []; 

// Calcular los totales
$cantidad_total = 0;
$total = 0;
$descuento_total = 0;

foreach ($carrito as $producto) {
    $cantidad_total++;
    $total += $producto['precio'];
    $descuento_total += isset($producto['descuento']) ? $producto['descuento'] : 0;
}

// Verificar si el carrito está vacío
$carrito_vacio = empty($carrito);

// Redirigir a otro archivo PHP, como `CarritoCompras.php`
header("Location: CarritoCompras.php");
exit;
?>
