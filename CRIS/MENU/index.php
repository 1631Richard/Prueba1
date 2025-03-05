<?php
// session.php
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

// Recupera el nombre completo y el nombre de usuario desde la sesión
$full_name = $_SESSION['full_name'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linding</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Sección de cabecera con menú de navegación -->
    <header class="header">
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
                            <a href="/Prueba1M/Prueba1CarritoCompras.php">Shopping cart</a>
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
        <!-- Sección de contenido de la cabecera con texto y botón -->
        <div class="header-content container">
            <div class="header-txt">
                <h1>Elige tu programa de elección</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Consequuntur esse possimus reprehenderit repellendus eius,
                    aperiam hic similique fuga dolorum quaerat enim autem aliquam. 
                    Iusto modi nesciunt in id omnis eos?
                </p>
                <a href="#" class="btn-1">Menú</a>
            </div>
        </div>
        <!-- Sección del carrusel de imágenes -->
        <div class="images">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="/IMAGENES/Programa (3).jpg" alt="">
                        <h3>C#</h3>
                    </div>
                    <div class="swiper-slide">
                        <img src="/IMAGENES/Programa (4).jpg" alt="">
                        <h3>Js</h3>
                    </div>
                    <div class="swiper-slide">
                        <img src="/IMAGENES/Programa (1).png" alt="">
                        <h3>Java</h3>
                    </div>
                    <div class="swiper-slide">
                        <img src="/IMAGENES/Programa (2).jpg" alt="">
                        <h3>C++</h3>
                    </div>
                    <div class="swiper-slide">
                        <img src="/IMAGENES/Programa (5).jpg" alt="">
                        <h3>Kotlin</h3>
                    </div>
                    <div class="swiper-slide">
                        <img src="/IMAGENES/Programa (6).jpg" alt="">
                        <h3>Python</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Botones de navegación del carrusel -->
        <div class="rows">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </header>
    <!-- Scripts externos -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
