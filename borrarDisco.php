<?php

try {
    $dwes = "mysql:host=localhost;dbname=discografia";
    $conexion = new PDO($dwes, 'Jorge', '9NY7m7b3QmGU8us9');
} catch (PDOException $e) {
    echo $e->getMessage();
}

$ok = true;
$conexion->beginTransaction(); // Devuelve true o false, si cambia o no el modo
$consulta1 = $conexion->prepare('DELETE FROM cancion WHERE album=?;');
$consulta1->bindParam(1, $_GET['cod']);
$consulta2 = $conexion->prepare('DELETE FROM album WHERE codigo=?;');
$consulta2->bindParam(1, $_GET['cod']);

if ($consulta1->execute() == 0) {
    print_r($consulta1->errorInfo());
    $ok = false;
}
if ($consulta2->execute() == 0) {
    print_r($consulta2->errorInfo());
    $ok = false;
}
if ($ok) {
    $conexion->commit(); // Si todo fue bien, confirma los cambios
    header('Location: index.php');
} else {
    $conexion->rollback(); // y si no, los revierte
    header('Location: disco.php?cod='.$_GET['cod']);
}
// después de commit o rollback el SGBD vuelve al modo autocommit