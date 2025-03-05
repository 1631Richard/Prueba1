// Función para mostrar el formulario según el método de pago seleccionado
function mostrarFormulario(metodo) {
    // Ocultar todos los formularios
    document.getElementById('formTarjeta').style.display = 'none';
    document.getElementById('formYape').style.display = 'none';
    document.getElementById('formEfectivo').style.display = 'none';

    // Mostrar el formulario correspondiente
    if (metodo === 'tarjeta') {
        document.getElementById('formTarjeta').style.display = 'block';
    } else if (metodo === 'yape') {
        document.getElementById('formYape').style.display = 'block';
    } else if (metodo === 'efectivo') {
        document.getElementById('formEfectivo').style.display = 'block';
    }
}
