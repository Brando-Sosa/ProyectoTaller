<?php
// Iniciar sesión si no está iniciada
session_start();

// Destruir la sesión para cerrar sesión
session_destroy();

// Redirigir a la página de inicio de sesión
header("Location: index.php");
exit;
?>
