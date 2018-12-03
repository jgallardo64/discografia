<!DOCTYPE html>
<html>
    <head>
        <meta charset="windows-1252">
        <link rel="stylesheet" href="css/discografia.css" type="text/css" />
        <title>Nuevo album</title>
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
            $stmt = $conexion->prepare("INSERT INTO Album (codigo, titulo, discografica, formato, fechaLanzamiento, fechaCompra, precio) VALUES (?, ?, ?, ?, ?, ?, ?)");
            // Bind
            $codigo = $_POST['codigo'];
            $titulo = $_POST['titulo'];
            $discografica = $_POST['discografica'];
            $formato = $_POST['formato'];
            $fechaLanzamiento = $_POST['fechaLanzamiento'];
            $fechaCompra = $_POST['fechaCompra'];
            $precio = $_POST['precio'];
            $stmt->bindParam(1, $codigo);
            $stmt->bindParam(2, $titulo);
            $stmt->bindParam(3, $discografica);
            $stmt->bindParam(4, $formato);
            $stmt->bindParam(5, $fechaLanzamiento);
            $stmt->bindParam(6, $fechaCompra);
            $stmt->bindParam(7, $precio);
            // Excecute
            $stmt->execute();
        }
        ?>

        <h1>Insertar nuevo album</h1>
        <form name="album" action="#" method="post">
            <fieldset>
                <legend>Datos del album</legend>
                Codigo: <input type="number" name="codigo"><br><br>
                Titulo: <input type="text" name="titulo"><br><br>
                Discografica: <input type="text" name="discografica"><br><br>
                Formato: <select name="formato">
                    <option value="vinilo">Vinilo</option>
                    <option value="cd">CD</option>
                    <option value="dvd">DVD</option>
                    <option value="mp3">MP3</option>
                </select><br><br>
                Fecha de lanzamiento: <input type="date" name="fechaLanzamiento"><br><br>
                Fecha de compra: <input type="date" name="fechaCompra"><br><br>
                Precio: <input type="number" name="precio"><hr>
                <input type="submit" value="Insertar disco"><br>
            </fieldset>            
        </form>
        <br><a href="index.php">Volver al listado de discos</a>
        </div>
    </body>
</html>
