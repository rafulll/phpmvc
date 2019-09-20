<?php

class Usuario {
    
    private $id;
    private $nome;
    private $login;
    private $senha;
    private  $tipo;
    private $ativo;

    
    public function __construct($id, $nome,$tipo, $login, $senha,$ativo) {
        $this->id = $id;
        $this->nome = $nome;
        $this->$tipo = $tipo;
        $this->login = $login;
        $this->senha = $senha;
        $this->ativo = $ativo;
    }

    public function getId() {
        return $this->id;
    }

    public function getSenha() {
        return $this->senha;
    }
    public function getTipo() {
        return $this->$tipo;
    }
    public function getNome() {
        return $this->nome;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    public function setTipo($tipo) {
        self::$tipo = $tipo;
    }
    public function setLogin($login) {
        $this->login = $login;
    }
    public function getLogin() {
        return $this->login;
    }
}
