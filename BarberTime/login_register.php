	<?php
// Iniciamos la sesión para almacenar los mensajes
session_start();

// Incluimos la conexión a la base de datos
include('LOGIN/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    if ($action == 'register') {
        // Registro de usuario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Verificamos si el correo ya está registrado
        $check_email = "SELECT * FROM registro_usuarios WHERE email='$email'";
        $result = $conn->query($check_email);

        if ($result->num_rows > 0) {
            $_SESSION['error'] = "El correo ya está registrado. Inicia Sesion";
        } else {
            // Insertar nuevo usuario
            $sql = "INSERT INTO registro_usuarios (nombre, email, password) VALUES ('$nombre', '$email','$password')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['success'] = "Registro exitoso. Inicia Sesion";
                
            } else {
                $_SESSION['error'] = "Error al registrar: " . $conn->error;
            }
        }
    } elseif ($action == 'login') {
        // Login de usuario
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM registro_usuarios WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {   

                 // Guardar nombre y código en la sesión
                 $_SESSION['nombre'] = $row['nombre'];
                 $_SESSION['id'] = $row['id'];
                header("Location: LOGIN/LOGUEADO/principal.php");
    exit();
            } else {
                $_SESSION['error'] = "Contraseña incorrecta.";
            }
        } else {
            $_SESSION['error'] = "El correo no está registrado.";
        }
    }

    // Redirigimos de vuelta a index.php
    header("Location: OtraOpcion/inicio.php");
    exit();
}

// Cerrar conexión
$conn->close();
?>
