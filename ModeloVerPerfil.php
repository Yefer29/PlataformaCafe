<?php
class ModeloVerPerfil {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerPerfil($idUsuario) {
        try {
            $idUsuario = $nombreUsuario = $rolUsuario = $correoUsuario = $telefonoUsuario = null;

            // Consulta para obtener información del usuario
            $sql = "SELECT id, nombre_usuario, rol, correo, telefono FROM usuarios WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('i', $idUsuario);
            $stmt->execute();
            $stmt->store_result();

            // Verificar si se encontró el usuario
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($idUsuario, $nombreUsuario, $rolUsuario, $correoUsuario, $telefonoUsuario);
                $stmt->fetch();

                return [
                    'idUsuario' => $idUsuario,
                    'nombreUsuario' => $nombreUsuario,
                    'rolUsuario' => $rolUsuario,
                    'correoUsuario' => $correoUsuario,
                    'telefonoUsuario' => $telefonoUsuario
                ];
            } else {
                return ['message' => 'Usuario no encontrado'];
            }
        } catch (Exception $e) {
            return ['message' => 'Error al obtener el perfil: ' . $e->getMessage()];
        }
    }
}
?>
