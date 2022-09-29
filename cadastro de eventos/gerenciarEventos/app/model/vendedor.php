<?php

class Vendedor{
    
    private $id;
    private $nome;
    private $telefone;
    private $email;

    function getIdVendedor() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getTelefone() {
        
        return $this->telefone;
    }
    function getEmail() {
        
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTelefone($telefone) {

        $this->telefone = $telefone;
    }

    function setEmail($email) {

        $this->email = $email;
    }
    
}