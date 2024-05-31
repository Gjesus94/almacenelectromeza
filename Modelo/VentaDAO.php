<?php

class VentaDAO {

    public function VentaMostrar() {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT v_factura, SUM(v_total) AS v_total, v_estado, v_fecha, v_hora, c_identificacion, c_nombres, c_apellidos, p_nombre FROM venta, cliente, producto WHERE v_clienteFK = c_id AND v_productoFK = p_id AND v_estado != 0 GROUP BY v_factura ORDER BY v_id DESC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }
    
      public function VentaFactura($factura) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM venta, producto, cliente WHERE v_clienteFK = c_id AND v_productoFK = p_id AND v_factura = '$factura' ORDER BY v_id ASC;"; // estado = 0 esta en carrito
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function VentaMostrarCarrito($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM venta, producto, cliente WHERE v_clienteFK = '$id' AND c_id = '$id' AND v_productoFK = p_id AND v_estado = 0 ORDER BY v_id ASC;"; // estado = 0 esta en carrito
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }
    
      public function VentaMostrarMisCompras($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT v_factura, SUM(v_total) AS v_total, v_estado, v_fecha, v_hora FROM venta WHERE v_clienteFK = '$id' AND v_estado != 0 GROUP BY v_factura ORDER BY v_id DESC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }
    
    

    public function VentaBuscarID($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM venta WHERE v_id = $id ";
        $resultado = $conexion->consultarRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function VentaGuardar(Venta $dato) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $v_id = $dato->getV_id();
        $v_clienteFK = $dato->getV_clienteFK();
        $v_productoFK = $dato->getV_productoFK();
        $v_cantidad = $dato->getV_cantidad();
        $v_precio = $dato->getV_precio();
        $v_total = $dato->getV_total();
        $v_estado = $dato->getV_estado();
        $v_factura = $dato->getV_factura();
        $v_fecha = $dato->getV_fecha();
        $v_hora = $dato->getV_hora();
        $sql = "INSERT INTO venta VALUES (null, '$v_clienteFK', '$v_productoFK', '$v_cantidad', '$v_precio', '$v_total', '$v_estado', '$v_factura', '$v_fecha', '$v_hora')";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function VentaActualizarFactura($v_clienteFK, $v_factura, $v_fecha, $v_hora) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "UPDATE venta SET v_factura = '$v_factura', v_fecha = '$v_fecha', v_hora = '$v_hora', v_estado = 1 WHERE v_clienteFK = '$v_clienteFK' AND v_estado = 0"; // estado 1 fatcurda
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function VentaActualizarProceso($factura, $estado) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "UPDATE venta SET v_estado = '$estado' WHERE v_factura = '$factura'"; // estado 1 fatcurda
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    function VentaElimninar($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "DELETE FROM venta WHERE v_id = $id "; // eliminar del carrito
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

}

?>