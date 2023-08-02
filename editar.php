<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
    try {
        require_once('functions/db_conection.php');
        $sql = "SELECT * FROM contactos WHERE id = {$id}";
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
      <h1>Agenda de contactos</h1>  
      <div class="contenido">

        
        <h2>Editar Contacto</h2>
        <form action="actualizar.php" method="get">

            <?php while ($registros = $resultado->fetch_assoc() ) { ?>

                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" value="<?php echo $registros['nombre']; ?>" name="nombre" placeholder="Nombre">
                </div>

                <div class="campo">
                    <label for="telefono">Telefono:</label>
                    <input type="text" id="telefono" value="<?php echo $registros['telefono']; ?>" name="telefono" placeholder="Telefono">
                </div>
                <input type="hidden" name="id" value="<?php echo $registros['id']; ?>">
                <input type="submit" value="modificar"></input>

            <?php } ?>

        </form>

      </div>
    </div>

    <?php
        $conn->close();
    ?>
</body>
</html>