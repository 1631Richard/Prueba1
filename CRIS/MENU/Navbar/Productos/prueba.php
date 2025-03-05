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
                            <img src="https://via.placeholder.com/100" alt="Foto de Perfil">
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
</body>
</html>