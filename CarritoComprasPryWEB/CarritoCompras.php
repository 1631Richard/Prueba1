<html>
    <head>
        <meta charset="UTF-8">
        <title>Carrito de Compras</title>
        <link href="estilos.css" rel="stylesheet" type="text/css"/>
        <script src="MetodosJS.js" type="text/javascript"></script>
    </head>
    <body style="background-color: #d9ff1c">
        <?php
        include_once './Metodos.php';
        $obj=new Negocio();
        $vec=$obj->mostrarItems(); //mostrar tabla
        $vecUsu=$obj->mostrarNombre(); //mostrar nombre
        $vecProd=$obj->mostrarProducts(); //lista de productos todos
        $vecProductosCliente=$obj->mostrarProductsCliente('C002'); //lista para eliminar productos
        ?>
        <h3>Bienvenido...</h3>
        <!--acá el nombre de la persona-->
        <?php 
        echo $vecUsu;
        ?>
        <table class="mGrid">
            <thead>
            <tr><th>Item<th>Cantidad<th>Codigo Producto<th>Descripción<th>SubTotal<th>IGV<th>Total<th>Editar
            </thead>
        <?php
        $cont = 1;
        foreach ($vec as $d) {
            echo"<tr><td>$cont<td>$d[5]<td>$d[0]<td>$d[1]<td>$d[2]<td>$d[3]<td>$d[4]
            <td><img src='img/editar.png' onclick='mostrarEditar($cont)'>";
            $cont++;
        }?>
        </table>
        <br><br>
        
        <div id="editarCantidad" style="display: none;">
            <label for="nuevaCantidad">Nueva cantidad:</label>
            <button onclick="modificarCantidad('decrease')">-</button>
            <input type="number" id="nuevaCantidad" value="1" min="1">
            <button onclick="modificarCantidad('increase')">+</button>
            <button onclick="confirmarEdicion()">OK</button>
        </div>
        
        <!--Insertar productos-->
        <button onclick="mostrarElementos()">Insertar productos</button>
        <!--        método de javaScript        display:none=> hace que no sea visible -->
        <div id="texto" style="display:none;">
            <form action="Metodos.php" method="POST"> <!--Va a tener el IDProducto-->
            <select name="IDProducto">
                <?php
                // Generar dinámicamente las opciones del comboBox con los productos
                foreach ($vecProd as $producto) {
                    echo "<option value=\"{$producto['id']}\">{$producto['nombre']}</option>";
                }           //el IDProducto va a ser enviado para insertar
                ?>
            </select>
                <button type="submit">Agregar</button>
            </form>
        </div>
        
        <!--eliminarProduct($IDProducto)-->
        
        <!--Eliminar productos-->
        <button onclick="mostrarElementosCliente()">Eliminar productos</button>
        
        <!-- Formulario para eliminar productos -->
            <div id="ListaProdCli">
                <form action="Metodos.php" method="POST">
                    <select name="IDProductoEliminar">
                        <?php
                        foreach ($vecProductosCliente as $producto) {
                            echo "<option value=\"{$producto['id']}\">{$producto['nombre']}</option>";
                        }
                        ?>
                        
                    </select>
                    <button type="submit">Eliminar Producto</button>
                </form>
            </div>



        
<!--       <button onclick="">Actualizar Cantidad</button>
        
        <div id="actualizarCantidad" style="display: none;">
            <form action="Metodos.php" method="POST">
                <select name="IDProductoActualizar">
                    <?php
                    foreach ($vecProductosCliente as $producto) {
                        echo "<option value=\"{$producto['id']}\">{$producto['nombre']}</option>";
                    }
                    ?>
                </select>
                <input type="number" name="cantidad" placeholder="Nueva cantidad" min="1" required>
                <button type="submit">Actualizar Cantidad</button>
            </form>
        </div>-->
        
    </body>
</html>
