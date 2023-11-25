<!-- perfil.html -->

<!DOCTYPE html>
<html lang="es">
<head>
    
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles2.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>Ver Perfil</title>
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
    <h1>Perfil de Usuario</h1>
    <div id="perfil-info">
        <!-- Aquí se mostrará la información del perfil mediante JavaScript -->
    </div>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
         
             <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">cafe a tu mesa</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="index.php">Inicio</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="detalle_pedido.php">mis pedidos</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="vista_agregar_producto.php">agregar producto</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="vista_registro.php">registrar</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="cerrar_sesion.php">cerrar sesion</a></li>
                    </ul>
                </div>
            </div>
        <nav>
    <?php
    // Inicia la sesión si no está iniciada
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
        // Verificar si la sesión está iniciada
    if (!isset($_SESSION['idUsuario'])) {
        // Redirigir a la página de inicio de sesión si no hay sesión iniciada
        header('Location: vista_inicio_sesion.php');
        exit();
    }
        
    ?>
    <h2>Usuario</h2>
    <table border="1">
    <tr>
        <th>Nombre de Usuario</th>
        <th>Rol del Usuario</th>
        <th>Correo</th>
        <th>Teléfono</th>
    </tr>

    <tr>
        <td><?php echo $_SESSION['nombreUsuario']; ?></td>
        <td><?php echo $_SESSION['rolUsuario']; ?></td>
        <td><?php echo $_SESSION['correoUsuario']; ?></td>
        <td><?php echo $_SESSION['telefonoUsuario']; ?></td>
    </tr>
</table>
</body>
</html>
