<?php

session_start();

require_once 'Configuracion/bd.php';
require_once 'Configuracion/Conexion.php';
require_once 'Configuracion/ConexionPDO.php';

require_once 'Modelo/Categoria.php';
require_once 'Modelo/CategoriaDAO.php';
require_once 'Controlador/ControladorCategoria.php';

$ControladorCategoria = new ControladorCategoria();

require_once 'Modelo/Producto.php';
require_once 'Modelo/ProductoDAO.php';
require_once 'Controlador/ControladorProducto.php';

$ControladorProductos = new ControladorProducto();

require_once 'Modelo/Cliente.php';
require_once 'Modelo/ClienteDAO.php';
require_once 'Controlador/ControladorCliente.php';

require_once 'Modelo/Venta.php';
require_once 'Modelo/VentaDAO.php';
require_once 'Controlador/ControladorVenta.php';

$ControladorVenta = new ControladorVenta();

$ControladorCliente = new ControladorCliente();

require_once 'Controlador/ControladorPagina.php';
$ControladorPagina = new ControladorPagina();

if (isset($_GET["accion"])) {

    if ($_GET["accion"] == "login") {
        $ControladorCliente->Login($_POST["c_identificacion"], $_POST["c_contrasena"], $_POST["c_rol"]);
    } elseif ($_GET["accion"] == "index") {
        $ControladorPagina->Index();
    } elseif ($_GET["accion"] == "registrarme") {
        $ControladorCliente->ClienteAgregar($_POST["c_identificacion"], $_POST["c_nombres"], $_POST["c_apellidos"], $_POST["c_celular"], $_POST["c_correo"], $_POST["c_contrasena"], $_POST["c_rol"]);
    } elseif ($_GET["accion"] == "catalogo") {
        $ControladorProductos->ProductoCatalogo();
    } elseif ($_GET["accion"] == "somos") {
        $ControladorPagina->somos();
    } 

    $idperfil = 0;
    if (isset($_SESSION['permitido']) == true) {
        $idperfil = $_SESSION['usuario'];
        // ACCESO DE ACUERDO AL RON 
        if ($_GET["accion"] == "inicio") {
            $ControladorCliente->cargaInicio($idperfil);
        }

        // USUARIOS 
        if ($_GET["accion"] == "perfil") {
            $ControladorCliente->PerfilMostrar($idperfil);
        } elseif ($_GET["accion"] == "cliente") {
            $ControladorCliente->ClientesMostrar($idperfil);
        } elseif ($_GET["accion"] == "clienteactualizar") {
            $ControladorCliente->ClienteActualizar($_POST["c_id"], $_POST["c_identificacion"], $_POST["c_identificacionvieja"], $_POST["c_nombres"], $_POST["c_apellidos"], $_POST["c_celular"], $_POST["c_correo"], $_POST["c_contrasena"], $idperfil);
        } elseif ($_GET["accion"] == "reportecliente") {
            $ControladorCliente->ClientesReporte();
        }

        // CATEGORIA
        if ($_GET["accion"] == "categoria") {
            $ControladorCategoria->CategoriaMostrar($idperfil);
        } elseif ($_GET["accion"] == "categoriaguardar") {
            $ControladorCategoria->CategoriaAgregar($_POST["c_categoria"], $idperfil);
        } elseif ($_GET["accion"] == "categoriaactualizar") {
            $ControladorCategoria->CategoriaActualizar($_POST["c_id"], $_POST["c_categoria"], $_POST["c_categoriaviejo"], $idperfil);
        } elseif ($_GET["accion"] == "categoriaeliminar") {
            $ControladorCategoria->CategoriaEliminar($_POST["id"], $idperfil);
        }

        // PRODUCTO

        if ($_GET["accion"] == "producto") {
            $ControladorProductos->ProductoMostrar($idperfil);
        } elseif ($_GET["accion"] == "productoguardar") {
            $ControladorProductos->ProductoAgregar($_POST["p_codigo"], $_POST["p_categoriaFK"], $_POST["p_nombre"], $_POST["p_descripcion"], $_POST["p_precio"], $_POST["p_cantidad"], $idperfil);
        } elseif ($_GET["accion"] == "productoactualizar") {
            $ControladorProductos->ProductoActualizar($_POST["p_id"], $_POST["p_codigo"], $_POST["p_codigoviejo"], $_POST["p_categoriaFK"], $_POST["p_nombre"], $_POST["p_descripcion"], $_POST["p_precio"], $_POST["p_cantidad"], $_POST["fotovieja"], $idperfil);
        } elseif ($_GET["accion"] == "productoeliminar") {
            $ControladorProductos->ProductoEliminar($_POST["id"], $_POST["foto"], $idperfil);
        } elseif ($_GET["accion"] == "productocatalogo") {
            $ControladorProductos->ProductoMostrarCatalogo($idperfil);
        } elseif ($_GET["accion"] == "reporteproductos") {
            $ControladorProductos->ProductoReporte();
        }

        // VENTAS

        if ($_GET["accion"] == "carrito") {
            $ControladorVenta->VentaMostrarCarrito($idperfil);
        } elseif ($_GET["accion"] == "carritoguardar") {
            $ControladorVenta->VentaAgregar($_POST["v_usuarioFK"], $_POST["v_productoFK"], $_POST["v_cantidad"], $_POST["v_precio"], $_POST["v_nuevacantidad"], $idperfil);
        } elseif ($_GET["accion"] == "carritoeliminar") {
            $ControladorVenta->VentaEliminar($_POST["v_id"], $_POST["v_productoFK"], $_POST["p_cantidad"], $_POST["v_cantidad"], $idperfil);
        } elseif ($_GET["accion"] == "carritofacturar") {
            $ControladorVenta->VentaActualizarFactura($_POST["v_usuarioFK"], $idperfil);
        } elseif ($_GET["accion"] == "miscompras") {
            $ControladorVenta->VentaMostrarMisCompras($idperfil);
        } elseif ($_GET["accion"] == "factura") {
            $ControladorVenta->VentaFactura($_GET["f"], $idperfil);
        }

        if ($_GET["accion"] == "ventas") {
            $ControladorVenta->VentaMostrar($idperfil);
        } elseif ($_GET["accion"] == "ventasactualizar") {
            $ControladorVenta->VentaActualizarProceso($_POST["v_factura"], $_POST["v_estado"], $idperfil);
        }


        if ($_GET["accion"] == "salir") {
            $_SESSION = array();  //Destruir todas las variables de sesi�n que hallan sido 
            session_destroy();
            $ControladorPagina->Index();
        }
    } else {
        $_SESSION = array();  //Destruir todas las variables de sesi�n que hallan sido 
        session_destroy();
    }
} else {

    $ControladorPagina->Index();
}
?>
