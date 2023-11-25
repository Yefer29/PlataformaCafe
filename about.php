<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito de Compras</title>
  <style>
    /* Estilos CSS, puedes personalizar según tus necesidades */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table, th, td {
      border: 1px solid black;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }
  </style>
</head>
<body>

<h2>Carrito de Compras</h2>

<table>
  <tr>
    <th>ID Producto</th>
    <th>Cantidad</th>
    <th>Precio Unitario</th>
    <th>Subtotal</th>
  </tr>

  <!-- Lógica PHP para acceder al carrito del usuario -->
  <?php
    // Establecer conexión a la base de datos
    $conn = new mysqli('localhost', 'root', '', 'cafe_db');

    // Verificar conexión
    if ($conn->connect_error) {
      die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    // Simulación de un ID de usuario (puedes obtenerlo según tu sistema de autenticación)
    $idUsuario = 1;

    // Consulta a la base de datos para obtener los productos del carrito del usuario
    $sql = "SELECT dc.id_detalle_carrito, dc.id_producto, dc.cantidad, dc.precio_unitario, dc.subtotal, p.nombre_producto
            FROM detalle_carrito dc
            INNER JOIN producto p ON dc.id_producto = p.id_producto
            WHERE dc.id_carrito = (SELECT id_carrito FROM carrito WHERE id_usuario = $idUsuario AND estado = 'pendiente')";

    $result = $conn->query($sql);

    // Mostrar productos en la tabla
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_producto"] . " - " . $row["nombre_producto"] . "</td>";
        echo "<td>" . $row["cantidad"] . "</td>";
        echo "<td>$" . $row["precio_unitario"] . "</td>";
        echo "<td>$" . $row["subtotal"] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "El carrito está vacío.";
    }
    $conn->close();
  ?>
</table>

<a href="index.php">Volver al Inicio</a>
</body>
</html>
