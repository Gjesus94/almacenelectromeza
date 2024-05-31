<?php

Class Venta {

    private $v_id;
    private $v_clienteFK;
    private $v_productoFK;
    private $v_cantidad;
    private $v_precio;
    private $v_total;
    private $v_estado;
    private $v_factura;
    private $v_fecha;
    private $v_hora;

    function __construct($v_id, $v_clienteFK, $v_productoFK, $v_cantidad, $v_precio, $v_total, $v_estado, $v_factura, $v_fecha, $v_hora) {
        $this->v_id = $v_id;
        $this->v_clienteFK = $v_clienteFK;
        $this->v_productoFK = $v_productoFK;
        $this->v_cantidad = $v_cantidad;
        $this->v_precio = $v_precio;
        $this->v_total = $v_total;
        $this->v_estado = $v_estado;
        $this->v_factura = $v_factura;
        $this->v_fecha = $v_fecha;
        $this->v_hora = $v_hora;
    }

    function getV_id() {
        return $this->v_id;
    }

    function getV_clienteFK() {
        return $this->v_clienteFK;
    }

    function getV_productoFK() {
        return $this->v_productoFK;
    }

    function getV_cantidad() {
        return $this->v_cantidad;
    }

    function getV_precio() {
        return $this->v_precio;
    }

    function getV_total() {
        return $this->v_total;
    }

    function getV_estado() {
        return $this->v_estado;
    }

    function getV_factura() {
        return $this->v_factura;
    }

    function getV_fecha() {
        return $this->v_fecha;
    }

    function getV_hora() {
        return $this->v_hora;
    }

    function setV_id($v_id): void {
        $this->v_id = $v_id;
    }

    function setV_clienteFK($v_clienteFK): void {
        $this->v_clienteFK = $v_clienteFK;
    }

    function setV_productoFK($v_productoFK): void {
        $this->v_productoFK = $v_productoFK;
    }

    function setV_cantidad($v_cantidad): void {
        $this->v_cantidad = $v_cantidad;
    }

    function setV_precio($v_precio): void {
        $this->v_precio = $v_precio;
    }

    function setV_total($v_total): void {
        $this->v_total = $v_total;
    }

    function setV_estado($v_estado): void {
        $this->v_estado = $v_estado;
    }

    function setV_factura($v_factura): void {
        $this->v_factura = $v_factura;
    }

    function setV_fecha($v_fecha): void {
        $this->v_fecha = $v_fecha;
    }

    function setV_hora($v_hora): void {
        $this->v_hora = $v_hora;
    }

}

?>
