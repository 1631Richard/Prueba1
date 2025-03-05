
<?php
$lugares = [
    ["nombre" => "Cuzco", "ubicacion" => "Sur", "costo" => 120, "imagen" => "CUZCO.jpg", "escudo" => "CUZCO_ESC.jpg"],
    ["nombre" => "Arequipa", "ubicacion" => "Sur", "costo" => 100, "imagen" => "AREQUIPA.jpg", "escudo" => "AREQUIPA_ESC.jpg"],
    ["nombre" => "Tacna", "ubicacion" => "Sur", "costo" => 90, "imagen" => "TACNA.jpg", "escudo" => "TACNA_ESC.jpg"],
    ["nombre" => "Moquegua", "ubicacion" => "Sur", "costo" => 85, "imagen" => "MOQUEGUA.jpg", "escudo" => "MOQUEGUA_ESC.jpg"],
    ["nombre" => "Ancash", "ubicacion" => "Norte", "costo" => 95, "imagen" => "ANCASH.jpg", "escudo" => "ANCASH_ESC.jpg"]
];
?>      
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
        /* Estilos básicos para presentación */
        .lugar { margin: 20px; padding: 10px; border: 1px solid #ccc; text-align: center; }
        .lugar img { width: 200px; height: 150px; }
        .lugar h2 { color: #333; }
    </style>
    </head>
    <body>
     <h1>Lugares Turísticos</h1>
    <?php foreach ($lugares as $lugar): ?>
        <div class="lugar">
            <h2><?php echo $lugar["nombre"]; ?></h2>
            <p>Ubicación: <?php echo $lugar["ubicacion"]; ?></p>
            <p>Costo: S/<?php echo $lugar["costo"]; ?></p>
            <img src="images/<?php echo $lugar["imagen"]; ?>" alt="<?php echo $lugar["nombre"]; ?>">
<p><a href="/tallerphp2/turismo/<?php echo $lugar["escudo"]; ?>" target="_blank">Ver escudo</a></p>
        </div>
    <?php endforeach; ?>

    </body>
</html>
