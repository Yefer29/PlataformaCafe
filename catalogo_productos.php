<?php
// Incluir archivos necesarios
require_once 'ControladorInventario.php';
require_once 'ModeloInventario.php';

// Crear instancias del modelo y del controlador pasando la conexión
$modeloInventario = new ModeloInventario($tuConexion);
$controladorInventario = new ControladorInventario($modeloInventario);

// Obtener la lista de productos
$productos = $controladorInventario->obtenerProductos();

// Incluir la vista de catálogo de productos
include 'vista_catalogo_productos.php';
?>
