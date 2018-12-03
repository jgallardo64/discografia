<!DOCTYPE html>
<html>
    <head>
        <meta charset="windows-1252">
        <link rel="stylesheet" href="css/discografia.css" type="text/css" />
        <title>Nueva canción</title>
    </head>
    <body>
        <div align="center">
        <?php
        try {
            $dwes = "mysql:host=localhost;dbname=discografia";
            $conexion = new PDO($dwes, 'Jorge', '9NY7m7b3QmGU8us9');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        if ($_POST) {
            // Prepare
            $stmt = $conexion->prepare("INSERT INTO Cancion (titulo, album, posicion, duracion, genero) VALUES (?, ?, ?, ?, ?)");
            // Bind
            $titulo = $_POST['titulo'];
            $album = $_GET['cod'];
            $posicion = $_POST['posicion'];
            $duracion = $_POST['duracion'];
            $genero = $_POST['genero'];
            $stmt->bindParam(1, $titulo);
            $stmt->bindParam(2, $album);
            $stmt->bindParam(3, $posicion);
            $stmt->bindParam(4, $duracion);
            $stmt->bindParam(5, $genero);
            // Excecute
            $stmt->execute();
        }
        
        //Añadiendo cambios para Git
            //Añadiendo mas cambios para Git
        ?>
        <h1>Insertar nuevas canciones</h1>
        <form name="canciones" action="#" method="post">                    
            <fieldset>
                <legend>Datos de la canción</legend>
                    Titulo: <input type="text" name="titulo"><br><br>
                    Posicion: <input type="number" name="posicion"><br><br>
                    Duracion: <input type="time" step="1" name="duracion"><br><br>
                    Genero: <select name="genero">
                        <option value="acustico">Acústico</option>
                        <option value="BSO">BSO</option>
                        <option value="blues">Blues</option>
                        <option value="folk">Folk</option>
                        <option value="jazz">Jazz</option>
                        <option value="new age">New Age</option>
                        <option value="pop">Pop</option>
                        <option value="rock">Rock</option>
                        <option value="electronica">Electrónica</option>
                    </select><hr>
                    <input type="submit" value="Insertar canción"><br>
            </fieldset>            
        </form>
        <br><a href="index.php">Volver al listado de albums</a>
        </div>
    </body>
</html>
