<!DOCTYPE html>
<html>
    <head>
        <meta charset="windows-1252">
        <link rel="stylesheet" href="css/discografia.css" type="text/css" />
        <title>Busqueda canciones</title>
    </head>
    <body>
        <div align="center" id="disco">
            <h1>Busqueda de canciones</h1>
            <form name="busqueda" action="#" method="post">
                Texto a buscar: <input type="text" name="texto"><br><br>
                Buscar en: <input type="radio" name="cancion">Titulos de cancion <input type="radio" name="album">Titulos de album <input type="radio" name="ambos">Ambos <br><br>
                Genero musical: <select name="genero">
                    <option value="acustico">Acústico</option>
                    <option value="BSO">BSO</option>
                    <option value="blues">Blues</option>
                    <option value="folk">Folk</option>
                    <option value="jazz">Jazz</option>
                    <option value="new age">New Age</option>
                    <option value="pop">Pop</option>
                    <option value="rock">Rock</option>
                    <option value="electronica">Electrónica</option>
                </select><br><br>
                <input type="submit" value="Buscar">
                </select>
            </form>
            <?php
            try {
                $dwes = "mysql:host=localhost;dbname=discografia";
                $conexion = new PDO($dwes, 'Jorge', '9NY7m7b3QmGU8us9');
            } catch (PDOException $e) {
                echo $e->getMessage();
            }


            echo '<h2>Busquedas recientes</h2>';
            $busquedas = 0;

            if (isset($_COOKIE['cookie'])) {
                foreach ($_COOKIE['cookie'] as $value) {
                    $busquedas++;
                    echo $value . '<br>';
                }
            }

            if ($_POST) {
                setcookie("cookie[$busquedas]", $_POST['texto']);
                echo '<hr>';
                echo '<h2>Resultado de la busqueda</h2>';
                if (isset($_POST['album'])) {
                    $resultado = $conexion->query("SELECT A.titulo FROM album A WHERE A.titulo LIKE '%" . $_POST['texto'] . "%';");
                    while ($registro = $resultado->fetch()) {
                        echo $registro['titulo'] . '<br>';
                    }
                }
                if (isset($_POST['cancion'])) {
                    $resultado = $conexion->query("SELECT C.titulo FROM cancion C WHERE C.genero='" . $_POST['genero'] . "' AND C.titulo LIKE '%" . $_POST['texto'] . "%';");
                    while ($registro = $resultado->fetch()) {
                        echo $registro['titulo'] . '<br>';
                    }
                }
                if (isset($_POST['ambos'])) {
                    $resultado = $conexion->query("SELECT A.titulo FROM album A WHERE A.titulo LIKE '%" . $_POST['texto'] . "%' UNION SELECT C.titulo FROM cancion C WHERE C.genero='" . $_POST['genero'] . "' AND C.titulo LIKE '%" . $_POST['texto'] . "%';");
                    while ($registro = $resultado->fetch()) {
                        echo $registro['titulo'] . '<br>';
                    }
                }
            }
            ?>
        </div>
        <div id="volver"><a href="index.php">Volver al listado de albums</a></div>
    </body>
</html>
