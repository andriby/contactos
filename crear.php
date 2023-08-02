<?php

    if(isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
    }
    if(isset($_POST['telefono'])){
        $telefono = $_POST['telefono'];
    }

    try {
        require_once('functions/db_conection.php');
        $sql = "INSERT INTO contactos (id, nombre, telefono)";
        $sql .= "VALUES (NULL, '{$nombre}', '{$telefono}');";

        $resultado = $conn->query($sql);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Agenda PHP</title>
</head>
<body>
    <div class="contenedor">
        <h1>Agenda de Contactos</h1>

      
        <?php 
            if($resultado) {
                echo "contacto creado";
            } else {
                echo "Error " . $conn->error;
            }
        ?>
        <br>
        <a href="index.php">Volver a inicio</a>
      

    </div>

    <?php
        $conn->close();
    ?>
</body>
</html>