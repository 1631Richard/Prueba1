<?php
session_start();

// Simular el carrito (puedes comentar esto si usas datos reales)
$_SESSION['carrito'] = [
    // Ejemplo de estructura de productos
     //['usuario' => 'Luis', 'nombre' => 'Producto 1', 'precio' => 100, 'imagen' => 'Img/java.png', 'descuento' => 10],
        ['usuario' => 'Luis', 'nombre' => 'C#', 'precio' => 90, 'imagen' => 'Img/CSharp.png', 'descuento' => 10],
        ['usuario' => 'Carlos', 'nombre' => 'JavaScript', 'precio' => 95, 'imagen' => 'Img/JS.png', 'descuento' => 15],
        ['usuario' => 'Ana', 'nombre' => 'C++', 'precio' => 100, 'imagen' => 'Img/C++.png', 'descuento' => 5],
        ['usuario' => 'María', 'nombre' => 'Kotlin ', 'precio' => 80, 'imagen' => 'Img/Kotlin.png', 'descuento' => 10],
        ['usuario' => 'David', 'nombre' => 'Python', 'precio' => 85, 'imagen' => 'Img/Python.png', 'descuento' => 10],
        ['usuario' => 'Laura', 'nombre' => 'C# ', 'precio' => 70, 'imagen' => 'Img/CSharp.png', 'descuento' => 5],
        ['usuario' => 'Pedro', 'nombre' => 'JavaScript ', 'precio' => 55, 'imagen' => 'Img/JS.png', 'descuento' => 0],
        ['usuario' => 'Isabel', 'nombre' => 'C++', 'precio' => 60, 'imagen' => 'Img/C++.png', 'descuento' => 0],
        ['usuario' => 'Juan', 'nombre' => 'Kotlin ', 'precio' => 75, 'imagen' => 'Img/Kotlin.png', 'descuento' => 10]
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
