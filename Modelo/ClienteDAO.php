<?php

class ClienteDAO {

    public function ClientesMostrar() {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM cliente WHERE c_rol != 1 ORDER BY c_id ASC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function ClienteLogin($usuario, $contrasena, $rol) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM cliente WHERE c_identificacion = '$usuario' AND c_contrasena = '$contrasena' AND c_rol = '$rol'";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function Contarusuario($identificacion, $rol) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM cliente WHERE c_identificacion = '$identificacion' AND c_rol = '$rol' ";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function ConsultarLogin($usu, $contr, $rol) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM cliente WHERE c_identificacion = '$usu' AND c_contrasena = '$contr' AND c_rol = '$rol'";
        $resultado = $conexion->consultarRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function ClienteBuscarID($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM cliente WHERE c_id = $id ";
        $resultado = $conexion->consultarRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function ClienteRegistrar(Cliente $dato) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $c_id = $dato->getC_id();
        $c_identificacion = $dato->getC_identificacion();
        $c_nombres = strtoupper($dato->getC_nombres());
        $c_apellidos = strtoupper($dato->getC_apellidos());
        $c_celular = $dato->getC_celular();
        $c_correo = strtolower($dato->getC_correo());
        $c_contrasena = $dato->getC_contrasena();
        $c_rol = $dato->getC_rol();
        $sql = "INSERT INTO cliente VALUES (null, '$c_identificacion', '$c_nombres','$c_apellidos', '$c_celular', '$c_correo', '$c_contrasena', '$c_rol'); ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function ClienteActualizar(Cliente $dato) {

        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $c_id = $dato->getC_id();
        $c_identificacion = $dato->getC_identificacion();
        $c_nombres = strtoupper($dato->getC_nombres());
        $c_apellidos = strtoupper($dato->getC_apellidos());
        $c_celular = $dato->getC_celular();
        $c_correo = strtolower($dato->getC_correo());
        $c_contrasena = $dato->getC_contrasena();
        $sql = "UPDATE cliente SET c_identificacion ='$c_identificacion', c_nombres='$c_nombres',c_apellidos='$c_apellidos', c_celular='$c_celular', c_correo = '$c_correo' , c_contrasena='$c_contrasena' WHERE c_id = $c_id ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }
    
        public function ClienteElimninar($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "DELETE FROM cliente WHERE c_id = $id ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

}

?>
