<?php
class ModeloRegistro {
    private $tuConexion;

    public function __construct($tuConexion) {
        $this->tuConexion = $tuConexion;
    }

    public function procesarRegistro($datosRegistro) {
        $nombreUsuario = $datosRegistro['nombre_usuario'];
        $contrasena = $datosRegistro['contrasena'];
        $correo = $datosRegistro['correo'];
        $telefono = $datosRegistro['telefono'];
        $direccion = $datosRegistro['direccion'];
        $rol = $datosRegistro['rol'];

        // Realizar la lógica de inserción en la base de datos
        $sqlUsusarios = "INSERT INTO usuarios (nombre_usuario, contrasena, correo, telefono, direccion, rol) VALUES (?, ?, ?, ?, ?, ?)";
        $stmtUsuarios = $this->tuConexion->prepare($sqlUsusarios);
         // Realizar la lógica de inserción en la base de datos
        if ($rol === 'cliente') {
            $sql = "INSERT INTO clientes (nombre, direccion, email) VALUES (?, ?, ?)";
            $stmt = $this->tuConexion->prepare($sql);
            // Verificar si la preparación fue exitosa
            if ($stmtUsuarios === false && $stmt === false) {
                return ['message' => 'Error al preparar la consulta: ' . $this->tuConexion->error];
            }
            // Vincular parámetros
            $stmt->bind_param("sss", $nombreUsuario, $direccion, $correo);
            // Vincular parámetros
            $stmtUsuarios->bind_param("ssssss", $nombreUsuario, $contrasena, $correo, $telefono, $direccion, $rol);

        } elseif ($rol === 'cultivador') {
            $sql = "INSERT INTO cultivadores (nombre, ubicacion, correo, telefono) VALUES (?, ?, ?, ?)";
            $stmt = $this->tuConexion->prepare($sql);
            // Verificar si la preparación fue exitosa
            if ($stmtUsuarios === false && $stmt === false) {
                return ['message' => 'Error al preparar la consulta: ' . $this->tuConexion->error];
            }
            // Vincular parámetros
            $stmt->bind_param("ssss", $nombreUsuario, $direccion, $correo, $telefono);
            // Vincular parámetros
            $stmtUsuarios->bind_param("ssssss", $nombreUsuario, $contrasena, $correo, $telefono, $direccion, $rol);
        
        } else {
            return ['message' => 'Rol no válido'];
        }
       
        
        // Verificar si la vinculación fue exitosa
        if ($stmt->execute() && $stmtUsuarios->execute()) {
            return ['message' => 'Registro exitoso'];
        } else {
            return ['message' => 'Error al registrar el usuario: ' . $stmt->error];
        }
    }
}
?>
