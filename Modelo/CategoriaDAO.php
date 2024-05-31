<?php

class CategoriaDAO {

    public function CategoriaMostrar() {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM categoria ORDER BY c_id ASC";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function BuscarCategoria($dato) { // validar informacion
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM categoria WHERE c_categoria = '$dato'";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function CategoriaBuscarProducto($id) { // eliminar
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM producto WHERE p_categoriaFK  = $id ";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function CategoriaGuardar(Categoria $dato) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $c_id = $dato->getC_id();
        $c_categoria = strtoupper($dato->getC_categoria());
        $sql = "INSERT INTO categoria VALUES (null, '$c_categoria'); ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    
    public function CategoriaBuscarID($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM categoria WHERE c_id = $id ";
        $resultado = $conexion->consultarRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function CategoriaActualizar(Categoria $dato) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $c_id = $dato->getC_id();
        $c_categoria = strtoupper($dato->getC_categoria());
        $sql = "UPDATE categoria SET c_categoria = '$c_categoria' WHERE c_id = $c_id ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function CategoriaEliminar($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "DELETE FROM categoria WHERE c_id = $id ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

}
