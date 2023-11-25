<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'ModeloInicioSesion.php';

class ControladorInicioSesion {
    private $modelo;

    public function __construct($modelo) {
        $this->modelo = $modelo;
    }

    public function iniciarSesion($nombreUsuario, $contrasena) {
        // Lógica adicional antes de llamar al modelo si es necesario
        return $this->modelo->iniciarSesion($nombreUsuario, $contrasena);
    }
}
?>

