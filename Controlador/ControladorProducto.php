<?php

Class ControladorProducto {

    // PRODUCTOS
    
        public function ProductoCatalogo() {
        $bdproducto = new ProductoDAO();
        $bdcategoria = new CategoriaDAO();
        $mostrarinformacion = $bdproducto->ProductoMostrar();
        require_once 'Vista/html/catalogo.php';
    }
    
    public function ProductoMostrar($idperfil) {
        $bdcliente = new ClienteDAO();
        $bdproducto = new ProductoDAO();
        $bdcategoria = new CategoriaDAO();
        $perfilusuario = $bdcliente->ClienteBuscarID($idperfil);
        $mostrarinformacion = $bdproducto->ProductoMostrar();
        $mostrarcategoria = $bdcategoria->CategoriaMostrar();
        require_once 'Vista/html/productos.php';
    }
    
  

    public function ProductoMostrarCatalogo($idperfil) {
        $bdcliente = new ClienteDAO();
        $bdproducto = new ProductoDAO();
        $bdcategoria = new CategoriaDAO();
        $perfilusuario = $bdcliente->ClienteBuscarID($idperfil);
        $mostrarinformacion = $bdproducto->ProductoMostrar();
        $mostrarcategoria = $bdcategoria->CategoriaMostrar();
        require_once 'Vista/html/productocatalogo.php';
    }

    public function ProductoReporte() {
        $bdproducto = new ProductoDAO();
        $mostrarinformacion = $bdproducto->ProductoMostrar();
        require_once 'Vista/html/reporteproducto.php';
    }


    public function ProductoAgregar($p_codigo, $p_categoriaFK, $p_nombre, $p_descripcion, $p_precio, $p_cantidad, $idperfil) {
        $bdproducto = new ProductoDAO();
        date_default_timezone_set('America/Bogota');
        $hora = date("His");
        $fecha = date("Ymd");
        $url = "/tiendaventa/producto/";

        $cantidad = $bdproducto->ContarCodigoProducto(strtoupper($p_codigo));
        if ($cantidad != 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Ya esta registrado este codigo","warning");';
            echo '}, 1000);</script>';
        } else {

            $servidor = $_SERVER['DOCUMENT_ROOT'] . $url;
            $foto = $_FILES['foto']['name'];
            $extension = pathinfo($foto, PATHINFO_EXTENSION);
            $nombre_foto = "PRODUCTO" . $fecha . "F" . $hora . "." . $extension;
            $destino = $servidor . $nombre_foto; //RUTA DONDE SE ALAMCENA 
            $ruta = $_FILES['foto']['tmp_name'];
            $urlBD = $url . $nombre_foto;

            $producto = new Producto(null, $p_codigo, $p_categoriaFK, $p_nombre, $p_descripcion, $p_precio, $p_cantidad, $urlBD);
            $bdproducto->ProductoGuardar($producto);
            copy($ruta, $destino);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Registrado","success");';
            echo '}, 1000);</script>';
        }
        $this->ProductoMostrar($idperfil);
    }

    public function ProductoActualizar($p_id, $p_codigo, $p_codigoviejo, $p_categoriaFK, $p_nombre, $p_descripcion, $p_precio, $p_cantidad, $fotovieja, $idperfil) {

        $bdproducto = new ProductoDAO();
        date_default_timezone_set('America/Bogota');
        $hora = date("His");
        $fecha = date("Ymd");
        $url = "/tiendaventa/producto/";
        $servidor = $_SERVER['DOCUMENT_ROOT'] . $url;

        $foto = $_FILES['foto']['name'];
        $extension = pathinfo($foto, PATHINFO_EXTENSION);
        $validar = 0;
        if ($p_codigo != $p_codigoviejo && $foto != "") {
            $validar = 1; // actualizamos solo el codigo y la imagen
        } elseif ($p_codigo != $p_codigoviejo && $foto == "") {
            $validar = 2; // actualizamos solo el codigo
        } elseif ($p_codigo == $p_codigoviejo && $foto != "") {
            $validar = 3; // actualizamos solo la imagen
        } elseif ($p_codigo == $p_codigoviejo && $foto == "") {
            $validar = 4; // actualizamos datos normales
        }
        $cantidad = $bdproducto->ContarCodigoProducto(strtoupper($p_codigo));

        if ($validar == 1) {
            if ($cantidad != 0) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Ya esta registrado este codigo","warning");';
                echo '}, 1000);</script>';
            } else {
                $extension = pathinfo($foto, PATHINFO_EXTENSION);
                $nombre_foto = "PRODUCTO" . $fecha . "F" . $hora . "." . $extension;
                $destino = $servidor . $nombre_foto; //RUTA DONDE SE ALAMCENA 
                $ruta = $_FILES['foto']['tmp_name'];
                $urlBD = $url . $nombre_foto;
                $producto = new Producto($p_id, $p_codigo, $p_categoriaFK, $p_nombre, $p_descripcion, $p_precio, $p_cantidad, $urlBD);
                $bdproducto->ProductoActualizar($producto);
                copy($ruta, $destino);
                if ($fotovieja == "") {
                    
                } else {
                    $borrarimagen = $_SERVER['DOCUMENT_ROOT'] . $fotovieja;
                    unlink($borrarimagen);
                }
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Dato Actualizado con codigo/imagen Nuevo","success");';
                echo '}, 1000);</script>';
            }
        } elseif ($validar == 2) {

            if ($cantidad != 0) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Ya esta registrado este codigo","warning");';
                echo '}, 1000);</script>';
            } else {
                $producto = new Producto($p_id, $p_codigo, $p_categoriaFK, $p_nombre, $p_descripcion, $p_precio, $p_cantidad, $fotovieja);
                $bdproducto->ProductoActualizar($producto);
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Dato Actualizado con codigo Nuevo","success");';
                echo '}, 1000);</script>';
            }
        } elseif ($validar == 3) {

            $extension = pathinfo($foto, PATHINFO_EXTENSION);
            $nombre_foto = "PRODUCTO" . $fecha . "F" . $hora . "." . $extension;
            $destino = $servidor . $nombre_foto; //RUTA DONDE SE ALAMCENA 
            $ruta = $_FILES['foto']['tmp_name'];
            $urlBD = $url . $nombre_foto;
            $producto = new Producto($p_id, $p_codigoviejo, $p_categoriaFK, $p_nombre, $p_descripcion, $p_precio, $p_cantidad, $urlBD);
            $bdproducto->ProductoActualizar($producto);
            copy($ruta, $destino);
            if ($fotovieja == "") {
                
            } else {
                $borrarimagen = $_SERVER['DOCUMENT_ROOT'] . $fotovieja;
                unlink($borrarimagen);
            }
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Actualizado con imagen Nueva","success");';
            echo '}, 1000);</script>';
        } elseif ($validar == 4) {

            $producto = new Producto($p_id, $p_codigoviejo, $p_categoriaFK, $p_nombre, $p_descripcion, $p_precio, $p_cantidad, $fotovieja);
            $bdproducto->ProductoActualizar($producto);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Actualizado Normal","success");';
            echo '}, 1000);</script>';
        }


        $this->ProductoMostrar($idperfil);
    }

    public function ProductoEliminar($id, $foto, $idperfil) {
        $bdproducto = new ProductoDAO();
        $cantidad = $bdproducto->ContarProductoVenta($id);
        if ($cantidad != 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Contiene Registros en ventas","warning");';
            echo '}, 1000);</script>';
        } else {
           $borrarimagen = $_SERVER['DOCUMENT_ROOT'] . $foto;
            unlink($borrarimagen);
            $bdproducto->ProductoElimninar($id);
            if ($foto = "") {                
            } else {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Dato Elimado Exitosamente","success");';
                echo '}, 1000);</script>';
            }
        }

        $this->ProductoMostrar($idperfil);
    }

}

?>