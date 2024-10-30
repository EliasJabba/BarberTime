<?php
// conexion.php
$servername = "localhost";
$username = "root";  // Cambia esto si tienes credenciales diferentes
$password = "";      // Cambia esto si tienes una contraseña
$dbname = "BarberTime";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
