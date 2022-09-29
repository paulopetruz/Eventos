<?php

class Evento{
    
    private $idEvento;
    private $nome;
    private $data;
    private $nameVendedor;
    private $capacidade;
    private $hora;
    private $fkVendedor;
    
    function getIdEvento() {
        return $this->idEvento;
    }

    function getNome() {
        return $this->nome;
    }

    function getData() {
        
        return $this->data;
    }

    function getNameVendedor(){
        return $this->nameVendedor;
    }

    function getHora() {
        
        return $this->hora;
    }

    function getCapacidade() {
        return $this->capacidade;
    }

    function getfkVendedor() {
        return $this->fkVendedor;
    }

    function setIdEvento($idEvento) {
        $this->idEvento = $idEvento;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setData($data) {

        $this->data = $data;
    }

    function setNameVendedor($nameVendedor) {
        $this->nameVendedor = $nameVendedor;
    }

    function setHora($hora) {

        $this->hora = $hora;
    }

    function setCapacidade($capacidade) {
        $this->capacidade = $capacidade;
    }

    function setfkVendedor($fkVendedor) {
        $this->fkVendedor = $fkVendedor;
    }
    
}