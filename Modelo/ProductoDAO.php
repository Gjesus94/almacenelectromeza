<?php

class ProductoDAO {

    public function ProductoMostrar() {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM producto, categoria WHERE c_id = p_categoriaFK ORDER BY p_id ASC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function ProductoBuscarID($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM cursos WHERE cr_id = $id ";
        $resultado = $conexion->consultarRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function ProductoGuardar(Producto $dato) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();

        $p_id = $dato->getP_id();
        $p_codigo = strtoupper($dato->getP_codigo()); // strtoupper para converti todo en mayuscula
        $p_categoriaFK = strtoupper($dato->getP_categoriaFK());
        $p_nombre = strtoupper($dato->getP_nombre());
        $p_descripcion = $dato->getP_descripcion();
        $p_precio = $dato->getP_precio();
        $p_cantidad = $dato->getP_cantidad();
        $p_imagen = $dato->getP_imagen();

        $sql = "INSERT INTO producto VALUES (null, '$p_codigo', '$p_categoriaFK', '$p_nombre', '$p_descripcion', '$p_precio', '$p_cantidad', '$p_imagen')";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function ProductoActualizar(Producto $dato) {

        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $p_id = $dato->getP_id();
        $p_codigo = strtoupper($dato->getP_codigo());
        $p_categoriaFK = strtoupper($dato->getP_categoriaFK());
        $p_nombre = strtoupper($dato->getP_nombre());
        $p_descripcion = $dato->getP_descripcion();
        $p_precio = $dato->getP_precio();
        $p_cantidad = $dato->getP_cantidad();
        $p_imagen = $dato->getP_imagen();

        $sql = "UPDATE producto SET p_codigo= '$p_codigo', p_categoriaFK= '$p_categoriaFK', p_nombre= '$p_nombre', p_descripcion = '$p_descripcion', p_precio = '$p_precio', p_cantidad = '$p_cantidad', p_imagen = '$p_imagen' WHERE p_id = $p_id";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function ProductoActualizarVenta($id, $cantidad) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "UPDATE producto SET p_cantidad = '$cantidad' WHERE p_id = $id";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function ProductoElimninar($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "DELETE FROM producto WHERE p_id = $id ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function ContarCodigoProducto($codigo) { // contar para que el codigo no sea repetido
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM producto WHERE p_codigo = '$codigo';";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function ContarProductoVenta($id) { // contar en venta
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM venta WHERE v_productoFK = $id;";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

}

?>