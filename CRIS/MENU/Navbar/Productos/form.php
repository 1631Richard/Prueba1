<?php
include '/MYsql/Conexion.php';

$id = "";
$titulo = "";
$precio = "";
$imagen = "";
$descripcion = "";
$stock = "";

// Si se recibe un ID, cargar los datos del producto
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $producto = $result->fetch_assoc();

    $titulo = $producto['titulo'];
    $precio = $producto['precio'];
    $imagen = $producto['imagen'];
    $descripcion = $producto['descripcion'];
    $stock = $producto['stock'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title><?= $id ? "Editar Producto" : "Agregar Producto" ?></title>
</head>
<body>
    <h1><?= $id ? "Editar Producto" : "Agregar Producto" ?></h1>
    <form action="<?= $id ? 'update.php' : 'create.php' ?>" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label>Título:</label>
        <input type="text" name="titulo" value="<?= $titulo ?>" required>
        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" value="<?= $precio ?>" required>
        <label>Imagen URL:</label>
        <input type="text" name="imagen" value="<?= $imagen ?>">
        <label>Descripción:</label>
        <textarea name="descripcion" required><?= $descripcion ?></textarea>
        <label>Stock:</label>
        <input type="number" name="stock" value="<?= $stock ?>" required>
        <button type="submit"><?= $id ? "Actualizar" : "Guardar" ?></button>
    </form>
</body>
</html>
