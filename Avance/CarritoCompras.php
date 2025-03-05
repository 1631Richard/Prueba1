<<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="estilos.css" rel="stylesheet" type="text/css"/>
    <script src="MetodosJS.js" type="text/javascript"></script>
</head>
<body>
    <?php
    include_once './Metodos.php';
    $obj = new Negocio();
    $vec = $obj->mostrarItems();
    $vecUsu = $obj->mostrarNombre();
    $vecProd = $obj->mostrarProducts(); // Obtener todos los productos de la base de datos
    $vecProductosCliente = $obj->mostrarProductsCliente('C002');
    ?>

    <h3>Bienvenido...</h3>
    <p><?php echo $vecUsu; ?></p>

    <!-- Tabla de productos -->
    <table class="mGrid">
        <thead>
            <tr>
                <th>Item</th>
                <th>Código Producto</th>
                <th>Descripción</th>
                <th>SubTotal</th>
                <th>IGV</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cont = 1;
            foreach ($vec as $d) {
                echo "<tr>
                        <td>$cont</td>
                        <td>$d[0]</td>
                        <td>$d[1]</td>
                        <td>$d[2]</td>
                        <td>$d[3]</td>
                        <td>$d[4]</td>
                    </tr>";
                $cont++;
            }
            ?>
        </tbody>
    </table>

    <!-- Eliminar productos -->
    <button onclick="mostrarElementosEliminar()">Eliminar productos</button>
    <div id="textoEliminar" style="display:none;">
        <form action="Metodos.php" method="POST">
            <input type="hidden" name="accion" value="eliminar">
            <select id="productoSelectEliminar" name="IDProducto">
                <?php
                foreach ($vecProductosCliente as $producto) {
                    echo "<option value=\"{$producto['id']}\">{$producto['nombre']}</option>";
                }
                ?>
            </select>
            <button type="submit">Eliminar</button>
        </form>
    </div>

    <!-- Insertar productos -->
    <button onclick="mostrarElementosInsertar()">Agregar productos</button>
    <div id="textoInsertar" style="display:none;">
        <form action="Metodos.php" method="POST">
            <input type="hidden" name="accion" value="insertar">
            <select id="productoSelectInsertar" name="IDProducto">
                <?php
                if (!empty($vecProd)) { // Verifica que hay productos
                    foreach ($vecProd as $producto) {
                        echo "<option value=\"{$producto['id']}\">{$producto['nombre']}</option>";
                    }
                } else {
                    echo "<option value=\"\">No hay productos disponibles</option>";
                }
                ?>
            </select>
            <button type="submit">Agregar</button>
        </form>
    </div>

    <script>
        // Función para mostrar el formulario de eliminar productos
        function mostrarElementosEliminar() {
            var textoEliminar = document.getElementById("textoEliminar");
            if (textoEliminar.style.display === "none") {
                textoEliminar.style.display = "block";
            } else {
                textoEliminar.style.display = "none";
            }
        }

        // Función para mostrar el formulario de agregar productos
        function mostrarElementosInsertar() {
            var textoInsertar = document.getElementById("textoInsertar");
            if (textoInsertar.style.display === "none") {
                textoInsertar.style.display = "block";
            } else {
                textoInsertar.style.display = "none";
            }
        }
    </script>
</body>
</html>
