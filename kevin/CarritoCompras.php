<html>
    <head>
        <meta charset="UTF-8">
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
        $vecProd = $obj->mostrarProducts();
        
        //  código para obtener los productos del cliente 
        $vecProductosCliente = $obj->mostrarProductsCliente('C002'); // Obtener productos del cliente con ID 'C002'
        ?>
        <h3>Bienvenido...</h3>
        <!-- Aquí se muestra el nombre del usuario -->
        <?php 
        echo $vecUsu;
        ?>
        
        <table class="mGrid">
            <thead>
                <tr><th>Item<th>Codigo Producto<th>Descripción<th>SubTotal<th>IGV<th>Total</tr>
            </thead>
            <?php
            $cont = 1;
            foreach ($vec as $d) {
                echo "<tr><td>$cont<td>$d[0]<td>$d[1]<td>$d[2]<td>$d[3]<td>$d[4]</tr>";
                $cont++;
            }
            ?>
        </table>

        <!-- Insertar productos -->
        <button onclick="mostrarElementos()">Insertar productos</button>
        
        <div id="texto" style="display:none;">
            <form action="Metodos.php" method="POST">
                <select id="productoSelect" name="IDProducto">
                    <?php
                    // Generar dinámicamente las opciones del comboBox con los productos disponibles
                    foreach ($vecProd as $producto) {
                        echo "<option value=\"{$producto['id']}\">{$producto['nombre']}</option>";
                    }
                    ?>
                </select>
                <button type="submit">Agregar</button>
            </form>
        </div>

        <!-- Eliminar productos -->
        <button onclick="mostrarElementosEliminar()">Eliminar productos</button>
        
        <div id="textoEliminar" style="display:none;">
            <p>Eliminar producto</p>
            <form action="Metodos.php" method="POST">
                <select id="productoSelectEliminar" name="IDProducto" style="width: 300px;">
                    <?php
                    //  código para mostrar los productos del cliente que están en el carrito
                    foreach ($vecProductosCliente as $producto) {
                        echo "<option value=\"{$producto['id']}\">{$producto['nombre']}</option>";
                    }
                    ?>
                </select>
                <button type="submit">Eliminar</button>
            </form>
        </div>
    </body>
</html>
