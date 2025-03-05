<?php
include '/MYsql/Conexion.php';

$titulo = $_POST['titulo'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];

$sql = "INSERT INTO productos (titulo, precio, imagen, descripcion, stock) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sdssi", $titulo, $precio, $imagen, $descripcion, $stock);
$stmt->execute();

header("Location: index.php");
?>
