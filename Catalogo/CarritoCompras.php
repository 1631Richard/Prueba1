<?php
session_start();

// Productos de ejemplo para simular el carrito (puedes comentar esto si estás usando datos reales)
$_SESSION['carrito'] = [

]; // Cambia esto para probar con carrito vacío o lleno

// Obtener los productos del carrito desde la sesión
$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : []; 

// Calcular el total, la cantidad de productos y el descuento
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
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #4CAF50;
            color: white;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        /* Estilo para la tabla de productos */
        table {
            width: 70%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            font-size: 16px;
            color: #555;
        }

        img {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
        }

        /* Estilo para la tabla de resumen */
        .resumen {
            width: 25%;
            padding: 20px;
            margin-left: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            align-self: flex-start;
        }

        .resumen table {
            width: 100%;
        }

        .resumen th, .resumen td {
            padding: 8px;
            text-align: left;
        }

        .resumen th {
            background-color: #f4f4f4;
        }

        /* Botón de Continuar Compra */
        .resumen a {
            display: block;
            text-align: center;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .resumen a:hover {
            background-color: #45a049;
        }

        /* Mensaje si el carrito está vacío */
        p {
            text-align: center;
            font-size: 18px;
            color: #ff0000;
            padding: 20px;
        }

        .deshabilitado {
            background-color: #ddd;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <h1>Carrito de Compras</h1>

    <div class="container">
        <?php if (empty($carrito)): ?>
            <p>El carrito está vacío.</p>
        <?php else: ?>
            <!-- Tabla de productos -->
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

        <!-- Tabla de resumen -->
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

    <a href="catalogo.php">Volver al catálogo</a>
</body>
</html>
