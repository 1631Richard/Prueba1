function mostrarElementos() {
            document.getElementById("texto").style.display = "block";
        }

function mostrarElementosEliminar() {
    var textoEliminar = document.getElementById("textoEliminar");
    textoEliminar.style.display = textoEliminar.style.display === "none" ? "block" : "none";
}