<?php

class Cliente {

    private $c_id;
    private $c_identificacion;
    private $c_nombres;
    private $c_apellidos;
    private $c_celular;
    private $c_correo;
    private $c_contrasena;
    private $c_rol;

    function __construct($c_id, $c_identificacion, $c_nombres, $c_apellidos, $c_celular, $c_correo, $c_contrasena, $c_rol) {
        $this->c_id = $c_id;
        $this->c_identificacion = $c_identificacion;
        $this->c_nombres = $c_nombres;
        $this->c_apellidos = $c_apellidos;
        $this->c_celular = $c_celular;
        $this->c_correo = $c_correo;
        $this->c_contrasena = $c_contrasena;
        $this->c_rol = $c_rol;
    }

    function getC_id() {
        return $this->c_id;
    }

    function getC_identificacion() {
        return $this->c_identificacion;
    }

    function getC_nombres() {
        return $this->c_nombres;
    }

    function getC_apellidos() {
        return $this->c_apellidos;
    }

    function getC_celular() {
        return $this->c_celular;
    }

    function getC_correo() {
        return $this->c_correo;
    }

    function getC_contrasena() {
        return $this->c_contrasena;
    }

    function getC_rol() {
        return $this->c_rol;
    }

    function setC_id($c_id): void {
        $this->c_id = $c_id;
    }

    function setC_identificacion($c_identificacion): void {
        $this->c_identificacion = $c_identificacion;
    }

    function setC_nombres($c_nombres): void {
        $this->c_nombres = $c_nombres;
    }

    function setC_apellidos($c_apellidos): void {
        $this->c_apellidos = $c_apellidos;
    }

    function setC_celular($c_celular): void {
        $this->c_celular = $c_celular;
    }

    function setC_correo($c_correo): void {
        $this->c_correo = $c_correo;
    }

    function setC_contrasena($c_contrasena): void {
        $this->c_contrasena = $c_contrasena;
    }

    function setC_rol($c_rol): void {
        $this->c_rol = $c_rol;
    }

}

?>