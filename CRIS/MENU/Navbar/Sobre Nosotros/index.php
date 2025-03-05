<?php
// Inicia la sesión
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['username']) || !isset($_SESSION['full_name'])) {
    echo '
        <script>
            alert("Por favor, inicia sesión.");
            window.location = "../login.php";
        </script>
    ';
    exit();
}

// Recupera el nombre completo y el rol del usuario
$full_name = $_SESSION['full_name'];
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="header">
        <div class="menu container">
            <a href="#" class="logo"><img src="/IMAGENES/LOGO.ico" alt="Logo Destino" class="logo-imagen"></a>
            <input type="checkbox" id="menu">
            <label for="menu">
                <img src="/IMAGENES/menu.png" class="menu-icono" alt="">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="/MENU/index.php">Inicio</a></li>
                    <li><a href="/MENU/Navbar/Sobre Nosotros/index.php">Sobre Nosotros</a></li>
                    <li><a href="/MENU/Navbar/Productos/index.php">Productos</a></li>
                    <li><a href="#">Contactos</a></li>
                </ul>
            </nav>

            <div class="search">
                <input type="text" placeholder="Search">
                <i class='bx bx-search'></i>
            </div>

            <div class="icons">
                <i class='bx bxl-facebook-circle' ></i>
                <i class='bx bxl-twitter' ></i>
                <i class='bx bxl-instagram' ></i>
            </div>

            <div class="account">
                <div class="profile">
                    <img src="/IMAGENES/user.png" alt="">
                </div>
                <div class="menu-login">
                    <!-- Nombre y rol dinámicos -->
                    <h3><?php echo htmlspecialchars($username); ?></h3>
                    <p><?php echo htmlspecialchars($full_name); ?></p>
                    <ul>
                        <li>
                            <i class='bx bx-user'></i>
                            <a href="/MENU/Menu_login/profile.php">Profile</a>
                        </li>
                        <li>
                            <i class='bx bx-cart'></i>
                            <a href="">Shopping cart</a>
                        </li>
                        <li>
                            <i class='bx bx-question-mark' ></i>
                            <a href="#">Help</a>
                        </li>
                        <li>
                            <i class='bx bx-exit' ></i>
                            <a href="/index.php">Exit</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <section class="hero-section">
        <div class="hero-content">
            <div class="stat">
                <h3>2023</h3>
                <p>Año de creación</p>
            </div>
            <div class="stat">
                <h3>500+</h3>
                <p>Proyectos subidos</p>
            </div>
            <div                                                                                                                class="stat">
                <h3>20+</h3>
                <p>Lenguajes soportados</p>
            </div>
            <div class="stat">
                <h3>1000+</h3>
                <p>Usuarios registrados</p>
            </div>
        </div>
    </section>

    <!-- Sección Sobre Nosotros -->
    <section class="about">
        <h2>¿Eres un entusiasta de la programación?</h2>
        <p>Nuestra plataforma está diseñada para que puedas compartir y descargar proyectos de programación en diversos lenguajes, así como vender tus ideas y creaciones. ¡Conviértete en parte de una comunidad que fomenta el aprendizaje y la innovación!</p>
    </section>

    <!-- Sección Visión y Misión -->
    <section class="vision-mission">
        <div class="vision">
            <h3>Visión</h3>
            <p>Ser la plataforma líder donde programadores de todo el mundo puedan compartir, vender y descubrir proyectos innovadores, inspirando a las futuras generaciones de desarrolladores.</p>
        </div>
        <div class="mission">
            <h3>Misión</h3>
            <p>Brindar a los programadores un espacio donde puedan compartir sus proyectos, aprender de otros y generar ingresos a través de la venta de sus creaciones, fomentando la innovación y el crecimiento continuo.</p>
        </div>
    </section>

    <section class="map-you">
        <iframe src="https://www.youtube.com/embed/6zI4ZcRS8yg?si=8r4lybP7Hf4c3F0W" frameborder="0"></iframe>
        <iframe src="Barra/letras.html"frameborder="0"></iframe>
        <iframe src="Barra/barra.html" frameborder="0"></iframe>
        <iframe src="Barra/index.html" frameborder="0"></iframe>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.670672545101!2d-77.03945632442125!3d-12.066165288172122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8ea52a218f9%3A0x4931f570fd313227!2sUTP%20-%20Torre%20Arequipa!5e0!3m2!1ses-419!2spe!4v1726709585557!5m2!1ses-419!2spe" style="flex-basis: auto;" frameborder="0"></iframe>
    </section>

    <!-- Sección Valores -->
    <section class="values">
        <h2>Valores</h2>
        <div class="value-icons">
            <div class="value">
                <img src="/IMAGENES/integridad.ico" alt="Icono de Integridad">
                <p>Integridad</p>
            </div>
            <div class="value">
                <img src="/IMAGENES/descarga.ico" alt="Icono de Innovación">
                <p>Innovación</p>
            </div>
            <div class="value">
                <img src="/IMAGENES/calidad.ico" alt="Icono de Calidad">
                <p>Calidad</p>
            </div>
            <div class="value">
                <img src="/IMAGENES/confianza.ico" alt="Icono de Confianza">
                <p>Confianza</p>
            </div>
        </div>
    </section>
    
    <script src="scrip.js"></script>

    <footer>
        <div class="footer-column">
            <h3>Lenguajes de Programación</h3>
            <ul>
                <li><a href="#">Python</a></li>
                <li><a href="#">JavaScript</a></li>
                <li><a href="#">Java</a></li>
                <li><a href="#">C++</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Servicios</h3>
            <ul>
                <li><a href="#">Cursos en Línea</a></li>
                <li><a href="#">Certificaciones</a></li>
                <li><a href="#">Consultoría</a></li>
                <li><a href="#">Soporte Técnico</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Sobre Nosotros</h3>
            <ul>
                <li><a href="#">Nuestro Equipo</a></li>
                <li><a href="#">Carreras</a></li>
                <li><a href="#">Testimonios</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Términos y Condiciones</h3>
            <ul>
                <li><a href="#">Política de Privacidad</a></li>
                <li><a href="#">Términos de Uso</a></li>
                <li><a href="#">Política de Reembolsos</a></li>
                <li><a href="#">Libro de Reclamaciones</a></li>
            </ul>
        </div>
        <p>&copy; 2024 Venta de Lenguajes de Programación. Todos los derechos reservados.</p>
    </footer>

</body>
</html>