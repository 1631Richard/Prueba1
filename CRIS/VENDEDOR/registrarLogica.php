<?php
// Incluir la conexión
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = $_POST['nombres'] . ' ' . $_POST['apellidos'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena']; // Sin encriptar

    // Preparar la consulta SQL
    $sql = "INSERT INTO vendedor (Nombre, Correo, Contrasena) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        // Bind de parámetros para evitar inyecciones SQL
        $stmt->bind_param("sss", $nombre, $correo, $contrasena);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Registro exitoso. IDVendedor generado: " . $stmt->insert_id;
        } else {
            echo "Error al registrar: " . $stmt->error;
        }

        // Cerrar el statement
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "Método no permitido.";
}
header("Location: registro.php?success=true");
exit;
?>