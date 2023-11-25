<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>Registro de Usuario</title>
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
    <h2>Registro de Usuario</h2>
    
    <!-- Formulario de registro -->
    <form action="manejo_solicitudes.php" method="post">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>
        <br>
        <label for="correo">Correo Electrónico:</label>
        <input type="email" name="correo" required>
        <br>
        <label for="telefono">Número de Teléfono:</label>
        <input type="tel" name="telefono" required>
        <br>
        <label for="direccion">Dirección:</label>
        <textarea name="direccion" rows="4" required></textarea>
        <br>
        <label for="rol">Tipo de Cuenta:</label>
        <select name="rol" required>
            <option value="administrador">Administrador</option>
            <option value="cultivador">Cultivador</option>
            <option value="cliente">Cliente</option>
        </select>
        <br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
