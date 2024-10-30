<?php
session_start();

// Verificar si el usuario está logueado
if (isset($_SESSION['nombre']) && isset($_SESSION['id'])) {

if (isset($_SESSION['error'])){
   echo "<script>alert('Debemos completar todos los datos');</script>";
}

    
} else {
    // Si no está logueado, redirigir al login
   header('Location: ../Login_barberia.php'); // Redirige al login;
}

// Conectar a la base de datos
include('../conexion.php');

// Obtener el ID del usuario que inició sesión (suponiendo que está en la sesión)

$id_usuario = $_SESSION['id'];

// Consultar los datos del usuario desde la base de datos
$sql = "SELECT nombre_local, telefono, email, ciudad, direccion, descripcion FROM registro_barberias WHERE id='$id_usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener los datos del usuario
    $row = $result->fetch_assoc();
    $nombre = $row['nombre_local'];
    $telefono = $row['telefono'];
    $email = $row['email'];
    $ciudad = $row['ciudad'];
    $direccion = $row['direccion'];
    $descripcion = $row['descripcion'];
} else {
    // Si no se encontraron datos, inicializar variables vacías
    $nombre = $telefono = $email =  $ciudad = $direccion = $descripcion = '';
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<title>Mis Datos |  BarberTime</title>
    
    <link rel="stylesheet" href="CSS/logueado_barberia.css"> <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="CSS/misdatos.css"> <!-- Enlace al archivo CSS -->
</head>
<body>

	<!-- Header con menú -->
    <header>
        <div class="logo">BarberTime</div>
        <nav class="navegacion">
            <ul>
                <li><a href="#home">Inicio</a></li>
                <li><a href="MisDatos.php">Mis Datos</a></li>
                <li><a href="#contacto">Catalogo</a></li>
                <li><a href="#servicios">Mis Reservas</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
        <!-- Icono de menú hamburguesa -->
        <div class="menu-icon">&#9776;</div>
    </header>

    <!-- Menú desplegable en pantallas pequeñas -->
    <div class="menu-overlay">
        <div class="menu-close">&times;</div>
        <ul>
            <li><a href="#home">Inicio</a></li>
            <li><a href="#info">Mis Datos</a></li>
            <li><a href="#contacto">Catalogo</a></li>
            <li><a href="#servicios">Mis Reservas</a></li>
            <li><a href="logout.php">Cerrar sesión</a></li>
        </ul>
    </div>



    <div class="formulario">

    		<h2>Mis Datos</h2>

    		<form action="PHP/update.php" method="POST">



            <input type="text" name="nombre_local" value="<?php echo $nombre; ?>" disabled class="ingresar" >
            <input type="text" name="telefono" value="<?php echo $telefono ?>" disabled class="ingresar" >
            <input type="text" name="email" value="<?php echo $email ?>" disabled class="ingresar" >



    		<input type="Text" id="ciudad" name="ciudad" value="<?php echo $ciudad ?>" required placeholder="Ingresa tu ciudad" class="ingresar" required>

    		<input type="Text" id="direccion" name="direccion" value="<?php echo $direccion ?>" required placeholder="Ingresa tu Dirección" class="ingresars" required>

    		


            <textarea id="descripcion" name="descripcion"  placeholder="Ingresa una descripcion de tu Barberia" required><?php echo $descripcion ?></textarea>


            <button> Guardar</button>


    		</form>
    	
    </div>





<script src="../LOGIN/Scripts/js.js"></script>
    <script src="../../OtraOpcion/inicio.js"></script>


</body>
</html>