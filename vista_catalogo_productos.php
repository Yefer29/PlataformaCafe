<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
</head>
<body>
    <h2>Catálogo de Productos</h2>

    <?php
    // Verificar si hay productos para mostrar
    if (!empty($productos)) {
        foreach ($productos as $producto) {
            echo '<div>';
            echo '<h3>' . $producto['nombre_producto'] . '</h3>';
            echo '<p>Detalles: ' . $producto['detalles'] . '</p>';
            echo '<p>Stock: ' . $producto['stock'] . '</p>';
            echo '<p>Precio de Venta: ' . $producto['precio_venta'] . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>No hay productos disponibles en este momento.</p>';
    }
    ?>
</body>
</html>
