<?php
include_once './Conexion.php';
class Negocio {
   
   function mostrarItems(){
      $obj=new Conexion();
      $sql="select p.IDProducto, p.nom_producto, (p.precio-(p.precio*0.18)), (p.precio*0.18), p.precio from productos p join cliente_producto cp on cp.IDProducto=p.IDProducto WHERE cp.IDUsuario='C002'";
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
    $sql = "SELECT p.nom_producto 
            FROM productos p 
            JOIN cliente_producto cp ON cp.IDProducto = p.IDProducto 
            WHERE cp.IDUsuario = '$IDUsuario'";
    $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
    $vec = array();
    while ($fila = mysqli_fetch_array($res)) {
        $vec[] = ['nombre' => $fila['nom_producto']]; or die(mysqli_error($obj->conecta()));
    }
    return $vec;
}
function eliminarProduct($IDProducto) { 
   $obj = new Conexion();
   $sql = "DELETE from cliente_producto WHERE IDUsuario='C002' and IDProducto='$IDProducto'";
   $res = mysqli_query($obj->conecta(), $sql);
   
   if (mysqli_affected_rows($obj->conecta()) > 0) {
       echo "Producto eliminado correctamente.";
   } else {
       echo "No se pudo eliminar el producto o no existe en la base de datos.";
   }
}

}

if (isset($_POST['IDProducto'])) {
   $IDProducto = $_POST['IDProducto']; // Obtener el IDProducto del formulario
   $obj = new Negocio();
   $obj->eliminarProduct($IDProducto); // Llamar al método para eliminar el producto

   // Redirigir de vuelta a la página principal después de la eliminación
   header("Location: index.php"); // Asegúrate de que index.php esté en la misma carpeta
   exit();  // Detener el script para evitar cualquier código adicional después de la redirección
}

?>