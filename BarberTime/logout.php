<?php
session_start();
session_destroy(); // Destruye la sesión actual
header('Location: OtraOpcion/inicio.php'); // Redirige al login
exit();
?>