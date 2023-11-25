<?php
require_once 'ControladorInicioSesion.php';
require_once 'ModeloInicioSesion.php';

// Establecer conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'cafe_db');

// ...

// Verificar conexión
if ($conn->connect_error) {
    echo json_encode(['message' => 'Error de conexión a la base de datos']);
    exit;
}

// Crear instancias del modelo y del controlador pasando la conexión
$modeloInicioSesion = new ModeloInicioSesion($conn);
$controladorInicioSesion = new ControladorInicioSesion($modeloInicioSesion);

// Manejar la solicitud
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreUsuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    // Realizar la autenticación
    $resultado = $controladorInicioSesion->iniciarSesion($nombreUsuario, $contrasena);
// Verificar el resultado del inicio de sesión
if (isset($resultado['idUsuario'])) {
    // Inicio de sesión exitoso, redirigir al usuario a la página de ver perfil
    header("Location: modeloInventario.php");
    exit();
} else {
    // Si es una solicitud GET, simplemente mostrar la vista de inicio de sesión

    
}
    
} else {
    // Si es una solicitud GET, simplemente mostrar la vista de inicio de sesión
    include_once 'vista_inicio_sesion.php';
}

// No cierres la conexión aquí
// $conn->close();
?>
