<?php
session_start(); // Asegurarse de que la sesión esté iniciada

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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="EstiloCarritoCompras.css"> 
</head>
<body>
    <h1 style="text-align: center;">Carrito de Compras</h1>

    <div class="container">
        <!-- Columna de productos (izquierda) -->
        <div class="productos">
            <?php if (empty($carrito)): ?>
                <p>El carrito está vacío.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Nombre del Producto</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Descuento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carrito as $producto): ?>
                            <tr>
                                <td><?= htmlspecialchars($producto['usuario']) ?></td>
                                <td><?= htmlspecialchars($producto['nombre']) ?></td>
                                <td>S/ <?= htmlspecialchars($producto['precio']) ?></td>
                                <td><img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['nombre']) ?>"></td>
                                <td>S/ <?= isset($producto['descuento']) ? htmlspecialchars($producto['descuento']) : '0.00' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

        <!-- Columna de resumen (derecha) -->
        <div class="resumen">
            <h3>Resumen</h3>
            <table>
                <tr>
                    <th>Cantidad de Productos</th>
                    <td><?= $cantidad_total ?></td>
                </tr>
                <tr>
                    <th>Total a Pagar</th>
                    <td>S/ <?= number_format($total, 2) ?></td>
                </tr>
                <tr>
                    <th>Descuento Total</th>
                    <td>S/ <?= number_format($descuento_total, 2) ?></td>
                </tr>
            </table>
            <!-- Deshabilitar botón si el carrito está vacío -->
            <a href="<?= $carrito_vacio ? '#' : 'MetododePago.html' ?>" class="<?= $carrito_vacio ? 'deshabilitado' : '' ?>" <?= $carrito_vacio ? 'onclick="return false;"' : '' ?>>
                Continuar Compra
            </a>
        </div>
    </div>

    <a href="catalogo.php" style="display: block; text-align: center; margin-top: 20px;">Volver al catálogo</a>
</body>
</html>
