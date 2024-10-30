<?php 

// Iniciamos la sesión para recuperar los mensajes
session_start();

// Guardamos los mensajes de error o éxito de la sesión (si existen) y luego los eliminamos
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';
unset($_SESSION['error']);
unset($_SESSION['success']);



 ?>

<!DOCTYPE html>
<html>
<head>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion | BarberTime</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="Scripts/index.js" defer></script>
    <script src="Scripts/js.js"></script>

    <link rel="stylesheet" type="text/css" href="CSS/login_barberia.css">
</head>
<body>


	<!-- Header con menú -->
    <header>
        <div class="logo">BarberTime</div>
        <nav class="navegacion">
            <ul>
                <li><a href="#home"></a></li>
                <li><a href="../OtraOpcion/inicio.php">Inicio</a></li>
                <li><a href="#servicios">¿Quienes Somos?</a></li>
                <li><a href="#contacto">Contactanos</a></li>
                <button class="btn">BarberTime</button>
            </ul>
        </nav>
        <!-- Icono de menú hamburguesa -->
        <div class="menu-icon">&#9776;</div>
    </header>

    <!-- Menú desplegable en pantallas pequeñas -->
    <div class="menu-overlay">
        <div class="menu-close">&times;</div>
        <ul>
            <li><a href="#home"></a></li>
            <li><a href="#info">Inicio</a></li>
            <li><a href="#servicios">Quienes Somos?</a></li>
            <li><a href="#contacto">Contactanos</a></li>
            <li><button class="btn">Iniciar Sesion</button></li>
        </ul>
    </div>


     <div  class="container" id="form-container"   >

        <div class="toggle-container">
        <button class="toggle-btn active" id="login-btn">Iniciar Sesión</button>
        <button class="toggle-btn" id="register-btn">Registrarse</button>
    </div>

<!-- Campos para login -->
    <div class="input-group active" id="login-group"   >
    <form id="login-form" action="login_register.php" method="POST" style="display: block;">
        <input type="hidden" name="action" value="login">
        
        <input type="email" id="email" name="email" required placeholder="Correo">
        
        <input type="password" id="password" name="password" required placeholder="Contraseña">
        <button class="btn-action" type="submit">Login</button>
    </form>
</div>

    <!-- Campos adicionales para registro -->
    <div class="input-group" id="register-group"   >
    <form id="register-form" action="login_register.php" method="POST" >
        <input type="hidden" name="action" value="register">
       
        <input type="text" id="nombre" name="nombre"  placeholder=" Nombre del Local" required>
       
        <input type="number" id="telefono" name="telefono"  placeholder="Numero de Telefono" required>
       
        <input type="email" id="email" name="email" required placeholder="Correo">
        
        <input type="password" id="password" name="password" required placeholder="Contraseña">
        <button class="btn-action" type="submit">Registrar</button>
    </form>
</div>

    </div>
    
      

  <script>
        var error = "<?php echo $error; ?>";
        var success = "<?php echo $success; ?>";
    </script> 


<script src="Scripts/js.js"></script>
    <script src="../OtraOpcion/inicio.js"></script>



</body>
</html>