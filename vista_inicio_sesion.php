<?php
  // Importar la conexión a la base de datos
  if (!isset($conn)) {
    require_once 'manejo_solicitudesInicioSesion.php';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: rgba(230, 167, 86, 0.9);
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        hr {
            margin-top: 40px;
            margin-bottom: 20px;
            border: 0;
            border-top: 2px solid #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: rgba(230, 167, 86, 0.9);
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .inventario-registrado {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    
    <?php
  

  // Inicia la sesión si no está iniciada
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    // Verificar si la sesión está iniciada
if (isset($_SESSION['idUsuario'])) {
    // Redirigir a la página de inicio de sesión si no hay sesión iniciada
    header('Location: vista_del_perfil.php');
    exit();
}
    // Manejar el formulario de inicio de sesión solo si es una solicitud POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Supongamos que estás utilizando un formulario con campos 'nombre_usuario' y 'contrasena'
        $nombreUsuario = $_POST['nombre_usuario'];
        $contrasena = $_POST['contrasena'];

        // Llamar al controlador y modelo de inicio de sesión
        require_once 'ControladorInicioSesion.php';
        require_once 'ModeloInicioSesion.php';

        $modeloInicioSesion = new ModeloInicioSesion($conn); // Reemplaza con tu conexión
        $controladorInicioSesion = new ControladorInicioSesion($modeloInicioSesion);

        // Realizar la autenticación
        $resultado = $controladorInicioSesion->iniciarSesion($nombreUsuario, $contrasena);


    }
    ?>

    <!-- Formulario de inicio de sesión -->
    <form action="vista_inicio_sesion.php" method="post">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>
        <br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>

