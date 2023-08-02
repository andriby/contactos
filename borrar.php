<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    try {
        require_once('functions/db_conection.php');
        $sql = "DELETE FROM contactos WHERE id = '{$id}'";
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
                echo "contacto borrado";
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