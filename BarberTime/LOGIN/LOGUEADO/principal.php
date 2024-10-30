<?php
session_start();

// Verificar si el usuario está logueado
if (isset($_SESSION['nombre']) && isset($_SESSION['id'])) {
    
} else {
    // Si no está logueado, redirigir al login
   header('Location: ../../OtraOpcion/inicio.php'); // Redirige al login;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<title>Inicio |  BarberTime</title>
    
    <link rel="stylesheet" href="logueados.css"> <!-- Enlace al archivo CSS -->
</head>
<body>

    <!-- Header con menú -->
    <header>
        <div class="logo">BarberTime</div>
        <nav class="navegacion">
            <ul>
                <li><a href="#home">Inicio</a></li>
                <li><a href="#info">Mis Datos</a></li>
                <li><a href="#servicios">Mis Reservas</a></li>
                <li><a href="#contacto">Favoritos</a></li>
                <li><a href="../../logout.php">Cerrar sesión</a></li>
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
            <li><a href="#servicios">Mis Reservas</a></li>
            <li><a href="#contacto">Favoritos</a></li>
            <li><a href="../../logout.php">Cerrar sesión</a></li>
        </ul>
    </div>


<div class="buscador">
    <i class="fa-solid fa-magnifying-glass"></i>
   <input type="search" name="buscador" placeholder="¿En donde te encuentras?">

   <button  class="botonn">Buscar</button>
    
</div>

 <?php 

    include '../conexion.php';
    // Consulta
$sql = "SELECT * FROM registro_barberias";
$result = $conn->query($sql);

// Mostrar resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>

<div class="barberia">

    

        <img class="fbarber" src="images/barberia.jpg">

    <span><h2><?php echo $row['nombre_local']; ?></h2></span>
    <p>Calificacion</p>
    <p>Zambrano</p>

   <button class="reserva"><a href="informacion.php?id=<?php echo $row['id'] ?>">Reservar</a></button>
   
</div>

<?php 
 }
}
 ?>



<script src="../../LOGIN/Scripts/js.js"></script>
    <script src="../../OtraOpcion/inicio.js"></script>

</body>
</html>