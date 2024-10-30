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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>BarberTime</title>
    <script src="../barbertime.js" defer></script>
    <link rel="stylesheet" href="inicio.css"> <!-- Enlace al archivo CSS -->
</head>
<body>

    <!-- Header con menú -->
    <header>
        <div class="logo">BarberTime</div>
        <nav class="navegacion">
            <ul>
                <li><a href="#home"></a></li>
                <li><a href="#">Inicio</a></li>
                <li><a href="#servicios">¿Quienes Somos?</a></li>
                <li><a href="#contacto">Contactanos</a></li>
                <button class="btn">Iniciar Sesion</button>
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


    <div class="fondo">

        <span class="icono-cerrar"><i class="fa-solid fa-xmark"></i></span>
        
        <div class="contenedor-form login">
            <h2>Iniciar sesión</h2>
            <form action="../login_register.php" method="POST">
                <input type="hidden" name="action" value="login">
                <div class="contenedor-input">
                    <span class="icono"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" id="email" name="email"  required>
                    <label for="email">Email</label>
                </div>
                    <div class="contenedor-input">
                    <span class="icono"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" id="password" name="password"  required>
                    <label for="password">Contraseña</label>
                </div>

                    <div class="recordar">
                        <a href="#">Olvidé la contraseña</a>
                    </div>
                    <div>
                        <button class="btn">Iniciar Sesión</button>
                    </div>
                    <div class="registrar">
                        <p>¿No tienes cuenta? <a href="#" class="registrar-link">Registrate</a></p>
                    </div>
                </div>
            </form>
        

        <div class="contenedor-form registrar">
            <h2> Registrarse</h2>

            <form action="../login_register.php" method="POST">
                <input type="hidden" name="action" value="register">

                <div class="contenedor-input">
                    <span class="icono"><i class="fa-solid fa-user"></i></span>
                    <input type="text" id="nombre" name="nombre"  required>
                    <label for="nombre">Nombre de Usuario</label>
                </div>

                

                <div class="contenedor-input">
                    <span class="icono"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" id="email" name="email"  required>
                    <label for="email">Email</label>
                </div>

                <div class="contenedor-input">
                    <span class="icono"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" id="password" name="password"  required>
                    <label for="password">Contraseña</label>
                </div>


                <button type="submit" class="btn">Registrarme</button>

                <div class="registrar">
                    <p>¿Tienes una cuenta? <a href="#" class="login-link">Iniciar Sesión</a> </p>               
                </div>

            </form>
            
        </div>

    </div>

    <div class="botones">

        <button class="btnm">Reserva aquí</button> 
        <button class="btnl"><a href="../LOGIN/Login_barberia.php">Ingresar como barberia</a></button>
        
    </div>


    

    <script>
        var error = "<?php echo $error; ?>";
        var success = "<?php echo $success; ?>";
    </script> 
  


    <script src="../LOGIN/Scripts/js.js"></script>
    <script src="inicio.js"></script>
</body>
</html>
