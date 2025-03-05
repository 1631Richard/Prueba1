function mostrarElementos() {
    document.getElementById("texto").style.display = "block";
}
function mostrarElementosCliente() {
    document.getElementById("ListaProdCli").style.display = "block";
}
function mostrarEditar(id) {
            // Mostrar el input para editar la cantidad
            document.getElementById('editarCantidad').style.display = 'block';
            // Establecer el valor inicial del input con la cantidad actual
            let cantidadActual = document.getElementById('cantidad_' + id).innerText;
            document.getElementById('nuevaCantidad').value = cantidadActual;
            // Guardar el ID del producto para realizar la actualización
            document.getElementById('nuevaCantidad').setAttribute('data-id', id);
        }
function modificarCantidad(accion) {
            let inputCantidad = document.getElementById('nuevaCantidad');
            let cantidadActual = parseInt(inputCantidad.value);

            // Aumentar o disminuir la cantidad
            if (accion === 'increase') {
                inputCantidad.value = cantidadActual + 1;
            } else if (accion === 'decrease' && cantidadActual > 1) {
                inputCantidad.value = cantidadActual - 1;
            }
        }  
function confirmarEdicion() {
            let cantidad = document.getElementById('nuevaCantidad').value;
            let idProducto = document.getElementById('nuevaCantidad').getAttribute('data-id');

            // Enviar la cantidad actualizada al servidor
            window.location.href = "Metodos.php?IDProductoActualizar=" + idProducto + "&cantidad=" + cantidad;
        }