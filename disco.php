<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/discografia.css" type="text/css" />
        <title>Informacion del disco</title>
    </head>
    <body>
        <div id="disco">
        <?php
        $i = 0;
        try {
            $dwes = "mysql:host=localhost;dbname=discografia";
            $conexion = new PDO($dwes, 'Jorge', '9NY7m7b3QmGU8us9');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $resultado = $conexion->query('SELECT A.titulo, A.interprete, C.posicion , C.titulo, C.duracion FROM album A, cancion C WHERE A.codigo=C.album AND C.album=' . $_GET['cod'] . ' ORDER BY posicion;');
        while ($registro = $resultado->fetch()) {
            if ($i == 0) {
                echo '<h2>' . $registro[0] . ' - ' . $registro['interprete'] . ' <a href=borrarDisco.php?cod='.$_GET['cod'].'><img src="css/delete.png" alt="borrar" width="15px" height="15px"></a></h2>';
                $i++;
            }
            echo $registro['posicion'] . ' - ' . $registro['titulo'] . ' - ' . $registro['duracion'] . '<br>';
        }
        ?>            
        </div>
        <div id="volver"><a href="index.php">Volver al listado de albums</a></div>
    </body>
</html>
