<?php
include_once './Conexion.php';
class Negocio {
    function mostrarItems() {
        $obj = new Conexion();
        $sql = "SELECT p.IDProducto, p.nom_producto, 
                       (p.precio - (p.precio * 0.18)), 
                       (p.precio * 0.18), p.precio 
                FROM productos p 
                JOIN cliente_producto cp ON cp.IDProducto = p.IDProducto 
                WHERE cp.IDUsuario = 'C002'";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        $vec = array();
        while ($fila = mysqli_fetch_array($res)) {
            $vec[] = $fila;
        }
        return $vec;
    }

    function mostrarNombre() {
        $obj = new Conexion();
        $sql = "SELECT nombre, apellido FROM usuario WHERE IDUsuario = 'C002'";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        if ($fila = mysqli_fetch_assoc($res)) {
            return $fila['nombre'] . ' ' . $fila['apellido'];
        }
        return "Usuario no encontrado";
    }

    function mostrarProducts() {
        $obj = new Conexion();
        $sql = "SELECT IDProducto, nom_producto FROM productos";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        $vec = array();
        while ($fila = mysqli_fetch_array($res)) {
            $vec[] = ['id' => $fila['IDProducto'], 'nombre' => $fila['nom_producto']];
        }
        return $vec;
    }

    function mostrarProductsCliente($IDUsuario) {
        $obj = new Conexion();
        $sql = "SELECT p.IDProducto, p.nom_producto 
                FROM productos p 
                JOIN cliente_producto cp ON cp.IDProducto = p.IDProducto 
                WHERE cp.IDUsuario = '$IDUsuario'";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        $vec = array();
        while ($fila = mysqli_fetch_array($res)) {
            $vec[] = ['id' => $fila['IDProducto'], 'nombre' => $fila['nom_producto']];
        }
        return $vec;
    }

    function eliminarProduct($IDProducto) {
        $obj = new Conexion();
        $sql = "DELETE FROM cliente_producto WHERE IDUsuario = 'C002' AND IDProducto = '$IDProducto'";
        mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
    }

    function insertarProduct($IDProducto) {
        $obj = new Conexion();
        $sql = "INSERT INTO cliente_producto (IDUsuario, IDProducto) VALUES ('C002', '$IDProducto')";
        mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
    }
}

// Lógica para manejar eliminación
if (isset($_POST['accion']) && $_POST['accion'] === 'eliminar' && isset($_POST['IDProducto'])) {
    $IDProducto = $_POST['IDProducto'];
    $obj = new Negocio();
    $obj->eliminarProduct($IDProducto);

    // Redirigir a index.php después de la eliminación
    header("Location: index.php");
    exit();
}

// Lógica para manejar inserción
if (isset($_POST['accion']) && $_POST['accion'] === 'insertar' && isset($_POST['IDProducto'])) {
    $IDProducto = $_POST['IDProducto'];
    $obj = new Negocio();
    $obj->insertarProduct($IDProducto);

    // Redirigir a index.php después de la inserción
    header("Location: index.php");
    exit();
}
?>
