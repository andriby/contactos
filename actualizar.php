<?php

    if(isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
    }
    if(isset($_GET['telefono'])){
        $telefono = $_GET['telefono'];
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    try {
        require_once('functions/db_conection.php');
        $sql = "UPDATE contactos SET ";
        $sql .= "nombre = '{$nombre}', ";
        $sql .= "telefono = '{$telefono}' ";
        $sql .= "WHERE id = '{$id}' ";
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
                echo "contacto modificado";
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