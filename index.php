<?php
    try {
        require_once('functions/db_conection.php');
        $sql = 'SELECT * FROM contactos';
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
        <h2>Nuevo Contacto</h2>
        <form action="crear.php" method="post">

            <div class="campo">
                <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre">
            </div>

            <div class="campo">
                <label for="telefono">Telefono:</label>
                    <input type="text" id="telefono" name="telefono" placeholder="Telefono">
            </div>
            <button type="submit">Agregar</button>

        </form>
      </div>

      <div class="contenido existentes">
        <h2>Contactos creados</h2>
        <p>
            Numero de contactos: <?php echo $resultado->num_rows; ?>
        </p>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
                <tbody>
                    <?php 
                        While($registros = $resultado->fetch_assoc()){ ?>
                           <tr>
                            <td><?php echo $registros['nombre']; ?></td>
                            <td><?php echo $registros['telefono']; ?></td>
                            <td><a href="editar.php?id=<?php echo $registros['id']; ?>">Editar</a></td>
                            <td><a href="borrar.php?id=<?php echo $registros['id']; ?>" class="borrar">Borrar</a></td>
                           </tr>
                    <?php } ?>
                </tbody>
            </thead>
        </table>
      </div>
    </div>

    <?php
        $conn->close();
    ?>
</body>
</html>