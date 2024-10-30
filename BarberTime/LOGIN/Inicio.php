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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion | BarberTime</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="Scripts/index.js" defer></script>
    <script src="Scripts/js.js"></script>
    <link rel="stylesheet" type="text/css" href="CSS/inicio.css">
</head>
<body>
    

    
 
    <div  class="container" id="form-container"   >

    <br><br>
    <div class="toggle-container">
        <button class="toggle-btn active" id="login-btn">Iniciar Sesión</button>
        <button class="toggle-btn" id="register-btn">Registrarse</button>
    </div>

<!-- Campos para login -->    <div class="input-group active" id="login-group"   >
    <form id="login-form" action="login_register.php" method="POST" style="display: block;">
        <input type="hidden" name="action" value="login">
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required placeholder="Introduce tu correo">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required placeholder="Ingresa tu contraseña">
        <button class="btn-action" type="submit">Login</button>
    </form>
</div>

    <!-- Campos adicionales para registro -->
    <div class="input-group" id="register-group"   >
    <form id="register-form" action="login_register.php" method="POST" >
        <input type="hidden" name="action" value="register">
        <label for="nombre">Nombre Del Local:</label>
        <input type="text" id="nombre" name="nombre"  placeholder="Introduce tu nombre completo" required>
        <label for="nombre">Telefono:</label>
        <input type="number" id="telefono" name="telefono"  placeholder="Introduce un numero de telefono" required>
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required placeholder="Introduce tu correo">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required placeholder="Ingresa una contraseña">
        <button class="btn-action" type="submit">Registrar</button>
    </form>
</div>

    </div>
    
      

  <script>
        var error = "<?php echo $error; ?>";
        var success = "<?php echo $success; ?>";
    </script> 





</body>
</html>