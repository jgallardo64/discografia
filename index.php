<!DOCTYPE html>
<html>
    <head>
        <meta charset="windows-1252">
        <title>Listado discos</title>
    </head>
    <body>
        <div align="center">
            <h1>Listado de albums</h1>
            <?php
            try {
                $dwes = "mysql:host=localhost;dbname=discografia";
                $conexion = new PDO($dwes, 'Jorge', '9NY7m7b3QmGU8us9');
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            $resultado = $conexion->query('SELECT A.codigo, A.titulo, A.interprete, (SELECT COUNT(C.titulo) FROM cancion C WHERE C.album = A.codigo) as canciones FROM album A;');
            while ($registro = $resultado->fetch()) {
                echo '<a href=disco.php?cod=' . $registro['codigo'] . '>' . $registro['titulo'] . '</a> - ' . $registro['interprete'] . ' - ' . $registro['canciones'] . ' canciones <a href=cancionNueva.php?cod=' . $registro['codigo'] . '> + Añadir canciones</a><br>';
            }
            ?>
            <br><a href="discoNuevo.php">Añadir nuevo album</a>
            <br><a href="canciones.php">Buscar canciones</a>
        </div>
    </body>
</html>
