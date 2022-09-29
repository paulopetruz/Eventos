<?php

class Ingresso{
    
    private $id;
    private $qrcode;
    private $pg;
    private $nameVendedor;
    private $id_vendedor;
    private $nameComprador;
    private $telComprador;
    private $Fk_evento;

    
    function getId() {
        return $this->id;
    }

    function getQrcode() {
        return $this->qrcode;
    }

    function getPg(){
        return $this->pg;
    }

    function getNameVendedor(){
        return $this->nameVendedor;
    }

    function getIdVendedor() {
        return $this->id_vendedor;
    }

    function getNameComprador() {
        return $this->nameComprador;
    }

    function gettelComprador() {
        return $this->telComprador;
    }

    function getFk_evento() {
        return $this->Fk_evento;
    }

    function setIdVendedor($id_vendedor) {
        $this->id_vendedor = $id_vendedor;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setQrcode($qrcode) {
        $this->qrcode = $qrcode;
    }
   
    function setPg($pg) {
        $this->pg = $pg;
    }

    function setNameVendedor($nameVendedor) {
        $this->nameVendedor = $nameVendedor;
    }

    function setnameComprador($nameComprador) {
        $this->nameComprador = $nameComprador;
    }

    function settelComprador($telComprador) {
        $this->telComprador = $telComprador;
    }

    function setFk_evento($Fk_evento) {
        $this->Fk_evento = $Fk_evento;
    }
}