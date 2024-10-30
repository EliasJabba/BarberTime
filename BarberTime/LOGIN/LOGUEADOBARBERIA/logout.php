<?php
session_start();
session_destroy(); // Destruye la sesión actual
header('Location: logueado_barberia.php'); // Redirige al login
exit();
?>