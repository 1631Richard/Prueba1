const btnLeft = document.querySelector(".btn-left"),
      btnRight = document.querySelector(".btn-right"),
      slider = document.querySelector("#slider"),
      sliderSection = document.querySelectorAll(".slider-section");


btnLeft.addEventListener("click", e => moveToLeft())
btnRight.addEventListener("click", e => moveToRight())

setInterval(() => {
    moveToRight()
}, 3000);


let operacion = 0,
    counter = 0,
    widthImg = 100 / sliderSection.length;

function moveToRight() {
    if (counter >= sliderSection.length-1) {
        counter = 0;
        operacion = 0;
        slider.style.transform = `translate(-${operacion}%)`;
        slider.style.transition = "none";
        return;
    } 
    counter++;
    operacion = operacion + widthImg;
    slider.style.transform = `translate(-${operacion}%)`;
    slider.style.transition = "all ease .6s"
    
}  

function moveToLeft() {
    counter--;
    if (counter < 0 ) {
        counter = sliderSection.length-1;
        operacion = widthImg * (sliderSection.length-1)
        slider.style.transform = `translate(-${operacion}%)`;
        slider.style.transition = "none";
        return;
    } 
    operacion = operacion - widthImg;
    slider.style.transform = `translate(-${operacion}%)`;
    slider.style.transition = "all ease .6s"
    
    
}   

// Ejemplo de script para reproducir video al pasar el mouse
const videos = document.querySelectorAll('.gig-video');

videos.forEach(video => {
  video.addEventListener('mouseenter', () => {
    video.play();
  });

  video.addEventListener('mouseleave', () => {
    video.pause();
  });
});

// Variables globales
const carritoItemsContainer = document.querySelector('.carrito-items');
const carritoTotal = document.querySelector('.carrito-precio-total');
const carrito = [];

// Función para actualizar el carrito en la interfaz
function actualizarCarrito() {
    carritoItemsContainer.innerHTML = '';  // Limpiar contenido del carrito
    let total = 0;

    // Recorrer todos los productos en el carrito
    carrito.forEach((item, index) => {
        // Crear el HTML para cada producto
        const itemHTML = document.createElement('div');
        itemHTML.classList.add('carrito-item');
        itemHTML.innerHTML = `
            <img src="${item.imagen}" width="80px" alt="${item.titulo}">
            <div class="carrito-item-detalles">
                <span class="carrito-item-titulo">${item.titulo}</span>
                <span class="carrito-item-precio">$${item.precio}</span>
            </div>
            <button class="btn-eliminar" data-index="${index}">Eliminar</button>
        `;

        // Agregar al carrito en la interfaz
        carritoItemsContainer.appendChild(itemHTML);

        // Sumar el precio al total
        total += item.precio;
    });

    // Actualizar el total en la interfaz
    carritoTotal.textContent = `$${total.toFixed(2)}`;

    // Mostrar el carrito si tiene productos
    if (carrito.length > 0) {
        document.getElementById('carrito').style.opacity = 1;
    } else {
        document.getElementById('carrito').style.opacity = 0;
    }
}

// Función para agregar un producto al carrito
function agregarAlCarrito(titulo, precio, imagen) {
    const producto = {
        titulo,
        precio,
        imagen
    };

    // Agregar producto al carrito
    carrito.push(producto);

    // Actualizar vista del carrito
    actualizarCarrito();
}

// Función para manejar el clic en el botón "Agregar al Carrito"
document.querySelectorAll('.btn-agregar-carrito').forEach(button => {
    button.addEventListener('click', () => {
        const card = button.closest('.gig-card');  // Buscar el contenedor de producto
        const titulo = card.querySelector('.service-title h3').textContent;  // Obtener el título
        const precio = parseFloat(card.querySelector('.price strong').textContent.replace('$', ''));  // Obtener el precio
        const imagen = card.querySelector('img').src;  // Obtener la imagen del producto

        // Llamar a la función para agregar el producto al carrito
        agregarAlCarrito(titulo, precio, imagen);
    });
});

// Función para eliminar un producto del carrito
carritoItemsContainer.addEventListener('click', (event) => {
    if (event.target.classList.contains('btn-eliminar')) {
        const index = event.target.dataset.index;
        carrito.splice(index, 1);  // Eliminar el producto del carrito
        actualizarCarrito();  // Actualizar la vista del carrito
    }
});

let profile = document.querySelector(".profile");
let menulogin = document.querySelector(".menu-login");

profile.addEventListener("click", ()=>{
    menulogin.classList.toggle("active")
})