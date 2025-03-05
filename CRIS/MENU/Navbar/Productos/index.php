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
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
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
    </div>

    <div class="posicion">
        <div class="container-carousel">
            <div class="carruseles" id="slider">
                <section class="slider-section">
                    <img src="/IMAGENES/bg1.jpg">
                </section>
                <section class="slider-section">
                    <img src="/IMAGENES/bg2.jpg">
                </section>
                <section class="slider-section">
                    <img src="/IMAGENES/bg3.jpg">
                </section>
                <section class="slider-section">
                    <img src="/IMAGENES/bg4.jpg">
                </section>
            </div>
            <div class="btn-left"><i class='bx bx-chevron-left'></i></div>
            <div class="btn-right"><i class='bx bx-chevron-right'></i></div>
        </div>
    </div>
   


  

    <div class="position-grid">
    <div class="grid-container">
        <?php
         // Asegúrate de que la ruta sea correcta
         include 'Conexion.php';
            // Consulta para obtener los productos
            $sql = "SELECT IDProducto, TipoLenguaje, nom_producto, descripcion, precio, IDVendedor FROM productos";
            $result = $conexion->query($sql);

            // Verifica si hay resultados
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Genera el diseño del producto
                    echo '
                    <div class="gig-card">
                        <!-- Contenedor de Imagen/Video -->
                        <a href="#" class="media">
                          <div class="slider">
                            <video class="gig-video" muted loop>
                              <source src="https://videos.pexels.com/video-files/5925291/5925291-uhd_2560_1440_24fps.mp4" type="video/mp4">
                              Tu navegador no soporta videos.
                            </video>
                          </div>
                        </a>
                        <!-- Información del Vendedor -->
                        <div class="seller-info">
                          <div class="profile-pic">
                            <img src="https://highxtar.com/wp-content/uploads/2022/09/highxtar-este-es-el-icono-de-perfil-de-netflix-mas-utilizado-destacada.jpg" alt="Foto de Perfil">
                          </div>
                          <div class="seller-details">
                            <span class="text-normal">ID Vendedor: </span>
                            <a href="#" class="text-bold">' . htmlspecialchars($row["IDVendedor"]) . '</a>
                          </div>
                        </div>
                        <!-- Descripción del Servicio -->
                        <a href="#" class="service-title">
                          <h3>' . htmlspecialchars($row["nom_producto"]) . '</h3>
                        </a>
                        <p>' . htmlspecialchars($row["descripcion"]) . '</p>
                        <!-- Calificación y Precio -->
                        <div class="gig-details">
                          <div class="price">
                            <span>Desde <strong>' . htmlspecialchars($row["precio"]) . ' Soles</strong></span>
                          </div>
                        </div>
                        <button class="btn-agregar-carrito">Agregar al Carrito</button>
                    </div>';
                }
            } else {
                echo "<p>No hay productos disponibles.</p>";
            
              }
            // Cierra la conexión
            $conexion->close();
         
        ?>
    </div>
</div>
    <script src="script.js"></script>
</body>
</html>