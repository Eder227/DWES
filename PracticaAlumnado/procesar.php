<?php
$conexion = new mysqli("localhost", "root", "", "alumnado");

if ($conexion->connect_error) {
    die("error en la conexion: " . $conexion->connect_error);
}

$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$nacimiento = $_GET['nacimiento'];
$curso = $_GET['curso'];
$email = $_GET['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$sql_check = "SELECT COUNT(*) as total FROM alumnado WHERE curso = '$curso'";
$resultado = $conexion->query($sql_check);
$fila = $resultado->fetch_assoc();

if ($fila['total'] >= 25) {
    echo "no se pueden matricular mms de 25 en $curso.";
} else {
    $sql = "INSERT INTO alumnado (nombre, apellido, nacimiento, curso, email, password) 
            VALUES ('$nombre', '$apellido', '$nacimiento', '$curso', '$email', '$password')";

    if ($conexion->query($sql) === TRUE) {
        echo "matriculado correctamente";
    } else {
        echo "error: " . $conexion->error;
    }
}

$conexion->close();
?>
