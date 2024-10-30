    <?php
// Iniciamos la sesión para almacenar los mensajes
session_start();

// Incluimos la conexión a la base de datos
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    if ($action == 'register') {
        // Registro de usuario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Verificamos si el correo ya está registrado
        $check_email = "SELECT * FROM registro_barberias WHERE email='$email'";
        $result = $conn->query($check_email);

        if ($result->num_rows > 0) {
            $_SESSION['error'] = "El correo ya está registrado. Inicia Sesion";
        } else {
            // Insertar nuevo usuario
            $sql = "INSERT INTO registro_barberias (nombre_local, email, telefono, passwords) VALUES ('$nombre', '$email', '$telefono', '$password')";
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

        $sql = "SELECT * FROM registro_barberias WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            var_dump($row['passwords']);
            

            if (password_verify($password, $row['passwords'])) {   
  // Verificar si los datos adicionales están completos
    if (empty($row['ciudad']) || empty($row['direccion'])) {

        $_SESSION['nombre'] = $row['nombre_local'];
                 $_SESSION['id'] = $row['id'];
                 
                 $_SESSION['error'] = "Se necesita completar todos los datos";

        // Redirigir a completar perfil si faltan datos
        header("Location: LOGUEADOBARBERIA/MisDatos.php");

    } else {
        $_SESSION['nombre'] = $row['nombre_local'];
                 $_SESSION['id'] = $row['id'];

        // Redirigir a la página de inicio si todo está completo
        header("Location: LOGUEADOBARBERIA/logueado_barberia.php");
    }
    exit();
  

                 
            } else {
                $_SESSION['error'] = "Contraseña incorrecta.";
                
            }
        } else {
            $_SESSION['error'] = "El correo no está registrado.";
        }
    }

    // Redirigimos de vuelta a index.php
    header("Location: Login_barberia.php");
    exit();
}

// Cerrar conexión
$conn->close();
?>
    