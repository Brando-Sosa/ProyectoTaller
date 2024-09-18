<?php
// Iniciar sesión si no está iniciada
session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: dashboard.php");
    exit;
}

// Definir credenciales de usuario (en un entorno real se obtendrían de una base de datos)
$correct_username = "admin";
$correct_password = "123456";

// Inicializar variables de error
$error = "";

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar si las credenciales son correctas
    if ($username == $correct_username && $password == $correct_password) {
        // Iniciar sesión: guardar datos en la sesión
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Redirigir a la segunda página
        header("Location: dashboard.php");
        exit;
    } else {
        // Mostrar error si las credenciales no son correctas
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio de Sesión</title>
    <style>
        /* Estilos básicos para el formulario de inicio de sesión */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-weight: bold;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .error {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Iniciar Sesión</h2>

    <!-- Mostrar mensaje de error si las credenciales son incorrectas -->
    <?php if ($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <!-- Formulario de inicio de sesión -->
    <form action="index.php" method="POST">
        <div class="input-group">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Iniciar Sesión</button>
    </form>
</div>

</body>
</html>
