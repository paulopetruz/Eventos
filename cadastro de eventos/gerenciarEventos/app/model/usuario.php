<?php

class Usuario{
    
    private $id;
    private $nome;
    private $login;
    private $idade;
    private $senha;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getLogin() {
        
        return $this->login;
    }
    function getidade() {
        
        return $this->idade;
    }

    function getSenha() {
        return $this->senha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLogin($login) {

        $this->login = $login;
    }

    function setIdade($idade) {

        $this->idade = $idade;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    
}