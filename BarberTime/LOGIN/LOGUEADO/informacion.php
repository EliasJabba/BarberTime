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
	<title></title>
</head>
<body>

<h1>
	
 <?php 

    include '../conexion.php';
    // Consulta
$sql = "SELECT * FROM registro_barberias WHERE id =".$_GET['id'];
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

   
</div>

<?php 
 }
}
 ?>

</h1>


</body>
</html>