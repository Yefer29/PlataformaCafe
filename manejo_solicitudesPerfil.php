<?php
// Este archivo manejaría las solicitudes desde la vista

require_once 'ControladorVerPerfil.php';

// Establecer conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'cafe_db');

// Verificar conexión
if ($conn->connect_error) {
    echo json_encode(['message' => 'Error de conexión a la base de datos']);
    exit;
}

// Iniciar la sesión
session_start();

// Crear instancias del modelo y del controlador
$modeloVerPerfil = new ModeloVerPerfil($conn);
$controladorVerPerfil = new ControladorVerPerfil($modeloVerPerfil);

// Manejar la solicitud
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Verificar si la sesión está iniciada
    if (isset($_SESSION['idUsuario'])) {
        $idUsuario = $_SESSION['idUsuario'];
        $result = $controladorVerPerfil->obtenerPerfil($idUsuario);
        echo json_encode($result);
    } else {
        echo json_encode(['message' => 'Sesión no iniciada']);
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
