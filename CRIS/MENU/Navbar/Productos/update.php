<?php
include '/MYsql/Conexion.php';

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];

$sql = "UPDATE productos SET titulo = ?, precio = ?, imagen = ?, descripcion = ?, stock = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sdssii", $titulo, $precio, $imagen, $descripcion, $stock, $id);
$stmt->execute();

header("Location: index.php");
?>
