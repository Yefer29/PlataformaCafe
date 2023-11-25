<?php
// Iniciar la sesión (debes hacerlo al principio de cada archivo PHP que utilice sesiones)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'ControladorInventario.php';
require_once 'ModeloInventario.php';

// Establecer conexión a la base de datos (reemplazar con tu conexión)
$tuConexion = new mysqli('localhost', 'root', '', 'cafe_db');

// Verificar conexión
if ($tuConexion->connect_error) {
    echo json_encode(['message' => 'Error de conexión a la base de datos']);
    exit;
}

// Crear instancias del modelo y del controlador pasando la conexión
$modeloInventario = new ModeloInventario($tuConexion);
$controladorInventario = new ControladorInventario($modeloInventario);

// Manejar la solicitud
if ($_SERVER['REQUEST_METHOD'] ) {
    // Verificar si el cultivador está autenticado
    if (isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] === 'cultivador') {
           // Procesar la solicitud para agregar un producto al inventario
            $datosProducto = [
                'nombre_producto' => $_POST['nombre_producto'],
                'stock' => $_POST['stock'],
                'precio_venta' => $_POST['precio_venta'],
                'detalles' => $_POST['detalles'],
                'lote' => $_POST['lote'],
                'fecha_vencimiento' => $_POST['fecha_vencimiento']
            ];
            
            // Mostrar el resultado
            echo '<p>' . $resultado['message'] . '</p>';
            $resultado = $controladorInventario->agregarProductoAlInventario($datosProducto);
            if (isset($productos['message'])) {
                echo '<p>Error al consultar productos: ' . $productos['message'] . '</p>';
            } else {
                echo '<pre>';
                print_r($productos);
                echo '</pre>';
            }
        
    } else {
        // Si es una solicitud GET, simplemente mostrar la vista de registro
        include 'vista_agregar_producto.php';
    }
}

// Cerrar la conexión a la base de datos
$tuConexion->close();
?>
