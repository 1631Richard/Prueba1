// Recuperar el carrito de compras desde localStorage
const carrito = JSON.parse(localStorage.getItem('carrito')) || [];

// Mostrar la lista de artículos comprados
const detalleCompra = document.getElementById("detalleCompra");
if (carrito.length > 0) {
    const ul = document.createElement("ul");
    carrito.forEach(articulo => {
        const li = document.createElement("li");
        li.textContent = `${articulo.nombre} - S/.${articulo.precio}`;
        ul.appendChild(li);
    });
    detalleCompra.appendChild(ul);
} else {
    detalleCompra.innerHTML = "<p>No se encontraron artículos comprados.</p>";
}
