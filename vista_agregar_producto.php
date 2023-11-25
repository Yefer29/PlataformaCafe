<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>Agregar Producto al Inventario</title>
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
    <h2>Agregar Producto al Inventario</h2>

    <!-- Formulario de agregar producto -->
    <form action="manejo_solicitudesAggInventario.php" method="post">
        <label for="nombre_producto">Nombre del Producto:</label>
        <input type="text" name="nombre_producto" required>
        <br>
        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['idUsuario']; ?>">
        <label for="detalles">Detalles del Producto:</label>
        <textarea name="detalles" rows="4" required></textarea>
        <br>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" required>
        <br>
        <label for="precio_venta">Precio de Venta:</label>
        <input type="number" step="0.01" name="precio_venta" required>
        <br>
        <label for="lote">Número de Lote:</label>
        <input type="text" name="lote" required>
        <br>
        <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
        <input type="date" name="fecha_vencimiento" required>
        <br>
        <input type="submit" value="Agregar Producto">
        
    </form>
</body>
</html>
