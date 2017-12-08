<?php

/**
 *
 * @author Andres Salgado
 */
class Contacto {

    private $idContacto;
    private $nombres;
    private $celular;
    private $direccion;

    function __construct($idContacto, $nombres, $celular, $direccion) {
        $this->idContacto = $idContacto;
        $this->nombres = $nombres;
        $this->celular = $celular;
        $this->direccion = $direccion;
    }

    function getIdContacto() {
        return $this->idContacto;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getCelular() {
        return $this->celular;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function setIdContacto($idContacto) {
        $this->idContacto = $idContacto;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

}
