<?php
require_once 'ModeloVerPerfil.php';

class ControladorVerPerfil {
    private $modelo;

    public function __construct($modelo) {
        $this->modelo = $modelo;
    }

    public function obtenerPerfil($idUsuario) {
        // Lógica adicional antes de llamar al modelo si es necesario
        return $this->modelo->obtenerPerfil($idUsuario);
    }
}
?>

