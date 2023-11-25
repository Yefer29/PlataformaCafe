<?php
require_once 'ModeloInventario.php';

class ControladorInventario {
    private $modeloInventario;
    public function obtenerProductos() {
        return $this->modeloInventario->consultarProductos();
    }

    public function __construct(ModeloInventario $modeloInventario) {
        $this->modeloInventario = $modeloInventario;
    }

    public function agregarProductoAlInventario($datosProducto) {
        return $this->modeloInventario->procesarAgregarProducto($datosProducto);
    }
}
?>
