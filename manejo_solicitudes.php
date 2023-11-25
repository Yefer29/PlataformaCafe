<?php
session_start();
require_once 'ControladorRegistro.php';
require_once 'ModeloRegistro.php';

// Establecer conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'cafe_db');

// Verificar conexión
if ($conn->connect_error) {
    echo json_encode(['message' => 'Error de conexión a la base de datos']);
    exit;
}

// Crear instancias del modelo y del controlador pasando la conexión
$modeloRegistro = new ModeloRegistro($conn);
$controladorRegistro = new ControladorRegistro($modeloRegistro);

// Manejar la solicitud
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datosRegistro = [
        'nombre_usuario' => $_POST['nombre_usuario'],
        'contrasena' => $_POST['contrasena'],
        'correo' => $_POST['correo'],
        'telefono' => $_POST['telefono'],
        'direccion' => $_POST['direccion'],
        'rol' => $_POST['rol']
    ];

    // Realizar el registro
    $resultado = $controladorRegistro->registrarUsuario($datosRegistro);

    // Mostrar el resultado
    echo '<p>' . $resultado['message'] . '</p>';
} else {
    // Si es una solicitud GET, simplemente mostrar la vista de registro
    include 'vista_registro.php';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
