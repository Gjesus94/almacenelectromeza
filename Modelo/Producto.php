<?php

Class Producto {

    private $p_id;
    private $p_codigo;
    private $p_categoriaFK;
    private $p_nombre;
    private $p_descripcion;
    private $p_precio;
    private $p_cantidad;
    private $p_imagen;

    function __construct($p_id, $p_codigo, $p_categoriaFK, $p_nombre, $p_descripcion, $p_precio, $p_cantidad, $p_imagen) {
        $this->p_id = $p_id;
        $this->p_codigo = $p_codigo;
        $this->p_categoriaFK = $p_categoriaFK;
        $this->p_nombre = $p_nombre;
        $this->p_descripcion = $p_descripcion;
        $this->p_precio = $p_precio;
        $this->p_cantidad = $p_cantidad;
        $this->p_imagen = $p_imagen;
    }

    function getP_id() {
        return $this->p_id;
    }

    function getP_codigo() {
        return $this->p_codigo;
    }

    function getP_nombre() {
        return $this->p_nombre;
    }

    function getP_categoriaFK() {
        return $this->p_categoriaFK;
    }

    function setP_categoriaFK($p_categoriaFK): void {
        $this->p_categoriaFK = $p_categoriaFK;
    }

    function getP_descripcion() {
        return $this->p_descripcion;
    }

    function getP_precio() {
        return $this->p_precio;
    }

    function getP_cantidad() {
        return $this->p_cantidad;
    }

    function getP_imagen() {
        return $this->p_imagen;
    }

    function setP_id($p_id): void {
        $this->p_id = $p_id;
    }

    function setP_codigo($p_codigo): void {
        $this->p_codigo = $p_codigo;
    }

    function setP_nombre($p_nombre): void {
        $this->p_nombre = $p_nombre;
    }

    function setP_descripcion($p_descripcion): void {
        $this->p_descripcion = $p_descripcion;
    }

    function setP_precio($p_precio): void {
        $this->p_precio = $p_precio;
    }

    function setP_cantidad($p_cantidad): void {
        $this->p_cantidad = $p_cantidad;
    }

    function setP_imagen($p_imagen): void {
        $this->p_imagen = $p_imagen;
    }

}

?>
