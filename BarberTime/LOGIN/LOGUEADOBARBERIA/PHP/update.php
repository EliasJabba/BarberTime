<?php
session_start();
include('../../conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['id'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];

    
    $descripcion = $_POST['descripcion'];

    // Actualizar los datos en la base de datos
    $sql = "UPDATE registro_barberias SET ciudad='$ciudad', direccion = '$direccion', descripcion = '$descripcion'     WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: LOGUEADOBARBERIA/logueado_barberia.php"); // Redirigir al inicio después de completar perfil
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }
}

$conn->close();
?>