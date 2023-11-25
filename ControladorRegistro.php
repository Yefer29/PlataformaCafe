<?php
require_once 'ModeloRegistro.php';

class ControladorRegistro {
    private $modeloRegistro;

    public function __construct(ModeloRegistro $modeloRegistro) {
        $this->modeloRegistro = $modeloRegistro;
    }

    public function registrarUsuario($datosRegistro) {
        // Llamar al modelo para procesar el registro
        return $this->modeloRegistro->procesarRegistro($datosRegistro);
    }
}
?>
