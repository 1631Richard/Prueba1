<?php
include_once './Conexion.php';
class Negocio {
   
   function mostrarItems(){
      $obj=new Conexion();
      $sql="select p.IDProducto, p.nom_producto, (p.precio-(p.precio*0.18)), (p.precio*0.18), p.precio,cp.Cantidad from productos p join cliente_producto cp on cp.IDProducto=p.IDProducto WHERE cp.IDUsuario='C002'";
      $res= mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
      $vec=array();
      while($fila= mysqli_fetch_array($res)){
          $vec[]=$fila;
      }
      return $vec;
   }
   function mostrarNombre(){
      $obj=new Conexion();
      $sql="select nombre,apellido from usuario WHERE IDUsuario='C002'";
      $res= mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
      if ($fila = mysqli_fetch_assoc($res)) {
        return $fila['nombre'] . ' ' . $fila['apellido'];
    }
    return "Usuario no encontrado"; 
    }
    function mostrarProducts(){
      $obj=new Conexion();
      $sql="select IDProducto, nom_producto from productos";
      $res= mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
      $vec=array();
      while($fila= mysqli_fetch_array($res)){
          $vec[] = ['id' => $fila['IDProducto'], 'nombre' => $fila['nom_producto']];
      }
      return $vec;
   }
   
   function insertarProduct($IDProducto){
      $obj=new Conexion();
      $sql="INSERT INTO cliente_producto (IDUsuario, IDProducto) VALUES ('C002', '$IDProducto')";
      $res= mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
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
   function eliminarProduct($IDProducto){
      $obj=new Conexion();
      $sql="DELETE from cliente_producto WHERE IDUsuario='C002' and IDProducto='$IDProducto'";
      $res= mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
      }
   
   function actualizarCant($IDUsuario,$cant,$IDProducto){
       $obj = new Conexion();
       $sql = "UPDATE cliente_producto SET Cantidad = '$cant' WHERE IDUsuario = '$IDUsuario' AND IDProducto = '$IDProducto'";
       $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
    
   
    }
}
        


if (isset($_POST['IDProducto'])) {
    $IDProducto = $_POST['IDProducto']; // Obtener ID para insertar
    $obj = new Negocio();
    $obj->insertarProduct($IDProducto);
    header("Location: CarritoCompras.php");
    echo "IDProductoInsertado recibido: " . htmlspecialchars($IDProducto);
    exit();
}

if (isset($_POST['IDProductoEliminar'])) {
    $IDProducto = $_POST['IDProductoEliminar']; // Obtener ID para eliminar
    $obj = new Negocio();
    $obj->eliminarProduct($IDProducto);
    header("Location: CarritoCompras.php");
    echo "IDProductoEliminar recibido: " . htmlspecialchars($IDProducto);
    exit();
}

if (isset($_POST['IDProductoActualizar']) && isset($_POST['cantidad'])) {
    $IDProducto = $_POST['IDProductoActualizar']; // ID del producto
    $cantidad = $_POST['cantidad']; // Nueva cantidad
    $obj = new Negocio();
    $obj->actualizarCant('C002', $cantidad, $IDProducto); // Ajustar si el IDUsuario es dinámico
    header("Location: CarritoCompras.php");
    exit();
}


?>