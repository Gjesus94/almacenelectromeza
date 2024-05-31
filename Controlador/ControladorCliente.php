<?php

Class ControladorCliente {

    public function ClientesMostrar($idperfil) {
        $bdcliente = new ClienteDAO();
        $perfilusuario = $bdcliente->ClienteBuscarID($idperfil);
        $mostrarinformacion = $bdcliente->ClientesMostrar();
        require_once 'Vista/html/cliente.php';
    }

    public function ClientesReporte() {
        $bdcliente = new ClienteDAO();
        $mostrarinformacion = $bdcliente->ClientesMostrar();
        require_once 'Vista/html/reportecliente.php';
    }

    public function cargaInicio($id) {
        $bdcliente = new ClienteDAO();
        $perfilusuario = $bdcliente->ClienteBuscarID($id);
        require_once 'Vista/html/inicio.php';
    }

    public function Login($dni, $contrasena, $rol) {

        $bdcliente = new ClienteDAO();

        $cantidad = $bdcliente->ClienteLogin($dni, $contrasena, $rol);

        if ($cantidad == 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Cliente y Contrasena Incorrectos","warning");';
            echo '}, 1000);</script>';
            require_once 'Vista/html/index.php';
        } else {
            $buscar = $bdcliente->ConsultarLogin($dni, $contrasena, $rol);
            $perfild = $buscar->fetch(PDO::FETCH_ASSOC);
            $id = $perfild["c_id"];
            $_SESSION['permitido'] = true;
            $_SESSION['usuario'] = $id;
            $perfilusuario = $bdcliente->ClienteBuscarID($_SESSION['usuario']);
            require_once 'Vista/html/inicio.php';
            //}
        }
    }

    public function ClienteAgregar($c_identificacion, $c_nombres, $c_apellidos, $c_celular, $c_correo, $c_contrasena, $c_rol) {

        $bdcliente = new ClienteDAO();
        $cantidad = $bdcliente->Contarusuario($c_identificacion, $c_rol);
        if ($cantidad != 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "El No. de Identificación esta registrado","warning");';
            echo '}, 1000);</script>';
        } else {
            $guardar = new Cliente(null, $c_identificacion, $c_nombres, $c_apellidos, $c_celular, $c_correo, $c_contrasena, $c_rol);
            $bdcliente->ClienteRegistrar($guardar);
             echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Registrado, inicie sesion","success");';
            echo '}, 1000);</script>';
        }
        require_once 'Vista/html/index.php';
    }

    public function ClienteActualizar($c_id, $c_identificacion, $c_identificacionvieja, $c_nombres, $c_apellidos, $c_celular, $c_correo, $c_contrasena,$idperfil) {
        $bdcliente = new ClienteDAO();

        if ($c_identificacion == $c_identificacionvieja) {
            $guardar = new Cliente($c_id, $c_identificacionvieja, $c_nombres, $c_apellidos, $c_celular, $c_correo, $c_contrasena, null);
            $bdcliente->ClienteActualizar($guardar);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Actualizado","success");';
            echo '}, 1000);</script>';
        } else {
            $bdcliente = new ClienteDAO();
            $cantidad = $bdcliente->Contarusuario($c_identificacion, $c_rol);
            if ($cantidad != 0) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "El No. de Identificación esta registrado","warning");';
                echo '}, 1000);</script>';
            } else {
                $guardar = new Cliente($c_id, $c_identificacion, $c_nombres, $c_apellidos, $c_celular, $c_correo, $c_contrasena, null);
                $bdcliente->ClienteActualizar($guardar);
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Dato Actualizados con identificacion nueva","success");';
                echo '}, 1000);</script>';
            }
        }
        $this->cargaInicio($idperfil);
    }

}

?>
