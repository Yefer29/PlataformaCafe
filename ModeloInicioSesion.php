<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ModeloInicioSesion {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function iniciarSesion($nombreUsuario, $contrasena) {
        try {
            // Verificar que la conexión no sea nula
            if ($this->conn === null|| $this->conn->connect_error) {
                throw new Exception('Error de conexión: ' . $this->conn->connect_error);
        
            }
            // Verificar si la conexión está cerrada antes de preparar la declaración
        if ($this->conn->connect_error) {
                throw new Exception('Error al reconectar: ' . $this->conn->connect_error);
            }

            // Consulta para obtener información del usuario
            $sql = "SELECT id, nombre_usuario, correo, telefono, direccion, rol FROM usuarios WHERE nombre_usuario = ? AND contrasena = ?";
            $stmt = $this->conn->prepare($sql);
            if (!$stmt) {
                // Manejar el error, por ejemplo:
                throw new Exception('Error al preparar la declaración: ' . $this->conn->error);
            }
            
            $stmt->bind_param('ss', $nombreUsuario, $contrasena);
            $stmt->execute();
            $result = $stmt->get_result();
// Ejecutar la sentencia
$stmt->execute();

            // Verificar si se encontró el usuario
            if ($result->num_rows > 0) {
                $usuario = $result->fetch_assoc();
                // Iniciar la sesión (puedes usar otras formas más seguras)
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
            
            // Almacenar información del usuario en la variable de sesión
            $_SESSION['idUsuario'] = $usuario['id'];
            $_SESSION['nombreUsuario'] = $usuario['nombre_usuario'];
            $_SESSION['rolUsuario'] = $usuario['rol'];
            $_SESSION['correoUsuario'] = $usuario['correo'];
            $_SESSION['telefonoUsuario'] = $usuario['telefono'];
            $_SESSION['direccionUsuario'] = $usuario['direccion'];
                return [
                    'message' => 'Inicio de sesión exitoso',
                    'usuario' => $usuario
                    
                ];
            

            } else {
                return ['message' => 'Credenciales incorrectas'];
            }
            
        } catch (Exception $e) {
            return ['message' => 'Error al iniciar sesión: ' . $e->getMessage()];
        }
    }
    

}
?>
