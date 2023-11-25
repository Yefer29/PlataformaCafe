<?php
class ModeloInventario {
    private $tuConexion;

    public function __construct($tuConexion) {
        $this->tuConexion = $tuConexion;
    }

    public function procesarAgregarProducto($datosProducto) {
        $nombreProducto = $datosProducto['nombre_producto'];
        $stock = $datosProducto['stock'];
        $precioVenta = $datosProducto['precio_venta'];
        $detalles = $datosProducto['detalles'];
        $lote = $datosProducto['lote'];
        $fecha_vencimiento = $datosProducto['fecha_vencimiento'];
        $idCultivador = $_SESSION['idUsuario'];

        // Realizar la lógica de inserción en el inventario
        $sql = "INSERT INTO inventario ( lote, fecha_vencimiento, cantidad, id_cultivador) VALUES ( ?, ?, ?, ?)";
        $stmt = $this->tuConexion->prepare($sql);
        $sql_producto = "INSERT INTO producto (detalles, stock, precio_venta, nombre_producto) VALUES (?, ?, ?, ?)";
        $stmt_producto = $this->tuConexion->prepare($sql_producto);

        // Verificar si la preparación fue exitosa
        if ($stmt === false && $stmt_producto === false) {
            return ['message' => 'Error al preparar la consulta: ' . $this->tuConexion->error];
        }

        // Vincular parámetros
        $stmt->bind_param("sssi", $lote, $fecha_vencimiento, $stock, $idCultivador);
        $stmt_producto->bind_param("ssds", $detalles, $stock, $precioVenta, $nombreProducto);

        // Verificar si la vinculación fue exitosa
        if ($stmt->execute() && $stmt_producto->execute()) {
            return ['message' => 'Producto agregado al inventario con éxito'];
        } else {
            return ['message' => 'Error al agregar el producto al inventario: ' . $stmt->error];
        }
        // Verificar si la vinculación fue exitosa
        if ($stmt_producto->execute()) {
            return ['message' => 'Producto agregado con éxito'];
        } else {
            return ['message' => 'Error al agregar el producto al inventario: ' . $stmt->error];
        }
    }
    public function consultarProductos() {
        $sql_1 = "SELECT  nombre_producto, detalles, stock, precio_venta FROM producto";
        echo 'Consulta SQL: ' . $sql_1;  // Agrega esta línea para imprimir la consulta SQL
    
        $result_1 = $this->tuConexion->query($sql_1);

        // Verificar si la consulta fue exitosa
        if ($result_1) {
            $productos = $result_1->fetch_all(MYSQLI_ASSOC);
        return $productos;
        } else {
            return ['message' => 'Error al consultar productos: ' . $this->tuConexion->error];
        }

    }
    
}
?>
