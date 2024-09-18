<?php
// Iniciar sesión si no está iniciada
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página en Blanco</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .content {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="content">
    <h2>Bienvenido, <?= $_SESSION['username']; ?>!</h2>
    <p>Esta es tu página en blanco.</p>
    <p><a href="logout.php">Cerrar Sesión</a></p>
</div>

</body>
</html>
