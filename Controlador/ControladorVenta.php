<?php

Class ControladorVenta {

    public function VentaMostrar($idperfil) {
        $bdcliente = new ClienteDAO();
        $bdventa = new VentaDAO();
        $perfilusuario = $bdcliente->ClienteBuscarID($idperfil);
        $mostrarinformacion = $bdventa->VentaMostrar();
        require_once 'Vista/html/ventas.php';
    }

    public function VentaActualizarProceso($factura, $estado, $idperfil) {
        $bdcliente = new ClienteDAO();
        $bdventa = new VentaDAO();
        $perfilusuario = $bdcliente->ClienteBuscarID($idperfil);
        $mostrarinformacion = $bdventa->VentaActualizarProceso($factura, $estado);
        $this->VentaMostrar($idperfil);
    }

    public function VentaFactura($factura, $idperfil) {
        $bdcliente = new ClienteDAO();
        $bdventa = new VentaDAO();
        $perfilusuario = $bdcliente->ClienteBuscarID($idperfil);
        $mostrarinformacion = $bdventa->VentaFactura($factura);
        $mostrarfactura = $bdventa->VentaFactura($factura);

        require_once 'Vista/html/factura.php';
    }

    public function VentaMostrarCarrito($idperfil) {
        $bdcliente = new ClienteDAO();
        $bdventa = new VentaDAO();
        $perfilusuario = $bdcliente->ClienteBuscarID($idperfil);
        $mostrarinformacion = $bdventa->VentaMostrarCarrito($idperfil);
        require_once 'Vista/html/carrito.php';
    }

    public function VentaMostrarMisCompras($idperfil) {
        $bdcliente = new ClienteDAO();
        $bdventa = new VentaDAO();
        $perfilusuario = $bdcliente->ClienteBuscarID($idperfil);
        $mostrarinformacion = $bdventa->VentaMostrarMisCompras($idperfil);
        require_once 'Vista/html/miscompras.php';
    }

    public function VentaReporte() {
        $bdventa = new VentaDAO();
        $mostrarinformacion = $bdventa->VentaMostrar();
        require_once 'Vista/html/reportecurso.php';
    }

    public function VentaCatalogoPrecio($precio) {
        $bdventa = new VentaDAO();
        $mostrarinformacion = null;
        if ($precio == 'Menor a Mayor Precio') {
            //  $mostrarinformacion = $bdventa->VentaMostrarMayor();
        } else {
            // $mostrarinformacion = $bdventa->VentaMostrarMenor();
        }

        require_once 'Vista/html/cursoes.php';
    }

    public function VentaAgregar($v_clienteFK, $v_productoFK, $v_cantidad, $v_precio, $v_nuevacantidad, $idperfil) {
        $bdventa = new VentaDAO();
        $bdproducto = new ProductoDAO();
        $ControladorProductos = new ControladorProducto();
        $v_total = $v_nuevacantidad * $v_precio;

        if ($v_cantidad < $v_nuevacantidad) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "La cantidad ingresada es mayor que la disponible","warning");';
            echo '}, 1000);</script>';
        } else {
            $stock = $v_cantidad - $v_nuevacantidad;
            $venta = new Venta(null, $v_clienteFK, $v_productoFK, $v_nuevacantidad, $v_precio, $v_total, 0, null, null, null);
            $bdventa->VentaGuardar($venta);
            $bdproducto->ProductoActualizarVenta($v_productoFK, $stock);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Producto Agregado al Carrito","success");';
            echo '}, 1000);</script>';
        }

        $ControladorProductos->ProductoMostrarCatalogo($idperfil);
    }

    public function VentaActualizarFactura($v_clienteFK, $idperfil) {
        $bdventa = new VentaDAO();
        date_default_timezone_set('America/Bogota');
        $fechafactura = date("Ymd");
        $horafactura = date("His");
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $factura = "FAC_" . $fechafactura . "F" . $horafactura . "C" . $v_clienteFK;

        $bdventa->VentaActualizarFactura($v_clienteFK, $factura, $fecha, $hora);
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Información!", "Producto Facturados","success");';
        echo '}, 1000);</script>';

        $this->VentaMostrarCarrito($idperfil);
    }

    public function VentaEliminar($v_id, $v_productoFK, $p_cantidad, $v_cantidad, $idperfil) {
        $bdventa = new VentaDAO();
        $bdproducto = new ProductoDAO();
        $stock = $p_cantidad + $v_cantidad;
        $bdproducto->ProductoActualizarVenta($v_productoFK, $stock); // LO DEVUELVO NUEVAMENTE AL PRODUCTO
        $bdventa->VentaElimninar($v_id);
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Información!", "Poducto Elimnado Venta","success");';
        echo '}, 1000);</script>';
        $this->VentaMostrarCarrito($idperfil);
    }

}

?>