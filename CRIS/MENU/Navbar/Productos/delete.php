<?php
include '/MYsql/Conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM productos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
?>
