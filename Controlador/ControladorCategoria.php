<?php

class ControladorCategoria {

    public function CategoriaMostrar($idperfil) {
        $bdcliente = new ClienteDAO();
        $bdcategoria = new CategoriaDAO();
        $perfilusuario = $bdcliente->ClienteBuscarID($idperfil);
        $mostrarinformacion = $bdcategoria->CategoriaMostrar();
        require_once 'Vista/html/categoria.php';
    }

    public function CategoriaAgregar($dato, $idperfil) {
        $bdcategoria = new CategoriaDAO();
        $cantidad = $bdcategoria->BuscarCategoria(strtoupper($dato));
        if ($cantidad != 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Producto ya registrado","warning");';
            echo '}, 1000);</script>';
        } else {
            $guardar = new Categoria(null, $dato);
            $bdcategoria->CategoriaGuardar($guardar);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Registrado","success");';
            echo '}, 1000);</script>';
        }
        $this->CategoriaMostrar($idperfil);
    }

    public function CategoriaActualizar($t_id, $dato, $datoviejo, $idperfil) {
        $bdcategoria = new CategoriaDAO();

        if ($dato != $datoviejo) {
            $cantidad = $bdcategoria->BuscarCategoria(strtoupper($dato));

            if ($cantidad != 0) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Producto ya registrado","warning");';
                echo '}, 1000);</script>';
            } else {
                $actualizar = new Categoria($t_id, $dato);
                $bdcategoria->CategoriaActualizar($actualizar);
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Dato Actualizado","success");';
                echo '}, 1000);</script>';
            }
        } else {
            $actualizar = new Categoria($t_id, $datoviejo);
            $bdcategoria->CategoriaActualizar($actualizar);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Actualizado","success");';
            echo '}, 1000);</script>';
        }

        $this->CategoriaMostrar($idperfil);
    }

    public function CategoriaEliminar($id, $idperfil) {
        $bdcategoria = new CategoriaDAO();
        $cantidad = $bdcategoria->CategoriaBuscarProducto($id);
        if ($cantidad != 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Contiene Registro en Producto","warning");';
            echo '}, 1000);</script>';
        } else {
            $bdcategoria->CategoriaEliminar($id);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Elminado","success");';
            echo '}, 1000);</script>';
        }
        $this->CategoriaMostrar($idperfil);
    }

}

?>