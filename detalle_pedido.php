
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles de Pedidos</title>
</head>
<body>

<h2>Detalles de Pedidos</h2>
<!-- $conn = new mysqli('localhost', 'root', '', 'cafe_db'); -->
<table>
  <tr>
    <th>ID Pedido</th>
    <th>Nombre del Producto</th>
    <th>Cantidad</th>
    <th>Estado del Pedido</th>
    <th>tipo de Pago</th>
    <th>estadp del Pago</th>
    <th>estado del Pedido</th>
    <th>Fecha del Pago</th>
    <th>Fecha del Pedido</th>
    <th>Acciones</th>
  </tr>

  <!-- Aquí va el código para acceder a la base de datos y obtener los detalles de los pedidos -->
  <?php
    // Establecer conexión a la base de datos
    $conn = new mysqli('localhost', 'root', '', 'cafe_db');

    // Verificar conexión
    if ($conn->connect_error) {
      die("La conexión a la base de datos falló: " . $conn->connect_error);
    }
    $sql = "SELECT dp.id_pedido, pd.nombre_producto, dp.cantidad, dp.estado, pe.tipo_pago, p.estado, dp.estado, p.fecha_pago, pe.fecha
    FROM detalles_pedido dp
    JOIN pagos p ON dp.id_pedido = p.id_pedido
    JOIN pedido pe ON dp.id_pedido = pe.id_pedido
    JOIN producto pd ON dp.id_producto = pd.id_producto";

$result = $conn->query($sql);

  // Verificar si hay resultados en la consulta
  if ($result) {
    // Mostrar los detalles de los pedidos en la tabla
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_pedido"] . "</td>";
            echo "<td>" . $row["nombre_producto"] . "</td>";
            echo "<td>" . $row["cantidad"] . "</td>";
            echo "<td>" . $row["estado"] . "</td>";
            echo "<td>" . $row["tipo_pago"] . "</td>"; // Ahora esta clave debería estar disponible
            echo "<td>" . $row["estado"] . "</td>"; // Ahora esta clave debería estar disponible
            echo "<td>" . $row["estado"] . "</td>";
            echo "<td>" . $row["fecha_pago"] . "</td>";
            echo "<td>" . $row["fecha"] . "</td>";
            echo '<td><button>Contactar</button> <button>Consultar Guía</button></td>';
            echo "</tr>";
        }
    } else {
        echo "No se encontraron detalles de pedidos.";
    }
  } else {
  // Manejar el error de la consulta
  echo "Error en la consulta: " . $conn->error;
  }

    $conn->close();
  ?>
</table>
<a href="index.php">Volver al Inicio</a>
</body>
</html>
